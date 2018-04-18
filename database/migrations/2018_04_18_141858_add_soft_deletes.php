<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDeletes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoas', function ($table) {
            $table->softDeletes();
        });

        Schema::table('tarefas', function ($table) {
            $table->softDeletes();
        });

        Schema::table('pessoa_tarefa', function ($table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->softDeletes(); 
        });

        Schema::table('tarefas', function (Blueprint $table) {
            $table->dropCsoftDeletesolumn(); 
        });

        Schema::table('pessoa_tarefa', function (Blueprint $table) {
            $table->softDeletes(); 
        });
    }
}
