<?php

require '../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

// $_ENV['APP_ENV'] = 'development';
$capsule = new Capsule;
// Configura la conexión según el entorno
echo $_ENV['APP_ENV'];
echo 'hola';
if ($_ENV['APP_ENV'] === 'development') {
    $capsule->addConnection([
        'driver'   => 'sqlite',
        'database' => __DIR__ . '/database.sqlite',
        'prefix'   => '',
    ]);
} else if ($_ENV['APP_ENV'] === 'production') {
    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => $_ENV['DB_HOST'],
        'database'  => $_ENV['DB_DATABASE'],
        'username'  => $_ENV['DB_USERNAME'],
        'password'  => $_ENV['DB_PASSWORD'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);
}

// Inicializar Eloquent
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Obtener todos los archivos de migraciones
$migrationFiles = glob(__DIR__ . '/migrations/*.php');

// Incluir y ejecutar cada archivo de migración
foreach ($migrationFiles as $file) {
    require $file;
}

echo "Migraciones ejecutadas exitosamente.";
