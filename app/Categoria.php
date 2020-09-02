<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=["categoria"];

    function projetos()
    {
        return $this->belongsToMany('App\Projeto', 'projeto_categoria');
    }

}
