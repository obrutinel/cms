<?php

namespace App\Services;

use Illuminate\Support\Str;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class TemplateService
{
    private string $bladeName = 'custom';
    private string $viewPath = '';
    private LocalFilesystemAdapter $adapter;
    private Filesystem $filesystem;

    public function create(): bool
    {
        if($this->checkIfExist()) {
            return false;
        }

        $adapter = new LocalFilesystemAdapter($this->viewPath);
        (new Filesystem($adapter))
            ->write($this->bladeName, '');

        return true;
    }

    public function copy(string $template = 'index.blade.php'): bool
    {
        if($this->checkIfExist()) {
            return false;
        }

        $adapter = new LocalFilesystemAdapter($this->viewPath);
        (new Filesystem($adapter))
            ->copy($template, $this->bladeName);

        return true;
    }

    public function checkIfExist(): bool
    {
        return file_exists($this->viewPath.$this->bladeName);
    }

    public function destroy(): bool
    {
        if($this->checkIfExist()) {
            return false;
        }

        $this->adapter = new LocalFilesystemAdapter($this->viewPath);
        $this->filesystem = new Filesystem($this->adapter);
        $this->filesystem->delete($this->bladeName);

        return true;
    }

    public function getViewPath(): string
    {
        return $this->viewPath;
    }

    public function setViewPath(string $viewPath): TemplateService
    {
        $this->viewPath = config('view.paths')[0].'/'.$viewPath;
        return $this;
    }

    public function getBladeName(): string
    {
        return $this->bladeName;
    }

    public function setBladeName(string $bladeName): TemplateService
    {
        $this->bladeName = Str::slug($bladeName).'.blade.php';
        return $this;
    }

}