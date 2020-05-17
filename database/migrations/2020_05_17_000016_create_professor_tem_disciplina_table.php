<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorTemDisciplinaTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'professor_tem_disciplina';

    /**
     * Run the migrations.
     * @table professor_tem_disciplina
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_professor_user');
            $table->unsignedBigInteger('id_disciplina');

            $table->index(["id_disciplina"], 'fk_professor_tem_disciplina_disciplina_idx');

            $table->index(["id_professor_user"], 'fk_professor_tem_disciplina_professor_idx');

            $table->unique(["id_professor_user"], 'id_professor_user_UNIQUE');

            $table->unique(["id_disciplina"], 'id_disciplina_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('id_professor_user', 'fk_professor_tem_disciplina_professor_idx')
                ->references('id_user')->on('professor')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_disciplina', 'fk_professor_tem_disciplina_disciplina_idx')
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
