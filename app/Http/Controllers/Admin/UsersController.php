<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

/**
 * Class UsersController 測試用
 * @package App\Http\Controllers\Admin
 */
class UsersController extends Controller
{
    /**
     * UsersController constructor. 建構子
     */
    public function __construct()
    {
        $this->middleware('checkAge');
    }

    /**
     * @return string 顯示測試字串
     */
    public function listUsers() {

        return 'list users -> admin/users';
    }
}
