<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience_card extends Model
{
    protected $fillable = ['user_id', 'titulo', 'descricao', 'localizacao', 'data_realizacao', 'url_foto'];

    public function experience_card_categorias()
    {
      return this->belongsToMany('App\User', 'experience_card_categoria', 'experience_card_id', 'categoria_id');
    }

}
