<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('title', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year');
            $table->string('type');
            $table->string('genre');
            $table->text('long_poster')->nullable();
            $table->text('wide_poster')->nullable();
            $table->text('trailer_link')->nullable();
            $table->text('asset');
            $table->text('vtt')->nullable();
            $table->text('age')->nullable();
            $table->text('duration')->nullable();
            $table->text('description')->nullable();
            $table->text('studio')->nullable();
            $table->bigInteger('views')->nullable();
            $table->text('lang')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title');
    }
}
