<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Habilidade extends Model
{
    protected $fillable = [
        'habilidade',
    ];

    public function vagas()
    {
        return $this->belongsToMany('App\Vaga', 'habilidade_vaga', 'habilidade_id', 'vaga_id'); 

    }

    // N usuarios: N habilidades

    public function users()
    {
        return  $this->belongsToMany('App\User', 'user_habilidade', 'habilidade_id', 'user_id');
    }
}
