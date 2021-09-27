<?php

namespace App\Repositories\User;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserInterface
{

    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.İstifadəçi Mövcud Deyil !';
    private $successCreateMessage = 'İstifadəçi Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'İstifadəçi Uğurla Redaktə Olundu ! ';
    private $successDeleteMessage = 'İstifadəçi Uğurla Silindi ! ';

    public function index()
    {
        try {
            return User::select('id','fullname','username','email')->get();
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            if (isset($request['photo'])) {
                $request['photo'] = _setName($request['photo'], 'user')->getData()->name;
            }
            $request['password'] = Hash::make($request['password']);
            User::create($request);

            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function edit($id)
    {
        try {
            $data = User::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            return response()->json(['operation' => true, 'data' => $data, 'msg' => ''], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function update($request, $id)
    {
        try {
            $data = User::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            if (isset($request['photo'])) {
                $request['photo'] = _setName($request['photo'], 'user')->getData()->name;
                Storage::delete('public/' . $data->photo);
            }
            if(!is_null($request['password'])){
                $request['password'] = Hash::make($request['password']);
            }else{
                unset($request['password']);
            }
            $data->update($request);
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successUpdateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function delete($id)
    {
        try {
            $data = User::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            $data->delete();
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successDeleteMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function deletePhoto($id)
    {
        try {
            $data = User::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            Storage::delete('public/' . $data->photo);
            $data->update(['photo' => null]);

            return response()->json(['operation' => true, 'data' => [], 'msg' => 'Şəkil Uğurla Silindi !'], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
}
