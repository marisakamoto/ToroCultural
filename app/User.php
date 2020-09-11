<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password', 'descricao', 'profissao', 'aniversario', 'url_foto'
    ];

    //Relacionamento com os projetos criados pelo user 1:N
    public function projetos()
    {
        return $this->hasMany('App\Projeto');
    }

    //Relacionamento Projeto_Usuario_Colaborador N:N
    public function projeto_user_colaborador()
    {
        return $this->belongsToMany('App\Projeto', 'projeto_user_colaborador', 'userColaborador_id', 'projeto_id');
    }

    //Telacionamento: Usuário pode ser guir vários projetos e um projeto pode ser seguido
    // por vários usuários N:N
    public function user_projetoSeguido()
    {
        return $this->belongsToMany('App\Projeto', 'user_projetoSeguido', 'userSeguindo_id', 'projetoSeguido_id');
    }

    public function habilidades()
    {
    return  $this->belongsToMany('App\Habilidade', 'user_habilidade', 'user_id', 'habilidade_id');
    }

    //User_id é quem recebe os seguidores
    public function seguidores()
    {
    return  $this->belongsToMany(User::class, 'user_userseguindo','user_id','user_seguindo_id');
    }

    //user_seguindo_id é quem segue
    public function seguindo()
    {
    return  $this->belongsToMany(User::class, 'user_userseguindo','user_seguindo_id','user_id');
    }

    public function experience()
    {
        return $this->hasMany('App\Experience_card','user_id');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
