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
}
