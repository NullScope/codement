<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessorTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'professor';

    /**
     * Run the migrations.
     * @table professor
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('id_user');
            $table->string('id_professor');
            $table->enum('professor_type', ["regente", "auxiliar"]);

            $table->index(["id_user"], 'fk_professor_user_idx');

            $table->unique(["id_user"], 'id_user_UNIQUE');
            $table->nullableTimestamps();


            $table->foreign('id_user', 'fk_professor_user_idx')
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
