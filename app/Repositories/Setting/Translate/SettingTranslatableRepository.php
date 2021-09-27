<?php
namespace App\Repositories\Setting\Translate;

use App\Models\SettingTranslatable;
use App\Repositories\Setting\Translate\SettingTranslatableInterface;
use Exception;

class SettingTranslatableRepository implements SettingTranslatableInterface{
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
}