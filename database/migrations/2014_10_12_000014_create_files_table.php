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
        Schema::create('file_project', function (Blueprint $table) {
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onDelete('cascade');
            $table->integer('project_id')->unsigned()->index();
            $table->foreign('project_id')
                ->references('id')
                ->on('projects')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('brief_file', function (Blueprint $table) {
            $table->integer('brief_id')->unsigned()->index();
            $table->foreign('brief_id')
                ->references('id')
                ->on('briefs')
                ->onDelete('cascade');
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')
                ->references('id')
                ->on('files')
                ->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('client_file', function (Blueprint $table) {
            $table->integer('client_id')->unsigned()->index();
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onDelete('cascade');
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('file_id')
                ->references('id')
                ->on('files')
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
        Schema::drop('file_project');
        Schema::drop('brief_file');
        Schema::drop('client_file');
        Schema::drop('files');
        
    }
}
