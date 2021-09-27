<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreGeneralRequest;
use App\Http\Requests\Setting\UpdateGeneralRequest;
use App\Models\Language;
use App\Repositories\Setting\Translate\SettingTranslatableInterface;

class SettingTranslatableController extends Controller
{
    private $settingRepo ;

    public function __construct(SettingTranslatableInterface $settinginterface)
    {
        $this->settingRepo = $settinginterface;
    }
    public function index(){
        $settings = $this->settingRepo->index();

        return view('admin.setting.translatable.index',compact('settings'));
    }

    public function create(){
        $langs = Language::whereStatus(true)->get();

        return view('admin.setting.translatable.new',compact('langs'));
    }

    public function store(StoreGeneralRequest $request){
        $store = $this->settingRepo->store($request->validated());

        return _stsCheck($store);
    }

    public function edit($id){
        $edit = $this->settingRepo->edit($id);
        if(!$edit->getData()->operation){
            return _stsCheck($edit);
        }

        $setting= $edit->getData()->data;
        $langs = Language::whereStatus(true)->get();


        return view('admin.setting.translatable.edit',compact('setting','langs'));
    }

    public function update(UpdateGeneralRequest $request,$id){
        $update =$this->settingRepo->update($request->validated(),$id);
        return _stsCheck($update);
    }

    public function destroy($id){
        $delete  = $this->settingRepo->delete($id);

        return _stsCheck($delete);
    }
}
