<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resolucao extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['evento_de_avaliacao_id', 'aluno_id', 'nota'];

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }

    public function eventoDeAvaliacao()
    {
        return $this->belongsTo('App\EventoDeAvaliacao', 'evento_de_avaliacao_id');
    }

    public function ficheiros()
    {
        return $this->morphMany('App\Ficheiro', 'ficheiroable');
    }
}
