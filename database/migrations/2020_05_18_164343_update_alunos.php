<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAlunos extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'alunos';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->string('curso');
            $table->dateTime('data_de_matricula_inicial');
            $table->integer('ano_curricular');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tableName, function($table) {
            $table->dropColumn('curso');
            $table->dropColumn('data_de_matricula_inicial');
            $table->dropColumn('ano_curricular');
        });
    }
}
