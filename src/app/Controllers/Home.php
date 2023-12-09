<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $user = sessionUser();
        if (!$user) {
            return $this->response->redirect(site_url('/login'));
        }
        return view('index');
    }
}
