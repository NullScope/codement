<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubcomentarioToComentarios extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comentarios';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->unsignedBigInteger('comentario_id')->nullable();
            $table->index(['comentario_id'], 'fk_comentarios_comentario_idx');

            $table->foreign('comentario_id', 'fk_comentarios_comentario_idx')
                ->references('id')->on('comentarios')
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
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropForeign('fk_comentarios_comentario_idx');
            $table->dropIndex('fk_comentarios_comentario_idx');
            $table->dropColumn('comentario_id');
        });
    }
}
