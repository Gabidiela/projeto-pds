<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfessorController extends Controller
{
    public function index(Request $request)
    {

        $professores = Professor::join('users', 'professors.users_id', '=', 'users.id')
            ->select('professors.*', 'users.name as nome', 'users.email', 'users.cpf', 
            'users.data_nascimento', 'users.telefone')
            ->whereLike('users.name',  "%{$request->search}%")
            ->orderBy('users.name', 'asc');

        return view('professor.list', [
            'professores' => $professores->get(),
            'search' => $request->search,
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $professor = Professor::join('users', 'professors.users_id', '=', 'users.id')
        ->select('professors.*', 'users.name as nome', 'users.email', 'users.cpf', 
        'users.data_nascimento', 'users.telefone')
        ->where('professors.id', $id)->first();
      //  dd($professor);
        return view('professor.visualizar', [
            'professor' => $professor
        ]);
    }
    public function create()
    {
        return view('professor.criar');
    }

    public function store(Request $request)
    {
       
        $usuario = new User();
        $usuario->name = $request->nome;
        $usuario->cpf = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario->data_nascimento = $request->data_nascimento;
        $usuario->telefone = preg_replace('/[^0-9]/', '', $request->cpf);
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();


        $professor = new Professor();
        $professor->users_id = $usuario->id;
        $professor->especialidade = "";
        $professor->save();

        return redirect()->route('professor.list')->with('success', 'Professor cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $professor = Professor::join('users', 'professors.users_id', '=', 'users.id')
        ->select('professors.*', 'users.name as nome', 'users.email', 'users.cpf', 
        'users.data_nascimento', 'users.telefone')
        ->where('professors.id', $id)->first();
      //  dd($professor);
        return view('professor.editar', [
            'professor' => $professor
        ]); 
    }

    public function update(Request $request, $id)
    {
        $professor = Professor::with(['user', 'user.endereco'])->findOrFail($id);


        $user = $professor->user;

        $user->name = $request->nome;
        $user->cpf = $request->cpf;
        $user->data_nascimento = $request->data_nascimento;
        $user->telefone = $request->telefone;
        $user->email = $request->email;
 
        $user->save();

        return redirect()->route('professor.list')->with('success', 'Professor atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $professor = Professor::with(['user', 'user.endereco'])->findOrFail($id);
        $professor->delete();
        return redirect()->route('professor.list')->with('success', 'Professor excluído com sucesso!');
    }
}
