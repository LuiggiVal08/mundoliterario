<?php

namespace App\Controllers;

use App\Model\Role;
use App\Model\User;
use Firebase\JWT\JWT;
// use Firebase\JWT\ExpiredException;
use Exception;
use Illuminate\Support\Str;

session_start();
class AuthController
{
    private $jwtSecret = 'your_secret_key'; // Cambia esto a una clave segura

    // Generar JWT
    private function generateJWT($user)
    {
        $payload = [
            'sub' => $user->id,
            'email' => $user->email,
            'role' => $user->role->name,
            'iat' => time(),
            'exp' => time() + (60 * 60) // Expira en 1 hora
        ];

        return JWT::encode($payload, $this->jwtSecret, 'HS256');
    }

    // Login
    public function login($data)
    {

        $username = $data['username'];
        $password = $data['password'];

        $user = User::where('username', $username)->first();
        if (!$user) {
            return responseController('Usuario no encontrado', null, 404);
        }

        if (password_verify($password, $user->password)) {
            $token = $this->generateJWT($user);

            // Guardar en sesión
            $_SESSION['user'] = [
                'id' => $user->id,
                'email' => $user->email,
                'role' => $user->role->name,
                'token' => $token
            ];

            return responseController(null, $token, 200);
        }

        return responseController('Credenciales incorrectas', null, 401);
    }

    // Registro + login automático
    public function register($data)
    {
        try {
            $role = Role::where('name', 'user')->first();
            if (!$role) {
                $role = new Role();
                $role->id = Str::uuid();
                $role->name = 'user';
                $role->save();
            }
            $usernameFound = User::where('username', $data['username']);

            if (!$usernameFound) {
                return responseController('Nombre de usuario existente', null, 201);
            }


            $password = $data['password'];
            // Crear nuevo usuario
            $data['id'] = (string) Str::uuid();
            $data['role_id'] = $role->id;
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $user = User::create($data);
            if (!$user) {
                return responseController('Error creando usuario', null, 404);
            }
            $token = $this->generateJWT($user);

            $_SESSION['user'] = [
                'id' => $user->id,
                'role' => $user->role->name,
                'token' => $token
            ];
            return $this->login([
                'username' => $user['username'],
                'password' => $password
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            return responseController($th->getMessage(), null, 500);
        }
    }

    // Logout
    public function logout()
    {
        session_destroy(); // Eliminar la sesión actual
        return ['data' => null, 'error' => null, 'status' => 200, 'message' => 'Logout successful'];
    }

    // Validar token JWT
    // public function validateToken($token)
    // {
    //     try {
    //         $decoded = JWT::decode($token, $this->jwtSecret, ['HS256']);
    //         return ['data' => $decoded ?? null, 'error' => null, 'status' => 200];
    //     } catch (ExpiredException $e) {
    //         return ['data' => null, 'error' => 'Token has expired', 'status' => 401];
    //     } catch (Exception $e) {
    //         return ['data' => null, 'error' => 'Invalid token', 'status' => 401];
    //     }
    // }


    // Obtener información del usuario autenticado
    // public function getAuthenticatedUser()
    // {
    //     session_start();

    //     if (isset($_SESSION['user'])) {
    //         return ['data' => $_SESSION['user'], 'error' => null, 'status' => 200];
    //     }

    //     return ['data' => null, 'error' => 'No user authenticated', 'status' => 401];
    // }
}
