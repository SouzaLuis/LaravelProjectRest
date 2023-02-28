<?php

namespace App\Http\Controllers\Form;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    public function listAllUsers()
    {
        $users = User::all();
        return view('listAllUsers', [
            'users' => $users
        ]);
    }
    public function listUser(User $user)
    {
        return view('listUser', [
            'user' => $user
        ]);
    }
    public function addUser()
    {
        return view('addUser');
    }
    public function signInUser(Request $request)
    {
        $user = new User();
        $user->name = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.listAll');
    }
    public function formEditUser(User $user)
    {
        return view('editUser', [
            'user' => $user
        ]);
    }
    public function editUser(User $user, Request $request)
    {
        $user->name = $request->username;
        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user->email = $request->email;
        }
        if(!empty($request->password)){
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('users.listAll');
    }
    public function destroyUser(User $user)
    {
        $user->delete();

        return redirect()->route('users.listAll');
    }
}
