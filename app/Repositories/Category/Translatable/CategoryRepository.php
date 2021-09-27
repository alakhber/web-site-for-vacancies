<?php
namespace App\Repositories\Category\Translatable;

use Exception;
use App\Models\CategoryRepository;

class CategoryRepositoryRepository implements CategoryRepositoryInterface
{

    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.CategoryRepository Mövcud Deyil !';
    private $successCreateMessage = 'CategoryRepository Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'CategoryRepository Uğurla Redaktə Olundu ! ';
    private $successDeleteMessage = 'CategoryRepository Uğurla Silindi ! ';

    public function index()
    {
        try {
            return CategoryRepository::all();
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            CategoryRepository::create($request);
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function edit($id)
    {
        try {
            $data = CategoryRepository::find($id);
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
            $data = CategoryRepository::find($id);
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
            $data = CategoryRepository::find($id);
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
