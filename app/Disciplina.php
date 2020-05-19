<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Http\Resources\AlunoResource;
use App\Http\Resources\ProfessorResource;

class Disciplina extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'semestre_curricular', 'professor_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'pivot'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function aulas()
    {
        return $this->hasMany('App\Aula');
    }

    public function duvidas()
    {
        return $this->hasMany('App\Duvida');
    }

    public function regente()
    {
        return $this->belongsTo('App\Professor', 'professor_id');
    }

    public function eventosDeAvaliacao()
    {
        return $this->hasMany('App\EventoDeAvaliacao');
    }

    public function getAlunosAttribute()
    {
        $users = User::whereHasMorph(
            'userable',
            ['App\Aluno']
        )->get();

        $filtered_users = $users->filter(function ($user, $key) {
            return $user->disciplinas()->find($this->id);
        });

        $alunos = $filtered_users->map(function ($user, $key) {
            return $user->userable;
        });

        return AlunoResource::collection($alunos);
    }

    public function getAssistentesAttribute()
    {
        $users = User::whereHasMorph(
            'userable',
            ['App\Professor']
        )->get();

        $filtered_users = $users->filter(function ($user, $key) {
            return $user->disciplinas()->find($this->id);
        });

        $auxiliares = $filtered_users->map(function ($user, $key) {
            return $user->userable;
        });

        return ProfessorResource::collection($auxiliares);
    }
}
