<?php

namespace App\Repositories\Setting;

use App\Models\Setting;
use App\Models\SettingTranslatable;
use Exception;
use Illuminate\Support\Facades\Storage;

class SettingRepository implements SettingInterface
{
    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.Məlumat Mövcud Deyil !';
    private $successCreateMessage = 'Məlumat Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'Məlumat Redaktə Olundu ! ';
    private $successDeleteMessage = 'Məlumat Silindi ! ';

    public function index()
    {
        try {
            return SettingTranslatable::with('language')->paginate(25);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            SettingTranslatable::create($request);

            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false,'msg' => $this->errorMessage], 200);
        }
    }

    public function edit($id)
    {
        try {
            $data  = SettingTranslatable::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }

            return response()->json(['operation' => true, 'data' => $data, 'msg' => ''], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false,'msg' => $this->errorMessage], 200);
        }
    }

    public function update($request,$id)
    {
        try {
            $data  = SettingTranslatable::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }

            $data->update($request);
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successUpdateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false,'msg' => $this->errorMessage], 200);
        }
    }

    public function delete($id)
    {
        try {
            $data  = SettingTranslatable::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }

            $data->delete();
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successDeleteMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false,'msg' => $this->errorMessage], 200);
        }
    }

    public function logo($request)
    {
        try {
            $setting=Setting::first();
            Storage::delete(['public/'.$setting->logo]);
            $setting->update(['logo'=>_setName($request['logo'],'setting')->getData()->name]);

            return response()->json(['operation' => true, 'data' => [], 'msg' => 'Logo Uğurla Deyişdirildi !'], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !'], 200);
        }
    }
    public function contact($request)
    {
        try {
            $setting=Setting::first();
           
            $setting->update($request);

            return response()->json(['operation' => true, 'data' => [], 'msg' => 'Məlumatlar Uğurla Deyişdirildi !'], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !'], 200);
        }
    }
   
}
