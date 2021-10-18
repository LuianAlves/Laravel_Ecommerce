<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class AllUsersController extends Controller
{
    public function index() {
        $users = User::latest()->get();

        return view('admin.backend.register_users.index', compact('users'));
    }
}
