<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question')->default('0')->nullable();
            $table->string('opa')->default('0')->nullable();
            $table->string('opb')->default('0')->nullable();
            $table->string('opc')->default('0')->nullable();
            $table->string('opd')->default('0')->nullable();
            $table->string('ope')->default('0')->nullable();
            $table->string('answer')->default('0')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
