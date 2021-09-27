<?php

namespace App\Console\Commands;

use  Illuminate\Console\GeneratorCommand ;
use Illuminate\Support\Str;

class MakeRepository extends GeneratorCommand
{
    protected $signature = 'make:repository {name} ';

    
    protected $description = 'Create Repository';

    protected $type = 'Repository'; 

    protected function getStub()
    {
        return base_path() . '/stubs/repository.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }
}