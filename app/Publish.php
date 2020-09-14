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
    public function projeto()
    {
        return $this->belongsTo('App\Projeto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
