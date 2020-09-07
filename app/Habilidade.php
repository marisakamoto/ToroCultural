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
        return $this->belongsToMany('App\Habilidade', 'habilidade_vaga', 'habilidade_id', 'vaga_id');
    }

}
