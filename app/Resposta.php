<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    protected $fillabel=[
        'descricao',
        'idMensagem',
        'id_user',
        'estado'
    ];

    public function mensagem(){
        return $this->belongsTo('App\Mensagem');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
