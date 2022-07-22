<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;

class CadastroController extends Controller
{
    //Todos os cadastrados

    public function index()
    {
        $cadastro = Cadastro::all();
        return view('site.all', ['titulo'=>'Usuários cadastados', 'users'=> $cadastro]);
    }

    //Adiconando usuarios
    public function add(Request $request)
    {
        $cadastro = new Cadastro([
            'nome' => $request->input('nome'),
            'sobrenome' => $request->input('sobreNome'),
            'email' => $request->input('email'),
            'telefone' => $request->input('telefone'),
            'idade' => $request->input('idade')
        ]);
        $cadastro->save();
        return response()->json('Cadastro adicionado com sucesso!');
    }

    //Editar usuarios
    public function edit($id)
    {
        $users = Cadastro::find($id);
        return response()->json($users);
    }


    //Update cadastrados

    public function update($id, Request $request){
        $user = Cadastro::find($id);
        $user->update($request->all());
        return response()->json('Cadastro atualizado com sucesso');
    }

   //Delete Cadastro
   public function delete($id){
    $user = Cadastro::find($id);
    $user->delete();
    return response()->json('Cadstro deletado com sucesso.');
   }
}
