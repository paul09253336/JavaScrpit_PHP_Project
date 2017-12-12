<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSendinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sendinfos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('videopath');
            $table->string('audiopath');
            $table->string('phtotpath');
            $table->string('passwd');
            $table->string('question');
            $table->string('ans');
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
        Schema::dropIfExists('sendinfos');
    }
}
