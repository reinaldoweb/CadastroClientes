<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CadastroRequest;

class CadastroController extends Controller
{
    //Todos os cadastrados

    public function index()
    {
        $clients = Cadastro::orderBy('updated_at', 'desc')->paginate(10);

        return response()->json($clients);
    }

    //Mostra todos os cadastrados

    //Adiconando usuarios
    public function addClient(CadastroRequest $request)
    {
        $cadastro = new Cadastro;
        $cadastro->fill($request->validated());

        if(!$cadastro->save()){
            return response()->json(['message'=> 'erro ao salvar'], 422);
        }

        return response()->json([
            'message' => 'Cadastro adicionado com sucesso!'
        ]);
    }


    //Update cadastrados

    public function update(CadastroRequest $request, $id)
    {
        $usuario = Cadastro::find($id);
        $usuario->fill($request->validated());

        if(!$usuario->save()){
            return response()->json([
                'message' => 'Não foi possível salvar o usuário'
            ]);
        }
        return response()->json([
            'message' => 'Cadastro atualizado com sucesso',
            'usuario' => $usuario
        ]);
    }

    public function getById($id)
    {
        $usuario = Cadastro::find($id);

        return response()->json($usuario);
    }

   //Delete Cadastro
   public function delete($id){
    $user = Cadastro::find($id);
    if(!$user->delete()){
        return response()->json(['message'=> 'Não foi possivel deletar'], 422);
    }

    return response()->json([
        'message' => 'Cadastro deletado com sucesso.'
    ], 200);
   }
}
