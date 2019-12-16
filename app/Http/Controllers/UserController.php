<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('admin.users.list', compact('users'));
    }

    public function create()
    {
        return view('admin.users.add');
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $this->user->create($data);
        Session::flash('success','Create user success!');
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = $this->user->findOrFail($id);
        $user->delete();
        Session::flash('success','Delete user success!');
        return redirect()->route('users.index');
    }

    public function update($id)
    {
        $user = $this->user->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function edit(UpdateUserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);
        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->level = $request->level;
        $user->save();
        Session::flash('success','Update user success!');
        return redirect()->route('users.index');
    }
}
