<?php
require 'src/middlewares/AuthMiddleware.php';

use Illuminate\Support\Str;

Flight::group('/api', function () {

    Flight::route('GET /', function () {
        Flight::json(['response' => Str::uuid()]);
    });
    function handleResponse(array $data)
    {
        if (isset($data['error']) && $data['error']) {
            Flight::halt($data['status'], json_encode($data));
        }

        Flight::json($data, $data['status']);
    }
    // Ruta al directorio donde se encuentran los controladores
    $directory = __DIR__;

    // Escanea el directorio y obtiene todos los archivos PHP
    foreach (scandir($directory) as $file) {
        // Verifica que sea un archivo PHP y no sea un directorio
        if (is_file($directory . '/' . $file) && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
            require_once $directory . '/' . $file;
        }
    }
});
