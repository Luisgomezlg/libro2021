<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnicas', function (Blueprint $table) {
            $table->id();
            $table->integer('categoria_id')->nullable();
            $table->string('first_cod')->nullable()->default('');
            $table->string('ind_cod')->nullable()->default('');
            $table->string('title', 250)->nullable();
            $table->text('description')->nullable();
            $table->string('image', 2040)->nullable()->default('');
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
        Schema::dropIfExists('tecnicas');
    }
}
