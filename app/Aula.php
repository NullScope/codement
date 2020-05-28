<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['disciplina_id', 'descricao', 'nome'];

    public function disciplina()
    {
        return $this->belongsTo('App\Disciplina');
    }

    public function ficheiros()
    {
        return $this->morphMany('App\Ficheiro', 'ficheiroable');
    }
}
