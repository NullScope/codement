<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolucoesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resolucoes';

    /**
     * Run the migrations.
     * @table resolucoes
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('evento_avaliacao_id');
            $table->unsignedBigInteger('user_id');

            $table->index(["user_id"], 'fk_resolucoes_user_idx');

            $table->index(["evento_avaliacao_id"], 'fk_resolucoes_evento_de_avaliacoes_idx');
            $table->nullableTimestamps();


            $table->foreign('evento_avaliacao_id', 'fk_resolucoes_evento_de_avaliacoes_idx')
                ->references('id')->on('evento_de_avaliacoes')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('user_id', 'fk_resolucoes_user_idx')
                ->references('id')->on('users')
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
