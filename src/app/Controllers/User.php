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
        $user = sessionUser();

        if (!$user || !$user->hasPermission('admin')) {
            return $this->response->redirect(site_url(''));
        }

        $sql = <<<SQL
            SELECT *
            FROM user
            ORDER BY 
                Last_Name ASC,
                First_Name ASC
            ;
        SQL;
        $query = $this->db->query($sql);
        $result = $query->getResultArray();
        $data = [
            'page_title' => 'View all users | TAMU CyberSec Center',
            'user' => $user,
            'userList' => $result,
        ];

        return view('user/index', $data);
    }

    public function show($id = null)
    {
        $user = sessionUser();
        $method = $this->request->getMethod();
        if (!$user) {
            return $this->response->redirect(site_url('login'));
        }

        if ($method !== "get") {
            return $this->response->redirect(site_url(''));
        }

        if ($id && $user && $user->hasPermission('admin')) {
            $sql = <<<SQL
                SELECT * 
                FROM profile
                WHERE Username = "$id";
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
            'sessionUser' => sessionUser(),
        ];

        return view('user/view', $data);
    }

    public function edit($id = null) {
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        $sessionUser = sessionUser();
        if (!$sessionUser) {
            return $this->response->redirect(site_url('login'));
        }

        if ($method !== "get") {
            return $this->reponse->redirect(site_url(''));
        }

        $data = [
            "page_title" => 'Edit ' . $sessionUser->Username . ' | TAMU CyberSec Center',
            "user" => $sessionUser,
            "sessionUser" => $sessionUser,
        ];

        if ($id === null && strpos($path, 'profile') !== false) {
            return view('user/edit', $data);
        }

        if ($id !== null && $sessionUser->hasPermission('admin')) {
            $sql = <<<SQL
                SELECT * 
                FROM profile
                WHERE Username = "$id";
            SQL;
            $query = $this->db->query($sql);
            $result = $query->getRowArray();
            $user = empty($result) ? null : (new UserEntity())->fill($result);
            $data['user'] = $user;
            if (!$user) {
                return $this->response->redirect(site_url('error'));
            }
            $data['page_title'] = 'Edit ' . $user->Username . ' | TAMU CyberSec Center';
            return view('user/edit', $data);
        }

        return $this->response->redirect(site_url('error'));
    }

    public function update($id = null)
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        $data = [
            'page_title' => 'Updating Profile | TAMU CyberSec Center',
        ];
        if ($method !== "post") {
            return $this->response->redirect(site_url('error'));
        }

        $user = sessionUser();
        $sessionUser = $user;
        if (!$user) {
            return $this->response->redirect(site_url('error'));
        }

        $formData = $this->request->getPost();
        if ($id !== null && $user->hasPermission('admin')) {
            // find the user with this username
            $getUser =<<<SQL
                SELECT *
                FROM profile
                WHERE Username = '$id';
            SQL;
            $query = $this->db->query($getUser);
            $result = $query->getRowArray();
            if (empty($result)) {
                $data['errors'] = ['Unable to resolve user to update.'];
                $data['user'] = $user;
                $data['sessionUser'] = $sessionUser;
                return view('user/edit', $data);
            }

            $user = (new UserEntity())->fill($result);

            // check if username changed in update
            if ($formData['Username'] !== $id) {
                $sql = <<<SQL
                    SELECT Username 
                    FROM user
                    WHERE Username = '{$formData['Username']}';
                SQL;
                $query = $this->db->query($sql);
                $result = $query->getRowArray();

                if (!empty($result)) {
                    $data['errors'] = ['Failed to update profile, username already in use.'];
                    $data['user'] = $user;
                    $data['sessionUser'] = sessionUser();
                    return view('user/edit', $data);
                }
            }

            if ($formData['UIN'] !== $user->UIN) {
                $sql = <<<SQL
                    SELECT UIN 
                    FROM user
                    WHERE UIN = '{$formData['UIN']}';
                SQL;
                $query = $this->db->query($sql);
                $result = $query->getRowArray();

                if (!empty($result)) {
                    $data['errors'] = ['Failed to update user: invalid UIN.'];
                    $data['user'] = $user;
                    $data['sessionUser'] = sessionUser();
                    return view('user/edit', $data);
                }
            }

            $updatedUIN = (int) $formData['UIN'];
            $updateUser = <<<SQL
                UPDATE user 
                SET 
                    UIN = $updatedUIN,
                    First_Name = '{$formData['First_Name']}',
                    Last_Name = '{$formData['Last_Name']}',
                    M_Initial = '{$formData['M_Initial']}',
                    Email = '{$formData['Email']}',
                    Username = '{$formData['Username']}',
                    Discord_Name = '{$formData['Discord_Name']}'
                WHERE
                    UIN = $user->UIN;
            SQL;

            $hispanic_latino = (int) isset($formData['Hispanic_Latino']);
            $us_citizen = (int) isset($formData['US_Citizen']);
            $first_gen = (int) isset($formData['First_Generation']);
            $gpa = (float) $formData['GPA'];
            $grad = (int) $formData['Expected_Graduation'];

            $updateCollegeStu = <<<SQL
                UPDATE college_student
                SET
                    UIN = $updatedUIN,
                    Gender = '{$formData['Gender']}',
                    Hispanic_Latino = $hispanic_latino,
                    Race = '{$formData['Race']}',
                    US_Citizen = $us_citizen,
                    First_Generation = $first_gen,
                    DoB = '{$formData['DoB']}',
                    GPA = $gpa,
                    Major = '{$formData['Major']}',
                    Minor_1 = '{$formData['Minor_1']}',
                    Minor_2 = '{$formData['Minor_2']}',
                    Expected_Graduation = $grad,
                    School = '{$formData['School']}',
                    Classification = '{$formData['Classification']}',
                    Phone = '{$formData['Phone']}'
            SQL;

            $this->db->transStart();
            $updateURes = $this->db->query($updateUser);
            $updateCSRes = $this->db->query($updateCollegeStu);
            $this->db->transComplete();

            if (!$updateCSRes || !$updateURes) {
                $data['errors'] = ['Failed to update profile. Please try again later.'];
                $data['user'] = $user;
                $data['sessionUser'] = sessionUser();
                return view('user/edit', $data);
            }
            return $this->response->redirect(site_url('admin/users/@' . $formData['Username']));
        }

        if ($id === null && strpos($path, 'profile') !== false) {
            $uin = $user->UIN;

            // check if username changed in update
            if ($formData['Username'] !== $user->Username) {
                $sql = <<<SQL
                    SELECT Username 
                    FROM user
                    WHERE Username = '{$formData['Username']}';
                SQL;
                $query = $this->db->query($sql);
                $result = $query->getRowArray();

                if (!empty($result)) {
                    $data['errors'] = ['Failed to update profile, username already in use.'];
                    $data['user'] = $user;
                    $data['sessionUser'] = sessionUser();
                    return view('user/edit', $data);
                }
            }

            if ($formData['UIN'] !== $user->UIN) {
                $sql = <<<SQL
                    SELECT UIN 
                    FROM user
                    WHERE UIN = '{$formData['UIN']}';
                SQL;
                $query = $this->db->query($sql);
                $result = $query->getRowArray();

                if (!empty($result)) {
                    $data['errors'] = ['Failed to update user: invalid UIN.'];
                    $data['user'] = $user;
                    $data['sessionUser'] = sessionUser();
                    return view('user/edit', $data);
                }
            }

            $updatedUIN = (int) $formData['UIN'];
            $sql = <<<SQL
                UPDATE user 
                SET 
                    UIN = {$updatedUIN},
                    First_Name = '{$formData['First_Name']}',
                    Last_Name = '{$formData['Last_Name']}',
                    M_Initial = '{$formData['M_Initial']}',
                    Email = '{$formData['Email']}',
                    Username = '{$formData['Username']}',
                    Discord_Name = '{$formData['Discord_Name']}'
                WHERE
                    UIN = $uin;
            SQL;
            $query = $this->db->query($sql);
            if (!$query) {
                $data['errors'] = ['Failed to update profile. Please try again later.'];
                $data['user'] = $user;
                $data['sessionUser'] = sessionUser();
                return view('user/edit', $data);
            }
            return $this->response->redirect(site_url('profile'));
        }

        return $this->response->redirect(site_url('error'));
    }

    public function create() {
        $data = [
            'page_title' => 'Create a User | TAMU CyberSec Center',
        ];

        return view('user/create', $data);
    }

    public function new() {
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Register | TAMU CyberSec Center',
        ];

        if ($method == "post") {
            $formData = $this->request->getPost();
            $formData['User_Type'] = 'student';
            $formData['UIN'] = (int) $formData['UIN'];
            $formData['Status'] = 'active';
            $formData['Password'] = password_hash($formData['Password'], PASSWORD_BCRYPT);
            $addUser =<<<SQL
                INSERT INTO user 
                VALUES ( 
                    {$formData['UIN']},
                    '{$formData['First_Name']}',
                    '{$formData['M_Initial']}',
                    '{$formData['Last_Name']}',
                    '{$formData['Username']}',
                    '{$formData['Password']}',
                    '{$formData['User_Type']}',
                    '{$formData['Email']}',
                    '{$formData['Discord_Name']}',
                    '{$formData['Status']}'
                );
            SQL;

            $formData['Hispanic_Latino'] = (int) isset($formData['Hispanic_Latino']);
            $formData['US_Citizen'] = (int) isset($formData['US_Citizen']);
            $formData['First_Generation'] = (int) isset($formData['First_Generation']);
            $formData['Expected_Graduation'] = (int) $formData['Expected_Graduation'];
            $formData['Phone'] = (int) $formData['Phone'];
            $formData['GPA'] = (float) $formData['GPA'];
            $formData['Student_Type'] = "college";

            $addStudent =<<<SQL
                INSERT INTO college_student 
                VALUES ( 
                    {$formData['UIN']},
                    '{$formData['Gender']}',
                    {$formData['Hispanic_Latino']},
                    '{$formData['Race']}',
                    {$formData['US_Citizen']},
                    {$formData['First_Generation']},
                    '{$formData['DoB']}',
                    {$formData['GPA']},
                    '{$formData['Major']}',
                    '{$formData['Minor_1']}',
                    '{$formData['Minor_2']}',
                    {$formData['Expected_Graduation']},
                    '{$formData['School']}',
                    '{$formData['Classification']}',
                    {$formData['Phone']},
                    '{$formData['Student_Type']}'
                );
            SQL;
            $this->db->transStart();
            $newUserRes = $this->db->query($addUser);
            $newStudentRes = $this->db->query($addStudent);
            $this->db->transComplete();
            $result = $newUserRes && $newStudentRes;
            if (!$result) {
                $data['errors'] = ['Failed to Register, please try again'];
            }
            $data['result'] = $result;
        }

        return view('login/register', $data);
    }

    public function register() {
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Register | TAMU CyberSec Center',
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
                return $this->response->redirect(site_url('dashboard'));
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

            if ($user['Status'] === 'deactivated') {
                $data['errors'] = [
                    'Your account has been deactivated and can no longer access the TAMUCC System.'
                ];
                return view('login/index', $data);
            }

            $session->set('UIN', $user['UIN']);
            return $this->response->redirect(site_url(''));
        }
    }

    public function logout()
    {
        $session = session();
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Login | TAMU CyberSec Center',
        ];

        if ($method !== "post") {
            return $this->response->redirect(site_url('dashboard'));
        }

        $sessionUser = sessionUser();
        if (!$sessionUser) {
            return $this->response->redirect(site_url('login'));
        }

        $session->destroy();
        return $this->response->redirect(site_url('login'));
    }

    public function createAdmin()
    {
        $sessionUser = sessionUser();
        $data = [
            'page_title' => 'Create a User | TAMU CyberSec Center',
            'user' => $sessionUser,
        ];

        return view('user/create', $data);
    }

    public function newAdmin()
    {
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Register | TAMU CyberSec Center',
        ];

        if ($method !== "post") {
            return $this->response->redirect(site_url(''));
        }

        $formData = $this->request->getPost();
        $formData['User_Type'] = 'admin';
        $formData['UIN'] = (int) $formData['UIN'];
        $formData['Status'] = 'active';
        $formData['Password'] = password_hash($formData['Password'], PASSWORD_BCRYPT);
        $addUser =<<<SQL
            INSERT INTO user 
            VALUES ( 
                {$formData['UIN']},
                '{$formData['First_Name']}',
                '{$formData['M_Initial']}',
                '{$formData['Last_Name']}',
                '{$formData['Username']}',
                '{$formData['Password']}',
                '{$formData['User_Type']}',
                '{$formData['Email']}',
                '{$formData['Discord_Name']}',
                '{$formData['Status']}'
            );
        SQL;
       
        $newUserRes = $this->db->query($addUser);
        $result = $newUserRes;
        if (!$result) {
            $data['errors'] = ['Failed to Create User, please try again'];
        }
        $data['result'] = $result;

        return view('user/create', $data);
    }

    public function delete($id = null)
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        $sessionUser = sessionUser();
        if (!$sessionUser) {
            return $this->response->redirect(site_url('login'));
        }

        if (!$sessionUser->hasPermission('admin') || $id === null) {
            return $this->response->redirect(site_url('error'));
        }

        $deleteUser = <<<SQL
            DELETE FROM user
            WHERE UIN = $id;
        SQL;

        $deleteCS = <<<SQL
            DELETE FROM college_student
            WHERE UIN = $id;
        SQL;

        $this->db->transStart();
        $deleteUserRS = $this->db->query($deleteUser);
        $deleteCSRS = $this->db->query($deleteCS);
        $this->db->transComplete();

        if (!$deleteCSRS || !$deleteUserRS) {
            return $this->response->redirect(site_url('error'));
        }

        return $this->response->redirect(site_url('admin/users'));
    }

    public function deactivate($id = null)
    {
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        $sessionUser = sessionUser();
        $data = [
            'page_title' => $sessionUser ? $sessionUser->Username . '\'s Profile | TAMU CyberSec Center' : 'User Not Found | TAMU CyberSec Center',
            'sessionUser' => $sessionUser,
        ];

        if (!$sessionUser) {
            return $this->response->redirect(site_url('login'));
        }

        if ($id === null && strpos($path, 'profile') !== false) {
            $uin = $sessionUser->UIN;
            $sql = <<<SQL
                UPDATE user
                SET
                    Status = "deactivated"
                WHERE UIN = '$uin';
            SQL;
            $query = $this->db->query($sql);
            $data['user'] = $sessionUser;
            if (!$query) {
                $data['errors'] = ['Unable to deactivate user. Please try again later'];
                return view('user/view', $data);
            }
            $session = session();
            $session->destroy();
            return $this->response->redirect(site_url('login'));
        }

        if ($id !== null && $sessionUser->hasPermission('admin')) {
            $deactivateSQL = <<<SQL
                UPDATE user
                SET
                    Status = "deactivated"
                WHERE Username = '$id';
            SQL;
            $selectSQL = <<<SQL
                SELECT * FROM profile
                WHERE Username = '$id';
            SQL;
            $updateRes = $this->db->query($deactivateSQL);
            $updatedUser = $this->db->query($selectSQL)->getRowArray();
            $data['user'] = (!$updateRes || !$updatedUser) ? null : (new UserEntity())->fill($updatedUser);
            if (!$updateRes) {
                $data['errors'] = ['Unable to deactivate user. Please try again later'];
            }

            return view('user/view', $data);
        }

        return $this->response->redirect(site_url('error'));
    }

    public function promote($id)
    {
        $sessionUser = sessionUser();
        if (!$sessionUser) {
            $this->response->redirect(site_url('login'));
        }

        if (!$sessionUser->hasPermission('admin')) {
            return $this->response->redirect(site_url('error'));
        }

        $data = [
            'page_title' => $sessionUser ? $sessionUser->Username . '\'s Profile | TAMU CyberSec Center' : 'User Not Found | TAMU CyberSec Center',
            'sessionUser' => $sessionUser,
        ];

        $sql =<<<SQL
            SELECT *
            FROM profile
            WHERE UIN = $id;
        SQL;
        $query = $this->db->query($sql);
        $result = $query->getRowArray();

        if (empty($result)) {
            return $this->response->redirect(site_url('error'));
        }

        $user = (new UserEntity())->fill($result);
        if (isset($user) && $user->hasPermission('admin')) {
            return $this->response->redirect(site_url('error'));
        }

        $data['user'] = $user;
        $updateUser = <<<SQL
            UPDATE user
            SET
                User_Type = 'admin'
            WHERE UIN = $id;
        SQL;
        if ($user->hasPermission('student')) {
            $removeStudentEntry = <<<SQL
                DELETE FROM college_student
                WHERE UIN = $id;
            SQL;
            $this->db->transStart();
            $updateRes = $this->db->query($updateUser);
            $removeRes = $this->db->query($removeStudentEntry);
            $this->db->transComplete();

            if (!($updateRes && $removeRes)) {
                $data['errors'] = ['Failed to promote user. Please try again later'];
                return view('user/view', $data);
            }
        } else {
            $updateRes = $this->db->query($updateUser);
            if (!($updateRes && $removeRes)) {
                $data['errors'] = ['Failed to promote user. Please try again later'];
                return view('user/view', $data);
            }
        }

        return view('user/view', $data);
    }

    public function updatePassword($id = null) {
        $method = $this->request->getMethod();
        $path = $this->request->getUri()->getPath();
        if ($method !== 'post') {
            return $this->response->redirect(site_url(''));
        }

        $sessionUser = sessionUser();

        if (!$sessionUser) {
            return $this->response->redirect(site_url('login'));
        }

        $data = [
            'page_title' => "Editing " . $sessionUser->Username . "'s Profile | ",
            'sessionUser' => $sessionUser,
        ];
        $formData = $this->request->getPost();

        if ($id && $sessionUser->hasPermission('admin')) {
            $findUser =<<<SQL
                SELECT *
                FROM profile
                WHERE UIN = $id;
            SQL;
            $query = $this->db->query($findUser);
            $result = $query->getRowArray();
            $user = empty($result) ? null : (new UserEntity())->fill($result);
            if (!$user) {
                $data['errors'] = ["Couldn't find user to update with password."];
                $data['user'] = $user;
                return view('user/edit', $data);
            }

            $hashed = password_hash($formData['NewPassword'], PASSWORD_BCRYPT);
            $sql =<<<SQL
                UPDATE user
                SET
                    Password = '$hashed'
                WHERE UIN = $sessionUser->UIN;
            SQL;
            $result = $this->db->query($sql);
            if (!$result) {
                $data['errors'] = ["Unable to update password."];
                return view('user/edit', $data);
            }

            return $this->response->redirect('admin/users/@' . $user->Username);
        }

        if ($id === null && strpos($path, 'profile') !== false) {
            $data['user'] = $sessionUser;
            if (!password_verify($formData['OldPassword'], $sessionUser->Password)) {
                $data['errors'] = ["Unable to update password."];
                return view('user/edit', $data);
            }

            if ($formData['NewPassword'] !== $formData['ConfirmNewPassword']) {
                $data['errors'] = ["Passwords do not match"];
                return view('user/edit', $data);
            }

            $hashed = password_hash($formData['NewPassword'], PASSWORD_BCRYPT);
            $sql =<<<SQL
                UPDATE user
                SET
                    Password = '$hashed'
                WHERE UIN = $sessionUser->UIN;
            SQL;
            $result = $this->db->query($sql);
            if (!$result) {
                $data['errors'] = ["Unable to update password."];
                return view('user/edit', $data);
            }

            return $this->response->redirect(site_url('profile'));
        }

        return view('user/show', $data);
    }
}
