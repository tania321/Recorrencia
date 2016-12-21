<?php

namespace App\Http\Controllers;

use App\Mensagem;
use App\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RespostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user=Auth::user();
        $mensagem = Mensagem::find($id);
        return view('resposta.create', compact('mensagem'))->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'descricao'=>'required',
            'estado'=>'required'
        ]);

        $resposta=new Resposta();
        $resposta->descricao=Input::get('descricao');
        $resposta->estado=Input::get('estado');
        $resposta->idMensagem=Input::get('idMensagem');
        $resposta->user_id = Auth::id();

        $resposta->save();

        Session::flash('message','Gravado com sucesso');
        return redirect()->route('mensagem.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resposta = Resposta::find($id);

        return view('resposta.edit', compact('resposta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'descricao'=>'required',
            'estado'=>'required'
        ]);
        $resposta=Resposta::find($id);

        $resposta->descricao=Input::get('descricao');
        $resposta->estado=Input::get('estado');
        $resposta->idMensagem=Input::get('idMensagem');
        $resposta->user_id = Auth::id();

        $resposta->save();

        Session::flash('message','Editado com sucesso');
        return redirect()->route('mensagem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
