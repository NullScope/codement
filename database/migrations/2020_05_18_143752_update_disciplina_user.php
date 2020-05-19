<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDisciplinaUser extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'disciplina_user';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropUnique('id_disciplina_UNIQUE');
            $table->dropUnique('id_aluno_user_UNIQUE');

            $table->index(['user_id'], 'fk_disciplina_user_user_idx');
            $table->index(['disciplina_id'], 'fk_disciplina_user_disciplina_idx');

            $table->foreign('user_id', 'fk_disciplina_user_user')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('disciplina_id', 'fk_disciplina_user_disciplina')
                ->references('id')->on('disciplinas')
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
            $table->dropForeign('fk_disciplina_user_user');
            $table->dropIndex('fk_disciplina_user_user_idx');

            $table->dropForeign('fk_disciplina_user_disciplina');
            $table->dropIndex('fk_disciplina_user_disciplina_idx');

            $table->unique(["disciplina_id"], 'id_disciplina_UNIQUE');
            $table->unique(["user_id"], 'id_aluno_user_UNIQUE');
        });
    }
}
