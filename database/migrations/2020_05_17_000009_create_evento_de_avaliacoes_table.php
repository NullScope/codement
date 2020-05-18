<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventoDeAvaliacoesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evento_de_avaliacoes';

    /**
     * Run the migrations.
     * @table evento_de_avaliacoes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('disciplina_id');
            $table->dateTime('data_inicio');
            $table->dateTime('data_fim');

            $table->index(["disciplina_id"], 'fk_evento_avaliacao_disciplina_idx');
            $table->nullableTimestamps();


            $table->foreign('disciplina_id', 'fk_evento_avaliacao_disciplina_idx')
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
