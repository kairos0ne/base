<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->text('feature');
            $table->text('user_context');
            $table->text('given');
            $table->text('then');
            $table->text('when');
            $table->integer('brief_id')->unsigned();
            $table->timestamps();

            $table->foreign('brief_id')
                ->references('id')
                ->on('briefs')
                ->onDelete('cascade');
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
