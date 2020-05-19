<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRegenteToDisciplina extends Migration
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
            $table->unsignedBigInteger('professor_id');

            $table->index(["professor_id"], 'fk_disciplinas_professor_idx');

            $table->foreign('professor_id', 'fk_disciplinas_professor_idx')
                ->references('id')->on('professores')
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
            $table->dropForeign('fk_disciplinas_professor_idx');
            $table->dropIndex('fk_disciplinas_professor_idx');
            $table->dropColumn('professor_id');
        });
    }
}
