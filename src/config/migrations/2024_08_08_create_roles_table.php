<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->schema()->create('roles', function ($table) {
    $table->uuid('id')->primary();
    $table->string('name')->notNullable();
    $table->timestamps();
});
