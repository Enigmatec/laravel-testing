<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


class UserController extends Controller
{
    public function allUser()
    {
        $user = User::all();
        return $user;
    }

    public function register(Request $request)
    {
        $this->authorize('create', User::class);
            $data = $request->validate([
                'name'       => ['required', 'max:256'],
                'email'      => ['required', 'email', 'unique:users,email'],
                'password'   => ['required']   
            ]);
            $data['password'] = bcrypt($request->password);

            $user = User::create($data);
            return redirect('login');
        
    }

    public function deleteUser($id)
    {
        $this->authorize('create', User::class);
        $user = User::findorFail($id);
        return $user->delete();        
    }
}
