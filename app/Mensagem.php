<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillabel=[
        'descricao',
        'user_id',
        'estado'

    ];

    public function respostas(){
        return $this->hasMany('App\Resposta');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
