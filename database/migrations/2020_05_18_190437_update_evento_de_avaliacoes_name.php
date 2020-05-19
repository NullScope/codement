<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEventoDeAvaliacoesName extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evento_de_avaliacoes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename($this->tableName, 'eventos_de_avaliacao');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('eventos_de_avaliacao', $this->tableName);
    }
}
