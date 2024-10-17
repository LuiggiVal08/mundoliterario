<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->schema()->create('roles', function ($table) {
    $table->increments('id');
    $table->string('name')->notNullable();
    $table->timestamps();
});
