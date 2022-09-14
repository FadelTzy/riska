<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function index1()
    {
        $data['page'] = "SPM V2";
        return view('welcome1', $data);
    }
}
