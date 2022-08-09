<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
        $users = User::all();
        return response()->json(
            [
                'status' => 'success',
                'users' => $users,
            ]
        );
    }

    public function store(Request $request)
    {

        $users = User::create($request->all());
        if (!$users) {
            return response()->json(['message' => 'Erro ao salvar', 422]);
        } else {
            return response()->json(['message' => 'Usuário criado com sucesso!']);
        }
        return new UserResource($users);
    }

    public function show($id)
    {
        $user = User::find($id);
        return response()->json([
            'status' => 'success',
            'user' => $user,
        ]);
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->fill($request->validated());
        return response()->json(['message' => 'Usuário atualizado com sucesso']);
    }

    public function destroy($id)
    {
        $users = User::where('id', $id)->firstorfail()->delete();
        return response()->json([
            'message' => 'Usuário deletado com sucesso.'
        ], 200);
    }
}
