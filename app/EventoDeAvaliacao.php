<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventoDeAvaliacao extends Model
{
    protected $table = 'eventos_de_avaliacao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['disciplina_id', 'data_inicio', 'data_fim'];

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function resolucoes()
    {
        return $this->hasMany('App\Resolucoes');
    }

    public function ficheiros()
    {
        return $this->morphMany('App\Ficheiro', 'ficheiroable');
    }
}
