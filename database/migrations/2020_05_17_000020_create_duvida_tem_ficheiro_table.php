<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDuvidaTemFicheiroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'duvida_tem_ficheiro';

    /**
     * Run the migrations.
     * @table duvida_tem_ficheiro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_duvida');
            $table->unsignedBigInteger('id_ficheiro');

            $table->index(["id_ficheiro"], 'fk_duvida_tem_ficheiro_ficheiro_idx');

            $table->index(["id_duvida"], 'fk_duvida_tem_ficheiro_duvida_idx');


            $table->foreign('id_duvida', 'fk_duvida_tem_ficheiro_duvida_idx')
                ->references('id')->on('duvida')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_ficheiro', 'fk_duvida_tem_ficheiro_ficheiro_idx')
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
