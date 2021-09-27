<?php

namespace App\Repositories\Language;

use App\Models\Language;
use App\Models\Setting;
use Exception;

class LanguageRepository implements LanguageInterface
{

    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.Dil Mövcud Deyil !';
    private $successCreateMessage = 'Yeni Dil Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'Dil Uğurla Redaktə Olundu ! ';
    private $successDeleteMessage = 'Dil Uğurla Silindi ! ';

    public function index()
    {
        try {
            return  Language::paginate(25);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            Language::create($request);
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function edit($id)
    {
        try {
            $data = Language::find($id);
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
            $data = Language::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
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
            $data = Language::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            $data->delete();
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successDeleteMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function chngStatus($id)
    {
        try {
            $data = Language::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            
            if ($data->status) {
                if(Setting::first()->locale==$data->locale){
                    return response()->json(['operation' => false, 'data' => [], 'msg' => $data->country.' Dili Default Dil Olduğu Üçün Deaktiv Edilə Bilməz !'], 200);
                }
                $data->update(['status' => false]);
                $message = $data->country . ' Dili Deaktiv Edildi !';
            } else {
                $data->update(['status' => true]);
                $message = $data->country . ' Dili Aktiv Edildi !';
            }
            return response()->json(['operation' => true, 'data' => [], 'msg' => $message], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function setDefaultLang($id)
    {
        try {
            $data = Language::find($id);
            if (is_null($data)) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            if (!$data->status) {
                return response()->json(['operation' => false, 'data' => [], 'msg' => $data->country.' Dili Aktiv Olmadığı Üçün Default Dil Təyin Edilə Bilməz !'], 200);
            }
            Setting::first()->update(['locale' => $data->locale]);

            return response()->json(['operation' => true, 'data' => [], 'msg' => $data->country . ' Dili Default Dil Təyin Edildi !'], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
}
