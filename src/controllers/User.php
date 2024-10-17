<?php

namespace App\Controllers;

// require_once 'src/models/User.php';

use App\Model\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController
{
    // Obtener todos los usuarios
    public function getAll()
    {
        $users = User::all();
        return responseController(null, $users, 200);
    }

    // Obtener un usuario por ID
    public function getById($id)
    {
        try {
            $user = User::findOrFail($id);
            return responseController(null, $user, 200);
        } catch (ModelNotFoundException $e) {
            return responseController('User not found', null, 404);
        }
    }

    // Crear un nuevo usuario
    public function create($data)
    {
        $user = User::create($data);
        responseController(null, $user, 201);
    }

    // Actualizar un usuario existente
    public function update($id, $data)
    {
        try {
            $user = User::findOrFail($id);
            $user->update($data);
            return responseController(null, $user, 200);
        } catch (ModelNotFoundException $e) {
            return responseController('User not found', null, 404);
        }
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return responseController(null, 'deleted successfully', 200);
        } catch (ModelNotFoundException $e) {
            return responseController('User not found', null, 404);
        }
    }
}
