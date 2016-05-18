<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Collection;
use Auth;
use App\Http\Controllers\BatchesController;

class AdminController extends Controller
{
    /**
     * Count the number of users
     * @return mixed
     */
    public function countUser(){
       $user = User::count();
        return $user;
    }

    /**
     * Get current logged in user
     * @return mixed
     */
    public function getCurrentUser() {

        $user = Auth::user();
        return $user;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usercount = $this->countUser();
        $user = $this->getCurrentUser();
        return view('admin.home', compact('user', 'usercount'));
    }
}
