<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->schema()->create('users', function ($table) {
    $table->uuid('id')->primary();
    $table->string('name');
    $table->string('lastname');
    $table->string('username')->unique();
    $table->string('password');
    $table->uuid('role_id');
    $table->timestamps();
});
