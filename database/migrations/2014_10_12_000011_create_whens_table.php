<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('scenario_id')->unsigned()->index();
            $table->foreign('scenario_id')->references('id')->on('scenarios')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('continuation_when', function (Blueprint $table) {
            $table->integer('continuation_id')->unsigned()->index();
            $table->foreign('continuation_id')
                ->references('id')
                ->on('continuations')
                ->onDelete('cascade');
            $table->integer('when_id')->unsigned()->index();
            $table->foreign('when_id')
                ->references('id')
                ->on('whens')
                ->onDelete('cascade');
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
        Schema::drop('continuation_when');
        Schema::drop('whens');
        
    }
}
