<?php
namespace App\Repositories\Category;

use App\Models\Category;
use Exception;


class CategoryRepository implements CategoryInterface
{

    private $errorMessage = 'Xəta.Zəhmət Olmasa Texniki Dəstəyə Bildirin !';
    private $notFoundMessage = 'Xəta.Kateqorya Mövcud Deyil !';
    private $successCreateMessage = 'Kateqorya Uğurla Əlavə Olundu ! ';
    private $successUpdateMessage = 'Kateqorya Uğurla Redaktə Olundu ! ';
    private $successDeleteMessage = 'Kateqorya Uğurla Silindi ! ';

    public function index()
    {
        try {
            return Category::paginate(25);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }

    public function store($request)
    {
        try {
            Category::create($request);
            return response()->json(['operation' => true, 'data' => [], 'msg' => $this->successCreateMessage], 200);
        } catch (Exception $e) {
            return response()->json(['operation' => false, 'data' => [], 'msg' => $this->errorMessage], 200);
        }
    }
    public function edit($id)
    {
        try {
            $data = Category::find($id);
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
            $data = Category::find($id);
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
            $data = Category::find($id);
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
