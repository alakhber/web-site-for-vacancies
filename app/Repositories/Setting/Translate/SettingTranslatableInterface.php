<?php
namespace App\Repositories\Setting\Translate;

interface SettingTranslatableInterface{
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function delete($id);
}