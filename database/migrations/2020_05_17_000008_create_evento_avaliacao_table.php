<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoAvaliacaoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evento_avaliacao';

    /**
     * Run the migrations.
     * @table evento_avaliacao
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_disciplina');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');

            $table->index(["id_disciplina"], 'fk_evento_avaliacao_disciplina_idx');
            $table->nullableTimestamps();


            $table->foreign('id_disciplina', 'fk_evento_avaliacao_disciplina_idx')
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
