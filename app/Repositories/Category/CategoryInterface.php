<?php

namespace App\Repositories\Category;

interface CategoryInterfaceInterface {
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function delete($id);
}