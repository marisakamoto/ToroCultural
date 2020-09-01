<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = [
        'user_id',
        'titulo',
        'descricao',
        'localizacao',
        'data_de_realizacao',
        'url_foto'
    ];
}
