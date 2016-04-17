<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('overview');
            $table->longText('objective');
            $table->integer('project_id')->unsigned();
            $table->timestamps();

            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
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
        Schema::drop('briefs');
    }
}
