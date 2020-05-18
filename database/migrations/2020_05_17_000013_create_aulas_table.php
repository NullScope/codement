<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'aulas';

    /**
     * Run the migrations.
     * @table aulas
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('disciplina_id');
            $table->string('descricao');

            $table->index(["disciplina_id"], 'fk_aula_disciplina_idx');
            $table->nullableTimestamps();


            $table->foreign('disciplina_id', 'fk_aula_disciplina_idx')
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
