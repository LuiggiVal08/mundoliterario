<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $incrementing = false; // No usar auto-incremento
    protected $keyType = 'string'; // Usar string como tipo de clave primaria
    protected $fillable = ['id', 'name'];
    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
