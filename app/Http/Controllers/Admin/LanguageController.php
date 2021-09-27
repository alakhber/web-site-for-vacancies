<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Language\LangRequest;
use App\Http\Requests\Language\ULangRequest;
use App\Models\Setting;
use App\Repositories\Language\LanguageInterface;

class LanguageController extends Controller
{
    private $langRepo;

    public function __construct(LanguageInterface $langinterface)
    {
        $this->langRepo = $langinterface;
    }
    public function index()
    {
        $langs =  $this->langRepo->index();
        $defaultLang = Setting::first();
        return view('admin.lang.index',compact('langs','defaultLang'));
    }

    public function create()
    {
        return view('admin.lang.new');
    }

    public function store(LangRequest $request)
    {
        $store = $this->langRepo->store($request->validated());

        return _stsCheck($store);
    }

    public function edit($id)
    {
        $edit = $this->langRepo->edit($id);
        if(!$edit->getData()->operation){
            return _stsCheck($edit);
        }
        $lang= $edit->getData()->data;

        return view('admin.lang.edit',compact('lang'));
    }

    public function update(ULangRequest $request, $id)
    {
        $update = $this->langRepo->update($request->validated(),$id);

        return _stsCheck($update);
    }

    public function destroy($id)
    {
        $delete = $this->langRepo->delete($id);

        return _stsCheck($delete);
    }

    public function status($id){
        $status = $this->langRepo->chngStatus($id);

        return _stsCheck($status);
    }

    public function default($id){
        $default = $this->langRepo->setDefaultLang($id);

        return _stsCheck($default);
    }
}
