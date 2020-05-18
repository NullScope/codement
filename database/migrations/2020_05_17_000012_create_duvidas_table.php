<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuvidasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'duvidas';

    /**
     * Run the migrations.
     * @table duvidas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('aluno_id');
            $table->unsignedBigInteger('disciplina_id');

            $table->index(["disciplina_id"], 'fk_duvidas_disciplina_idx');

            $table->index(["aluno_id"], 'fk_duvidas_aluno_idx');
            $table->nullableTimestamps();


            $table->foreign('aluno_id', 'fk_duvidas_aluno_idx')
                ->references('id')->on('alunos')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('disciplina_id', 'fk_duvidas_disciplina_idx')
                ->references('id')->on('disciplinas')
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
