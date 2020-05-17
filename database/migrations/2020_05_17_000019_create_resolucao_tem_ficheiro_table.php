<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolucaoTemFicheiroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resolucao_tem_ficheiro';

    /**
     * Run the migrations.
     * @table resolucao_tem_ficheiro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_resolucao');
            $table->unsignedBigInteger('id_ficheiro');

            $table->index(["id_ficheiro"], 'fk_resolucao_tem_ficheiro_ficheiro_idx');

            $table->index(["id_resolucao"], 'fk_resolucao_tem_ficheiro_resolucao_idx');


            $table->foreign('id_resolucao', 'fk_resolucao_tem_ficheiro_resolucao_idx')
                ->references('id')->on('resolucao')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_ficheiro', 'fk_resolucao_tem_ficheiro_ficheiro_idx')
                ->references('id')->on('ficheiro')
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
