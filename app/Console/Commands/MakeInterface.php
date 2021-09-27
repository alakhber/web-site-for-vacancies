<?php

namespace App\Console\Commands;

use  Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class MakeInterface extends GeneratorCommand
{
    protected $signature = 'make:interface {name}';

    protected $description = 'Create Interface';

    protected $type = 'Interface';

    protected function getStub()
    {
        return base_path() . '/stubs/interface.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Repositories';
    }
}