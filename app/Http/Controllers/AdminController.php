<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function __construct()
    {
        // 設定 checkRole 並帶入參數 "admin"
        $this->middleware('checkRole:admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
