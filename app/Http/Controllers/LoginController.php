<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return response()->json($usuarios);
    }

    public function autenticar(Request $request)
    {

        $email = $request->get('email');
        $password = $request->get('password');

        $user = new User();
        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();
        if (isset($usuario->email)) {
            return response()->json(['message' => 'Usuario não existe']);
        }
        return response()->json(['message' => 'Usuario existe']);
    }

    public function store(StoreUserRequest $request)
    {
        $users = User::create($request->all());
        return new UserResource($users);
        if (!$users) {
            return response()->json(['message' => 'Erro ao salvar', 422]);
        }
        return response()->json(['message' => 'Usuario cadastrado com sucesso!']);
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['message' => 'Usúario atualizado com sucesso']);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Usúario deletado com sucesso!'], 200);
    }
}
