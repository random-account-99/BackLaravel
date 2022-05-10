<?php

namespace App\Http\Controllers;

use App\Models\Pessoas;
use App\Models\Disciplinas;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getPessoas(){
        $pessoas = Pessoas::get()->toJson(JSON_PRETTY_PRINT);
        return response ($pessoas, 200);
        //todas as pessoas
    }

    public function getPessoa($id){
        //pega uma pessoa apenas

        if(Pessoas::where('id',$id)->exists()){
            $pessoa = Pessoas::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response ($pessoa, 200);
        }else{
            return response()->json([
                "message"=> "Pessoa não existe"
            ], 404);
        }
    }

    public function deletePessoa($id){
        //pega uma pessoa apenas

        if(Pessoas::where('id',$id)->exists()){
            $pessoa = Pessoas::find($id);
            $pessoa->delete();
            return response()->json([
                "message"=> "Pessoa excluída com sucesso"
            ], 202);
        }else{
            return response()->json([
                "message"=> "Pessoa não existe"
            ], 404);
        }
    }

    public function createPessoa(Request $request){
        //criação de pessoa
        $pessoa = new Pessoas();
        $pessoa->id = $request->id;
        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email;

        $pessoa->save();

        return response()->json([
            "message"=> "Pessoa criada com sucesso"
        ], 201);
    }


    //disciplinas
    public function getDisciplinas(){
        $disciplinas = Disciplinas::get()->toJson(JSON_PRETTY_PRINT);
        return response ($disciplinas, 200);
        //todas as pessoas
    }

    public function getDisciplina($id){
        //pega uma pessoa apenas

        if(Disciplinas::where('id',$id)->exists()){
            $disciplina = Disciplinas::where('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response ($disciplina, 200);
        }else{
            return response()->json([
                "message"=> "Disciplina {{$id}} não existe"
            ], 404);
        }
    }

    public function createDisciplina(Request $request){
        //criação de pessoa
        $disciplina = new Disciplinas();
        $disciplina->id = $request->id;
        $disciplina->nome = $request->nome;
        $disciplina->descricao = $request->descricao;

        $disciplina->save();

        return response()->json([
            "message"=> "Disciplina criada com sucesso"
        ], 201);
    }

    public function deleteDisciplina($id){        

        if(Disciplinas::where('id',$id)->exists()){
            $disciplina = Disciplinas::find($id);
            $disciplina->delete();
            return response()->json([
                "message"=> "Disciplina {{$id}} excluída com sucesso"
            ], 202);
        }else{
            return response()->json([
                "message"=> "Disciplina {{$id}} não existe"
            ], 404);
        }
    }

}
