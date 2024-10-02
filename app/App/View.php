<?php

namespace Pzn\BelajarMVC\App;

class View
{
    public static function render(string $view, array $model = [])
    {
        // Mengubah array model menjadi variabel
        extract($model);

        // Path lengkap untuk view
        $viewPath = __DIR__ . '/../View/' . $view . '.php';

        // Cek apakah file view ada
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            echo "View $view tidak ditemukan!";
        }
    }
}
