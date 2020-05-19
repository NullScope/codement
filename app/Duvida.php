<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duvida extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['aluno_id', 'ficheiro_id', 'comentario', 'audio_url', 'linha_inicio', 'linha_fim'];

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }

    public function ficheiros()
    {
        return $this->morphMany('App\Ficheiro', 'ficheiroable');
    }
}
