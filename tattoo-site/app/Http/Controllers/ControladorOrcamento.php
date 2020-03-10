<?php

namespace App\Http\Controllers;

use App\Orcamento;
use Illuminate\Http\Request;

class ControladorOrcamento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orcamento = Orcamento::all()
            ->sortByDesc('created_at');
        return view('visualizaOrcamento',compact('orcamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitaOrcamento');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'telefone' => 'required|numeric',
            'email' => 'email|nullable',
            'parte_corpo' => 'required',
            'outra_parte' => 'required_if:parte_corpo,Outra',
            'tamanho' => 'required',
            'cor' => 'required',
            'arquivo' => 'nullable|image|max:5120',
            'descricao' => 'required|string'
        ]);

        $orcamento = new Orcamento();

        $orcamento->nome = $request->nome;
        $orcamento->telefone = $request->telefone;
        $orcamento->email = $request->email;
        $orcamento->tamanho_tattoo = $request->tamanho;
        $orcamento->parte_corpo = $request->parte_corpo;
        $orcamento->outra_parte = $request->outra_parte;
        $orcamento->cor = $request->cor;
        $orcamento->descricao = $request->descricao;
        $path = $request->file('arquivo')->store('exemplos');
        $orcamento->imagem_exemplo = $path;
        $orcamento->status = 'Novo';

        $orcamento->save();

        return redirect('/orcamento');

    }

    public function pesquisar(Request $request){
        $filtro = $request->filtro;
        $valor = $request->valor;
        $data_inicio = $request->data_inicio;
        $data_fim = $request->data_fim;

        if($filtro === 'nome' || $filtro === 'telefone' || $filtro === 'email'){
            $orcamento = Orcamento::where($filtro,'like',$valor.'%');
        } else if($filtro === 'parte_corpo'){
            $orcamento = Orcamento::where('parte_corpo','like',$valor.'%')
                ->orWhere('outra_parte','like',$valor.'%');
        } else if($filtro === 'descricao'){
            $orcamento = Orcamento::where($filtro,'like','%'.$valor.'%');
        }

        if(isset($data_inicio) && isset($data_fim)){
            $orcamento = $orcamento->whereBetween('created_at',[$data_inicio,$data_fim]);
        }

        $orcamento = $orcamento->orderBy('created_at','desc')
            ->get();

        return view('visualizaOrcamento',compact('orcamento'));

    }
}
