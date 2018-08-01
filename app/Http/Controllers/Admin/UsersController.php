<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('checkAge');
    }

    public function listUsers() {

        return 'list users -> admin/users';
    }
}
