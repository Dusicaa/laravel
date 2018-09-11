<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artikli', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv',30)->unique();
            $table->text('opis');
            $table->unsignedInteger('slika_id');
            $table->unsignedInteger('cena_id');
            $table->unsignedInteger('kategorija_id');

            $table->foreign('slika_id')->references('id')->on('slike');
            $table->foreign('cena_id')->references('id')->on('cene');
            $table->foreign('kategorija_id')->references('id')->on('kategorije');
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
        Schema::dropIfExists('artikli');
    }
}
