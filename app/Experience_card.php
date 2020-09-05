<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience_card extends Model
{
    protected $fillable = ['user_id', 'titulo', 'descricao', 'localizacao', 'data_realizacao', 'url_foto'];
    
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

