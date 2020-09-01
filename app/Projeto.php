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

    //Relacionamento com o usuário criador 1:N
    public function users()
    {
        return $this->belongsTo('App\User');
    }

    //Relacionamento entre Projetos e categorias N:N
    public function categorias()
    {
        return $this->belongsToMany('App\categoria');
    }

    //Relacionamento Projeto_Usuario_Colaborador N:N
    public function projeto_user_colaborador()
    {
        return $this->belongsToMany('App\User');
    }

    //Relacionametno Projeto_vaga 1:N
    public function vagas()
    {
        return $this->hasMany('App\Vaga');
    }

    //Relacionamento Projeto_Publicação 1:N
    public function publishes()
    {
        return $this->hasMany('App\Publish');
    }

    //Telacionamento: Usuário pode ser guir vários projetos e um projeto pode ser seguido 
    // por vários usuários N:N
    public function user_projetoSeguido()
    {
        return $this->belongsToMany('App\User');
    }
}
