<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cadastro;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CadastroRequest;
use Illuminate\Support\Facades\Storage;

class CadastroController extends Controller
{
    //Todos os cadastrados

    public function index()
    {
        $clients = Cadastro::orderBy('updated_at', 'desc')->paginate(5);

        return response()->json($clients);
    }

    //Mostra todos os cadastrados

    //Adiconando usuarios
    public function addClient(CadastroRequest $request)
    {
        $cadastro = new Cadastro;
        $cadastro->fill($request->validated());

        $cadastro->image = $this->upload($request);

        if (!$cadastro->save()) {
            return response()->json(['message' => 'erro ao salvar'], 422);
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
        $usuario->image = $this->upload($request);
        if (!$usuario->save()) {
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
    public function delete($id)
    {
        $user = Cadastro::find($id);
        if (!$user->delete()) {
            return response()->json(['message' => 'Não foi possivel deletar'], 422);
        }

        return response()->json([
            'message' => 'Cadastro deletado com sucesso.'
        ], 200);
    }

    public function upload(Request $request)
    {
        //Define o valor default para a variavel que contém a imagem
        $upload = null;
        //Vefifica se informou o arquivo e se é valido
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            //Define um valor aleatorio para o arquivo
            $name = uniqid(date('HisYmd'));
            //Recupera a extensao do arquivo
            $extension = $request->image->getClientOriginalExtension();
            $nameFile = null;
            //Define o nome
            $nameFile = "{$name}.{$extension}";
            //Fazendo upload
            $path = $request->image->storeAs('imagem', $nameFile, 'public');
            $upload = Storage::url($path);
        }
        return $upload;
    }
}
