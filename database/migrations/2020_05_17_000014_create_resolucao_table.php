<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResolucaoTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'resolucao';

    /**
     * Run the migrations.
     * @table resolucao
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_evento_avaliacao');
            $table->unsignedBigInteger('id_aluno_user');

            $table->index(["id_aluno_user"], 'fk_resolucao_aluno_idx');

            $table->index(["id_evento_avaliacao"], 'fk_resolucao_evento_avaliacao_idx');
            $table->nullableTimestamps();


            $table->foreign('id_evento_avaliacao', 'fk_resolucao_evento_avaliacao_idx')
                ->references('id')->on('evento_avaliacao')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('id_aluno_user', 'fk_resolucao_aluno_idx')
                ->references('id_user')->on('aluno')
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
