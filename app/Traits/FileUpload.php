<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    public function uploadFile($file, $directory)
    {
        if ($file) {
            $filename = time() . '-' . $file->hashName(); // генерация уникального имени
            $file->storeAs('public/' . $directory, $filename);

            return $directory . '/' . $filename;
        }

        return null;
    }

    public function deleteFile($file_path)
    {
        $file_path = 'public/' . $file_path;

        if ($file_path && Storage::exists($file_path)) {
            return Storage::delete($file_path);
        }

        return false;
    }
}
