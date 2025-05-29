<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
     public function index()
    {
        return UserModel::all();
    }

  public function store(Request $request)
{
    $request->validate([
        'username' => 'required|string|max:50',
        'password' => 'required|string|min:5',
        'nama' => 'required|string|max:100',
        'level_id' => 'required|exists:m_level,level_id'
    ]);

    $user = UserModel::create([
        'username' => $request->username,
        'password' => bcrypt($request->password), 
        'nama' => $request->nama,
        'level_id' => $request->level_id,
    ]);

    return response()->json($user, 201);
}


    public function show(UserModel $user)
    {
        return response()->json($user);
    }

    public function update(Request $request, UserModel $user)
    {

        $user->update($request->all());
        return response()->json($user);
    }

    public function destroy(UserModel $user)
    {
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }
}
