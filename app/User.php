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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'userable_id', 'userable_type', 'disciplinas', 'comentarios', 'ficheiros'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userable()
    {
        return $this->morphTo();
    }

    public function disciplinas()
    {
        return $this->belongsToMany('App\Disciplina');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comentario');
    }

    public function ficheiros()
    {
        return $this->hasMany('App\Ficheiro');
    }
}
