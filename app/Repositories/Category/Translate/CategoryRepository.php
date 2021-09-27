<?php
namespace App\Repositories\Category\Translate;

use App\Models\CategoryTranslatable;
use Exception;

class CategoryRepository implements CategoryRepository
{

    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.Kateqorya Mövcud Deyil !';
    private $successCreateMessage = 'Kateqorya Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'Kateqorya Uğurla Redaktə Olundu ! ';
    private $successDeleteMessage = 'Kateqorya Uğurla Silindi ! ';

    public function index($pid)
    {
        try {
            return CategoryTranslatable::where('parent_id',$pid)->paginate(25);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            CategoryTranslatable::create($request);
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function edit($id)
    {
        try {
            $data = CategoryTranslatable::find($id);
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
            $data = CategoryTranslatable::find($id);
            if(is_null($data)){
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
            $data = CategoryTranslatable::find($id);
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
