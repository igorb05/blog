<?php

if (!function_exists('app_url')) {

    /**
     * Возвращает домен сайта, убирает лишнние слэши
     *
     * @param string $path
     * @return string
     */
    function app_url(string $path = ''): string
    {
        return implode('/', array_filter([
            trim(config('app.url'), '/'),
            trim($path, '/'),
        ]));
    }
}

if (!function_exists('file_url')) {

    /**
     * Возвращает путь к файлу
     *
     * @param string $path
     * @return string
     */
    function file_url(string $path): string
    {
        return Storage::url('public/' . $path);
    }
}

if (!function_exists('uuid')) {

    /**
     * Возвращает UUID
     *
     * @return string
     */
    function uuid(): string
    {
        return (string) Str::uuid();
    }
}

if (!function_exists('code')) {

    /**
     * Возвращает CODE
     *
     * @return string
     */
    function code(): string
    {
        return (string) rand(100000, 999999);
    }
}


