<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webisodes', function (Blueprint $table) {
            $table->id();
            $table->string('ep_name');
            $table->integer('season');
            $table->integer('episode');
            $table->bigInteger('title_id');
            $table->foreign('title_id')->references('id')->on('title')->onDelete('cascade');
            //long poster is same as title
            //wide poster varies from title, episode wise
            $table->text('wide_poster');
            $table->text('asset');
            $table->text('vtt');
            $table->string('duration');
            $table->bigInteger('views');
            $table->unique('season','episode','title_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('webisodes');
    }
}
