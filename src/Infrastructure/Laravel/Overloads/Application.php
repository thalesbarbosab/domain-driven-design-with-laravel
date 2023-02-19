<?php

namespace App\Infrastructure\Laravel\Overloads;

use RuntimeException;
use Illuminate\Foundation\Application as LaravelApplication;

class Application extends LaravelApplication
{
    /**
     * Get the path to the application configuration files.
     *
     * @param  string  $path
     * @return string
     */
    public function configPath($path = '')
    {
        // return $this->basePath.DIRECTORY_SEPARATOR.'config'.($path != '' ? DIRECTORY_SEPARATOR.$path : '');
        return $this->basePath
        .DIRECTORY_SEPARATOR
        .'src'
        .DIRECTORY_SEPARATOR
        .'Infrastructure'
        .DIRECTORY_SEPARATOR
        .'Laravel'
        .DIRECTORY_SEPARATOR
        .'config'
        .($path != '' ? DIRECTORY_SEPARATOR.$path : '');
    }

     /**
     * Get the application namespace.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public function getNamespace()
    {

        if (! is_null($this->namespace)) {
            return $this->namespace;
        }

        $composer = json_decode(file_get_contents($this->basePath('composer.json')), true);

        foreach ((array) data_get($composer, 'autoload.psr-4') as $namespace => $path) {
            foreach ((array) $path as $pathChoice) {
                if (realpath($this->path()) === realpath($this->basePath($pathChoice))) {
                    return $this->namespace = $namespace;
                }
            }
        }
        return $this->namespace = 'App\\';
    }

    /**
     * Get the path to the bootstrap directory.
     *
     * @param  string  $path
     * @return string
     */
    public function bootstrapPath($path = '')
    {
        // return $this->basePath.DIRECTORY_SEPARATOR.'bootstrap'.($path != '' ? DIRECTORY_SEPARATOR.$path : '');
        return $this->basePath
        .DIRECTORY_SEPARATOR
        .'src'
        .DIRECTORY_SEPARATOR
        .'Infrastructure'
        .DIRECTORY_SEPARATOR
        .'Laravel'
        .DIRECTORY_SEPARATOR
        .'bootstrap'
        .($path != '' ? DIRECTORY_SEPARATOR.$path : '');
    }
}

