<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDisciplina extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'disciplinas';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dateTime('semestre_curricular');
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
            $table->dropColumn('semestre_curricular');
        });
    }
}
