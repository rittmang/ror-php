<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContinueWatching extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('continue_watching', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('title_id');
            $table->bigInteger('webisode_id')->nullable($value=true);
            $table->bigInteger('watchTime');//in seconds


            $table->unique(['user_id','title_id','webisode_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('title_id')->references('id')->on('title')->onDelete('cascade');
            $table->foreign('webisode_id')->references('id')->on('webisodes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('continue_watching');
    }
}
