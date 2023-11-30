<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;

class User extends ResourceController
{
    protected $modelName = 'App\Models\User';
    protected $format    = 'json';

    public function index()
    {
        $data = [
            'page_title' => 'View all users | TAMU CyberSec Center',
        ];

        return view('user/index', $data);
    }

    public function show($id = null)
    {
        $user = $this->model->find($id);
        $data = [
            'page_title' => 'Viewing ' . $user.Username . '\'s Profile | TAMU CyberSec Center',
            'user' => $user,
        ];

        return view('user/view', $data);
    }

    public function edit($id = null)
    {
        $user = $this->model->find($id);
        $data = [
            'page_title' => 'Edit ' . $user.Username . '\'s Profile | TAMU CyberSec Center',
            'user' => $user,
        ];

        return view('user/edit', $data);
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

        return view('login/apply', $data);
    }

    public function apply() {
        $method = $this->request->getMethod();
        $data = [
            'page_title' => 'Apply for Membership | TAMU CyberSec Center',
        ];

        if ($method == "get") {
            return view('login/apply', $data);
        }

    }

    public function login()
    {
        $data = [
            'page_title' => 'Login | TAMU CyberSec Center',
        ];
        return view('login/index', $data);
    }
}
