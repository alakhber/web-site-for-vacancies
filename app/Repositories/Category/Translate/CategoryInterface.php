<?php

namespace App\Repositories\Category\Translate;

interface CategoryInterface {
    public function index($pid);
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function delete($id);
}