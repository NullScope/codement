<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuxiliarTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'auxiliar';

    /**
     * Run the migrations.
     * @table auxiliar
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_professor_user');

            $table->index(["id_professor_user"], 'fk_auxiliar_professor_idx');

            $table->unique(["id_professor_user"], 'id_professor_user_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('id_professor_user', 'fk_auxiliar_professor_idx')
                ->references('id_user')->on('professor')
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