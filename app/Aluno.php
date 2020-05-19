<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['aluno_id'];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function duvidas()
    {
        return $this->hasMany('App\Duvida');
    }
}
