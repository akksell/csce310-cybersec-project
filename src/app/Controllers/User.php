<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\UserEntity;

// For custom constructor
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class User extends BaseController
{
    protected $db;

    // Class constructor to connect to db and inherit BaseController
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ){
        parent::initController($request, $response, $logger);
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'page_title' => 'View all users | TAMU CyberSec Center',
        ];

        return view('user/index', $data);
    }

    public function show($id = null)
    {
        $user = sessionUser();
        // echo var_dump($user);
        // return ('user/show');
        if ($id && $user && $user->hasPermission('admin')) {
            $sql = <<<SQL
                SELECT * 
                FROM user
                WHERE UIN = "$id";
            SQL;
            $query = $this->db->query($sql);
            $result = $query->getRowArray();
            $user = empty($result) ? null : (new UserEntity())->fill($result);
        } else if ($id === null && !$user) {
            return $this->response->redirect(site_url('login'));
        }

        $data = [
            'page_title' => $user ? $user->Username . '\'s Profile | TAMU CyberSec Center' : 'User Not Found | TAMU CyberSec Center',
            'user' => $user,
        ];

        return view('user/view', $data);
    }

    public function update($id = null)
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        $data = [];
        if ($method !== "post") {
            return view('index');
        }

        $user = sessionUser();
        if (!$user->UIN) {
            return view();
        }

        $formData = $this->request->getPost();
        if ($id !== null && $user->hasPermission('admin')) {

        }

        if ($id === null && str_contains($path, 'profile')) {
            $uin = $user->UIN;

            // check if username changed in update
            if ($formData['Username'] !== $user->Username) {
                $sql = <<<SQL
                    SELECT Username 
                    FROM user
                    WHERE Username = {$formData['Username']};
                SQL;
                $query = $this->db->query($sql);
                $result = $query->getRowArray();

                if (!empty($result)) {
                    return view('index');
                }
            }

            $sql = <<<SQL
                UPDATE user 
                SET 
                    First_Name = {$formData['First_Name']},
                    Last_Name = {$formData['Last_Name']},
                    M_Initial = {$formData['M_Initial']},
                    Email = {$formData['M_Initial']},
                    Username = {$formData['Username']},
                    Discord_Name = {$formData['Discord_Name']},
                WHERE
                    UIN = '$uin';
            SQL;
            $query = $this->db->query($sql);
            $result = $query->getRowArray();
            return view('user/show', $formData);
        }

        return view('index');
    }

    public function create() {
        $data = [
            'page_title' => 'Apply for Membership | TAMU CyberSec Center',
        ];

        return view('user/create', $data);
    }

    public function new() {
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Apply for Membership | TAMU CyberSec Center',
        ];

        if ($method == "post") {
            $formData = $this->request->getPost();
            $formData['User_Type'] = 'student';
            $formData['Password'] = password_hash($formData['Password'], PASSWORD_BCRYPT);
            $userModel = new UserModel();
            $result = $userModel->save($formData, false);
            $data['result'] = $result;
        }

        return view('login/register', $data);
    }

    public function register() {
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Apply for Membership | TAMU CyberSec Center',
        ];

        if ($method == "get") {
            return view('login/register', $data);
        }

    }

    public function login()
    {
        $session = session();
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Login | TAMU CyberSec Center',
        ];

        if ($method == "get") {
            $user = sessionUser();
            if ($user) {
                return $this->response->redirect(site_url(''));
            }
            return view('login/index', $data);
        }

        if ($method == "post") {
            $formData = $this->request->getPost();
            if (!(isset($formData['Username']) && (isset($formData['Password'])) && $formData['Username'] && $formData['Password'])) {
                $data['Username'] = $formData['Username'];
                $data['Password'] = $formData['Password'];
                $data['errors'] = [
                    'username or password cannot be blank'
                ];
                return view('login/index', $data);
            }

            $username = $formData['Username'];
            $query = $this->db->query('SELECT * FROM user WHERE Username = \'' . $username . '\';');
            $user = $query->getRowArray();

            if (empty($user)) {
                $data['Username'] = $formData['Username'];
                $data['Password'] = $formData['Password'];
                $data['errors'] = [
                    'username or password does not match'
                ];
                return view('login/index', $data);
            }

            $verify = password_verify($formData['Password'], $user['Password']);
            if (!$verify) {
                $data['Username'] = $formData['Username'];
                $data['Password'] = $formData['Password'];
                $data['errors'] = [
                    'username or password does not match'
                ];
                return view('login/index', $data);
            }

            $session->set('UIN', $user['UIN']);
            return $this->response->redirect(site_url(''));
        }
    }

    public function createAdmin()
    {

    }

    public function newAdmin()
    {

    }

    public function delete()
    {

    }

    public function deactivate()
    {

    }

    public function deleteAdmin() {

    }
}
