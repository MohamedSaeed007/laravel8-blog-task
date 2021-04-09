<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index')->with('users', $users);
    }

    public function edit()
    {
        return view('admin.users.edit')->with('user', auth()->user());
    }

    public function update(UpdateUserRequest $request){
        $user = auth()->user();

        if($request->password){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        session()->flash('success', 'User Updated Successfully.');
        return redirect(route('users.edit'));

    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', 'admin privilege associated to this user successfully.');
        return redirect(route('admin.users.index'));
    }
}
