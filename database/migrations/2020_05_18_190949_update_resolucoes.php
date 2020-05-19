<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateResolucoes extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resolucoes';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function($table) {
            $table->dropForeign('fk_resolucoes_evento_de_avaliacoes_idx');
            $table->dropIndex('fk_resolucoes_evento_de_avaliacoes_idx');

            $table->renameColumn('evento_avaliacao_id', 'evento_de_avaliacao_id');

            $table->index(['evento_de_avaliacao_id'], 'fk_resolucoes_evento_de_avaliacao_idx');

            $table->foreign('evento_de_avaliacao_id', 'fk_resolucoes_evento_de_avaliacao')
                ->references('id')->on('eventos_de_avaliacao')
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
        Schema::table($this->tableName, function($table) {
            $table->renameColumn('evento_de_avaliacao_id', 'evento_avaliacao_id');

            $table->dropForeign('fk_resolucoes_evento_de_avaliacao');
            $table->dropIndex('fk_resolucoes_evento_de_avaliacao_idx');
            $table->index(['evento_avaliacao_id'], 'fk_resolucoes_evento_de_avaliacoes_idx');

            $table->foreign('evento_avaliacao_id', 'fk_resolucoes_evento_de_avaliacoes_idx')
                ->references('id')->on('eventos_de_avaliacao')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }
}
