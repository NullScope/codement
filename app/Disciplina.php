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
    protected $fillable = ['disciplina'];

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

    public function getAlunosAttribute()
    {
        $users = User::whereHasMorph(
            'userable',
            ['App\Aluno']
        )->get();

        $alunos = $users->map(function ($item, $key) {
            return $item->userable;
        });

        return AlunoResource::collection($alunos);
    }

    public function getProfessoresAttribute()
    {
        $users = User::whereHasMorph(
            'userable',
            ['App\Professor']
        )->get();

        $professor = $users->map(function ($item, $key) {
            return $item->userable;
        });

        return ProfessorResource::collection($professor);
    }
}
