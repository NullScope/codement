<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFicheiros extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'ficheiros';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table($this->tableName, function($table) {
            $table->unsignedBigInteger('user_id');

            $table->index(['user_id'], 'fk_ficheiros_users_idx');

            $table->foreign('user_id', 'fk_ficheiros_users')
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
        Schema::table($this->tableName, function($table) {
            $table->dropForeign('fk_ficheiros_users');
            $table->dropIndex('fk_ficheiros_users_idx');
            $table->dropColumn('user_id');
        });
    }
}
