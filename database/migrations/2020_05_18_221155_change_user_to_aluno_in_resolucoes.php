<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserToAlunoInResolucoes extends Migration
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
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->renameColumn('user_id', 'aluno_id');

            $table->dropForeign('fk_resolucoes_user_idx');
            $table->dropIndex('fk_resolucoes_user_idx');

            $table->index(['aluno_id'], 'fk_resolucoes_aluno_idx');

            $table->foreign('aluno_id', 'fk_resolucoes_aluno_idx')
                ->references('id')->on('alunos')
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
            $table->renameColumn('aluno_id', 'user_id');

            $table->dropForeign('fk_resolucoes_aluno_idx');
            $table->dropIndex('fk_resolucoes_aluno_idx');

            $table->index(['user_id'], 'fk_resolucoes_user_idx');

            $table->foreign('user_id', 'fk_resolucoes_user_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }
}
