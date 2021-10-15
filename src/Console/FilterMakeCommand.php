<?php

namespace Darkjinnee\EloquentFilter\Console;

use Illuminate\Console\GeneratorCommand;

class FilterMakeCommand extends GeneratorCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:filter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new filter class';

    /**
     * @var string
     */
    protected $type = 'Filter';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        $relativePath = '/stubs/filter.stub';

        return file_exists($customPath = $this->laravel->basePath(trim($relativePath, '/')))
            ? $customPath
            : __DIR__.$relativePath;
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $path = config('eloquent-filter.path_to_filters', 'Filters');
        $pathNamespace = str_replace('/', '\\', trim($path, ' ' . '\/'));
        return $rootNamespace . '\\' . $pathNamespace;
    }
}
