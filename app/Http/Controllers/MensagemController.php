<?php

namespace App\Http\Controllers;

use App\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class MensagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensagens=Mensagem::all();
        $user=Auth::user();
        return view('mensagem.index', compact('mensagens'))->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Auth::user();
        return view('mensagem.create')->with(compact('user'));
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

        $mensagem=new Mensagem();
        $mensagem->descricao=Input::get('descricao');
        $mensagem->estado=Input::get('estado');
        $mensagem->user_id = Auth::id();

        $mensagem->save();

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
        $comentarios =DB::table('respostas')->where('idMensagem','=', $id)->get();
        $mensagem = Mensagem::find($id);
        return view('mensagem.show', compact('comentarios'))->with(compact('mensagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensagem = Mensagem::find($id);

        return view('mensagem.edit', compact('mensagem'));
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

        $mensagem=Mensagem::findOrfail($id);
        $mensagem->descricao=Input::get('descricao');
        $mensagem->estado=Input::get('estado');
        $mensagem->user_id = Auth::id();

        $mensagem->save();

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
        $mensagem=Mensagem::findOrfail($id);

        $mensagem->delete();

        Session::flash('message','Removido com sucesso');
        return redirect()->route('mensagem.index');
    }
}
