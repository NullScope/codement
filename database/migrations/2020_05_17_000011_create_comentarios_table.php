<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comentarios';

    /**
     * Run the migrations.
     * @table comentarios
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ficheiro_id');
            $table->string('comentario');
            $table->string('audio_url')->nullable();
            $table->unsignedBigInteger('linha_inicio');
            $table->unsignedBigInteger('linha_fim');

            $table->index(["ficheiro_id"], 'fk_comentarios_ficheiro_idx');

            $table->index(["user_id"], 'fk_comentarios_user_idx');
            $table->nullableTimestamps();


            $table->foreign('user_id', 'fk_comentarios_user_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('ficheiro_id', 'fk_comentarios_ficheiro_idx')
                ->references('id')->on('ficheiros')
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
