<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContinuationThenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continuation_then', function (Blueprint $table) {
            $table->integer('continuation_id')->unsigned()->index();
            $table->foreign('continuation_id')
                ->references('id')
                ->on('continuations')
                ->onDelete('cascade');
            $table->integer('then_id')->unsigned()->index();
            $table->foreign('then_id')
                ->references('id')
                ->on('thens')
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
        Schema::drop('continuation_then');
    }
}
