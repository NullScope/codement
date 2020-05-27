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
    protected $fillable = ['aluno_id', 'disciplina_id', 'descricao'];

    public function aluno()
    {
        return $this->belongsTo('App\Aluno');
    }

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function ficheiros()
    {
        return $this->morphMany('App\Ficheiro', 'ficheiroable');
    }
}
