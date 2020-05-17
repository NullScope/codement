<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTemDisciplinaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'aluno_tem_disciplina';

    /**
     * Run the migrations.
     * @table aluno_tem_disciplina
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_aluno_user');
            $table->unsignedBigInteger('id_disciplina');

            $table->index(["id_disciplina"], 'fk_aluno_tem_disciplina_disciplina_idx');

            $table->index(["id_aluno_user"], 'fk_aluno_tem_disciplina_aluno_idx');

            $table->unique(["id_disciplina"], 'id_disciplina_UNIQUE');

            $table->unique(["id_aluno_user"], 'id_aluno_user_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('id_aluno_user', 'fk_aluno_tem_disciplina_aluno_idx')
                ->references('id_user')->on('aluno')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_disciplina', 'fk_aluno_tem_disciplina_disciplina_idx')
                ->references('id')->on('disciplina')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
