<?php

namespace App\Services;

use Illuminate\Support\Str;
use League\Flysystem\Filesystem;
use League\Flysystem\Local\LocalFilesystemAdapter;

class TemplateService
{
    private string $bladeName;
    private string $viewPath;
    private LocalFilesystemAdapter $adapter;
    private Filesystem $filesystem;

    public function __construct(string $template)
    {
        $this->viewPath = config('view.paths')[0].'/'.config('cms.frontend_views_path');
        $this->bladeName = Str::slug($template).'.blade.php';
        $this->adapter = new LocalFilesystemAdapter($this->viewPath);
        $this->filesystem = new Filesystem($this->adapter);
    }

    public function create(): bool
    {
        if($this->checkIfExist()) {
            return false;
        }

        $this->filesystem->write($this->bladeName, '');

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

        $this->filesystem->delete($this->bladeName);

        return true;
    }

}