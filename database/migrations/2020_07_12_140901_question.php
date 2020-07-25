<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Question extends Migration
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
            $table->binary('image');
            $table->string('titre',150);
            $table->text('Desc');
            $table->unsignedBigInteger('ID_opt');
            $table->foreign('ID_opt')->references('id')->on('options');
            $table->unsignedBigInteger('ID_user');
            $table->foreign('ID_user')->references('id')->on('users');
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
        //
    }
}
