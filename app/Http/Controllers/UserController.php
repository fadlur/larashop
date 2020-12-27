<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $data = array('title' => 'User Profil');
        return view('user.index', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('user.setting', $data);
    }
}
