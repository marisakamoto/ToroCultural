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

    public function getCreatedAtAttribute($value)
    {
        //ALETERAR FORMATO DA DATA QUE VEM DO DATABASE
        return \Carbon\Carbon::parse($value)->format('d/m/y');
	    
    }

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
