<?php

namespace App\Repositories\User;

interface UserInterface {
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function delete($id);
    public function deletePhoto($id);

}