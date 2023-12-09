<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ErrorHandler extends BaseController
{
    public function index()
    {
        return view('error');
    }
}
