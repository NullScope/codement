<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAulaTemFicheiroTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'aula_tem_ficheiro';

    /**
     * Run the migrations.
     * @table aula_tem_ficheiro
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_aula');
            $table->unsignedBigInteger('id_ficheiro');

            $table->index(["id_ficheiro"], 'fk_aula_tem_ficheiro_ficheiro_idx');

            $table->index(["id_aula"], 'fk_aula_tem_ficheiro_aula_idx');


            $table->foreign('id_aula', 'fk_aula_tem_ficheiro_aula_idx')
                ->references('id')->on('aula')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_ficheiro', 'fk_aula_tem_ficheiro_ficheiro_idx')
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
