<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndWhenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('and_when', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('and_id')->references('id')->on('ands')->onDelete('cascade');
            $table->integer('when_id')->references('id')->on('whens')->onDelete('cascade');
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
        Schema::drop('and_when');
    }
}
