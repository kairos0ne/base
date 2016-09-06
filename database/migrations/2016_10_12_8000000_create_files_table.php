<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('extension');
            $table->string('url');
            $table->timestamps();

        });
        Schema::create('brief_files', function (Blueprint $table) {
            $table->integer('brief_id')->unsigned()->index();
            $table->foreign('brief_id')->references('id')->on('briefs')->onDelete('cascade');
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
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
        Schema::drop('files');
        Schema::drop('brief_files');
    }
}
