<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodos', function (Blueprint $table) {
            $table->id();
            $table->string('first_cod')->nullable()->default('');
            $table->string('ind_cod')->nullable()->default('');
            $table->string('title', 250)->nullable()->default('');
            $table->text('description')->nullable();
            $table->string('image_met', 2040)->nullable();
            $table->integer('id_insumo')->nullable();
            $table->integer('id_tecnica')->nullable();
            $table->date('creation_date')->nullable();
            $table->integer('level')->nullable();
            $table->integer('order')->nullable();
            $table->integer('id_user')->nullable();
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
        Schema::dropIfExists('metodos');
    }
}
