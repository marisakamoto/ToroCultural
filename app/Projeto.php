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

    
    // public function getUrlFotoAttribute($value)
    // {
    //     $explode = explode('/', $value);
    //     $nomeArquivo = $explode[1];
    //     return $nomeArquivo;
    // }

    public function getDataderealizacaoAttribute($value)
    {
        //ALETERAR FORMATO DA DATA QUE VEM DO DATABASE
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
	    
    }

    //Relacionamento com o usuário criador 1:N
    public function user_criador()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    //Relacionamento entre Projetos e categorias N:N
    public function categorias()
    {
        return $this->belongsToMany('App\Categoria', 'projeto_categoria');
    }

    //Relacionamento Projeto_Usuario_Colaborador N:N
    public function projeto_user_colaboradores()
    {
        return $this->belongsToMany('App\User', 'projeto_user_colaborador', 'projeto_id', 'userColaborador_id');
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
        return $this->belongsToMany('App\User', 'user_projetoSeguido', 'projetoSeguido_id', 'userSeguindo_id');
    }

    // public function habilidades()
    // {
    //     return $this->hasManyThrough('App\Habilidade', 'App\Vaga');
    // }
}
