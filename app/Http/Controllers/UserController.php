<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $user = UserModel::findOr(20, ['username', 'nama'], function(){
            abort(404);
        });
        return view('user', ['data' => $user]);
    }
}
