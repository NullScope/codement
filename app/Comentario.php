<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'ficheiro_id', 'comentario', 'audio_url', 'linha_inicio', 'linha_fim', 'comentario_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ficheiro()
    {
        return $this->belongsTo('App\Ficheiro');
    }

    public function subcomentarios()
    {
        return $this->hasMany('App\Comentario');
    }
}
