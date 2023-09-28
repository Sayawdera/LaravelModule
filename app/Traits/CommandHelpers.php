<?php

namespace App\Traits;

use Illuminate\Filesystem\Filesystem;

trait CommandHelpers
{
    /**
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();

        $this->Filesystem = $filesystem;
    }

    /**
     * @param $path
     * @return mixed
     */
    protected function makeDirectory($path): mixed
    {
        if (! $this->Filesystem->isDirectory(dirname($path)) )
        {
            $this->Filesystem->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }

    /**
     * @param $path
     * @return bool
     */
    protected function alreadyExists($path): bool
    {
        return $this->Filesystem->exists($path);
    }
}
