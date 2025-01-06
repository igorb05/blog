<?php

namespace App\Http\Controllers;

use App\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrixController extends Controller
{
    use FileUpload;

    public function store(Request $request)
    {
        $request->validate(['file' => ['required', 'file', 'max:2048']]);
        $path = $this->uploadFile($request->file('file'), 'uploads');

        return response()->json([
            'url' => $url = asset(file_url($path)),
            'href' => $url,
        ]);
    }

    public function delete(Request $request)
    {
        $url = $request->input('url');
        $path = substr(parse_url($url, PHP_URL_PATH), strlen('/storage'));

        $this->deleteFile($path)
            ? Log::info("Файл $path – успешно удален")
            : Log::alert("Не удалось удалить файл – $path");

        return response()->json([
            'message' => 'ОК',
        ]);
    }
}
