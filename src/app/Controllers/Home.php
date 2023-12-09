<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $user = sessionUser();
        if (!$user) {
            return $this->response->redirect(site_url('/login'));
        }
        return view('index');
    }
}
