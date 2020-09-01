<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
    protected $fillable = [
        'user_id',
        'user_projeto',
        'url_foto',
        'legenda'
    ];

    //Relacionamento Projeto_Publicação 1:N
    public function projetos()
    {
        return $this->belongsTo('App\Projeto');
    }
}
