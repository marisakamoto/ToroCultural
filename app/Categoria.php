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

    public function experience_card_categorias()
    {
      return this->belongsToMany('App\User', 'experience_card_categoria', 'categoria_id', 'experience_card_id');
    }

}
