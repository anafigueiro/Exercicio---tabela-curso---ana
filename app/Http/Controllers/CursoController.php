<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /*Carrega a listagem de dados*/
    public function index()
    {
        $cursos = Curso::all();

        return view('curso.list')->with(['curso'=> $cursos]);
    }

    /*Carrega o formulário*/
    public function create()
    {
        return view('curso.form');
    }

    /*Salva os dados do formulário*/
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required|max:150',
            'requisito'=>'max:100'
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 150 caracteres no :attribute !",
            'requisito.max'=>" Só é permitido 100 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'requisito'=> $request->requisito,
            'carga_horario'=> $request->carga_horario,
            'valor'=> $request->valor
        ];

        Curso::create($dados); //ou  $request->all()

        return redirect('curso')->with('success', "Cadastrado com sucesso!");
    }

    /*Carrega apenas 1 registro da tabela*/
    public function show(Curso $curso)
    {
        //
    }

    /*Carrega o formulário para edição*/
    public function edit($id)
    {
        $curso = Curso::find($id); //select * from curso where id = $id

        return view('curso.form')->with(['curso'=>$curso]);
    }

    /*Atualiza os dados do formulário*/
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nome'=>'required|max:150',
            'requisito'=>'max:100'
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 150 caracteres no :attribute !",
            'requisito.max'=>" Só é permitido 100 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'requisito'=> $request->requisito,
            'carga-horario'=> $request->carga_horario,
            'valor'=> $request->valor
        ];

        Curso::updateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('curso')->with('success', "Atualizado com sucesso!");

    }

    /*Remove o registro do banco de dados*/
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        $curso->delete();

        return redirect('curso')->with('success', "Removido com sucesso!");
    }
    /*Pesquisa e filtra o registro do banco de dados*/
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $cursos = Curso::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $cursos = Curso::all();
        }

        return view('curso.list')->with(['cursos'=> $cursos]);
    }
}
