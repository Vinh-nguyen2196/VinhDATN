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
        try {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $this->user->create($data);
            toastr()->success('Tạo mới người dùng thành công ');
        }catch (\Exception $exception){
            toastr()->error('Thao tác thêm mới lỗi ');
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $user->delete();
            toastr()->success('Xóa người dùng thành công ');
        }catch (\Exception $exception){
            toastr()->error('Thao tác xóa lỗi ');
        }

        return redirect()->route('users.index');
    }

    public function update($id)
    {
        $user = $this->user->findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function edit(UpdateUserRequest $request, $id)
    {
        try {
            $user = $this->user->findOrFail($id);
            $user->full_name = $request->full_name;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->level = $request->level;
            $user->save();
            toastr()->success('Cập nhật thành công ');
        }catch (\Exception $exception){
            toastr()->error('Thao tác cập nhật lỗi ');
        }

        return redirect()->route('users.index');
    }
}
