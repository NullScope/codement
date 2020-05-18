<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficheiro extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['url', 'extensao'];

    public function ficheiroable()
    {
        return $this->morphTo();
    }

    public function comentarios() {
        $this->hasMany('App\Comentario');
    }
}
