<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $table = 'professores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['professor_id'];

    public function user()
    {
        return $this->morphOne('App\User', 'userable');
    }

    public function regente()
    {
        return $this->hasMany('App\Disciplina', 'professor_id');
    }
}
