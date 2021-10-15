<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function eror(){
        return view('erorlogin');
    }
}
