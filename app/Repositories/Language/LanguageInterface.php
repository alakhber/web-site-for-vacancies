<?php

namespace App\Repositories\Language;

interface LanguageInterface {
    public function index();
    public function store($request);
    public function edit($id);
    public function update($request,$id);
    public function delete($id);
    public function chngStatus($id);
    public function setDefaultLang($id);
}