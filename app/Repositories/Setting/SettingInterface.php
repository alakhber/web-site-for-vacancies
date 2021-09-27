<?php
namespace App\Repositories\Setting;

interface SettingInterface{
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function delete($id);
    public function logo($request);
    public function contact($request);
}