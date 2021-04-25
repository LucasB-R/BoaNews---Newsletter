<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsEnviadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_enviadas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_noticia')->unsigned();
            $table->integer('id_email')->unsigned();
            $table->timestamps();

            $table->foreign('id_noticia')
            ->references('id')->on('newsletter')
            ->onDelete('cascade');

            $table->foreign('id_email')
            ->references('id')->on('email')
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
