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
    public function projeto()
    {
        return $this->belongsTo('App\Projeto');
    }
}
