<?php
namespace App\Repositories\Category\Translate;

use Exception;

class CategoryRepository implements CategoryRepository
{

    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.CategoryRepository Mövcud Deyil !';
    private $successCreateMessage = 'CategoryRepository Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'CategoryRepository Uğurla Redaktə Olundu ! ';
    private $successDeleteMessage = 'CategoryRepository Uğurla Silindi ! ';

    public function index()
    {
        try {
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function edit($id)
    {
        try {
            $data = null;
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
            $data = null;
            if(is_null($data)){
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            $data->update($request->validated());
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successUpdateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function delete($id)
    {
        try {
            $data = null;
            if(is_null($data)){
                return response()->json(['operation' => false, 'data' => [], 'msg' => $this->notFoundMessage], 200);
            }
            $data->delete();
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successDeleteMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
}
