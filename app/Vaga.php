<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'status',
        'projeto_id'
    ];

    //Relacionametno Projeto_vaga 1:N
    public function projetos()
    {
        return $this->belongsTo('App\Projeto');
    }
}
