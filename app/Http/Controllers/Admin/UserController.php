<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userRepo ;

    public function __construct(UserInterface $userinterface)
    {
        $this->userRepo = $userinterface;
    }

    public function index()
    {
        $users = $this->userRepo->index();

        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return  view('admin.user.new');
    }

    public function store(StoreUserRequest $request)
    {
        $store = $this->userRepo->store($request->validated());

        return _stsCheck($store);
    }

    public function edit($id)
    {
        $edit = $this->userRepo->edit($id);
        if(!$edit->getData()->operation){
            return _stsCheck($edit);
        }

        $user = $edit->getData()->data;

        return view('admin.user.edit',compact('user'));
    }

    
    public function photoDelete($id)
    {
        $delete = $this->userRepo->deletePhoto($id);

        return _stsCheck($delete);
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $update = $this->userRepo->update($request->validated(),$id);

        return _stsCheck($update);
    }

    public function destroy($id)
    {
        //
    }
}
