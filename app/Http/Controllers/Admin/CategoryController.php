<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\Category\CategoryInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   private  $catRepo ;

   public function __construct(CategoryInterface $catinterface)
   {
       $this->catRepo = $catinterface;
   }
    public function index()
    {
        $cats = $this->catRepo->index();

        return view('admin.category.index',compact('cats'));
    }

   
    public function create()
    {
        return view('admin.category.new');
    }

    public function store(StoreCategoryRequest $request)
    {
        $store = $this->catRepo->store($request->validated());

        return _stsCheck($store);
    }

    public function edit($id)
    {
        $edit = $this->catRepo->edit($id);
        if(!$edit->getData()->operation){
            return _stsCheck($edit);
        }
        $category  = $edit->getData()->data;

        return view('admin.category.edit',compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $update = $this->catRepo->update($request->validated(),$id);

        return _stsCheck($update);
    }

    public function destroy($id)
    {
        $delete = $this->catRepo->delete($id);

        return _stsCheck($delete);
    }
}
