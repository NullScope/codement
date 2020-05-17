<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comentario';

    /**
     * Run the migrations.
     * @table comentario
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_ficheiro');
            $table->string('comentario');
            $table->string('audio_url')->nullable();
            $table->unsignedBigInteger('linha_inicio');
            $table->unsignedBigInteger('linha_fim');

            $table->index(["id_user"], 'fk_comentario_user_idx');

            $table->index(["id_ficheiro"], 'fk_comentario_ficheiro_idx');
            $table->nullableTimestamps();


            $table->foreign('id_user', 'fk_comentario_user_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_ficheiro', 'fk_comentario_ficheiro_idx')
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
