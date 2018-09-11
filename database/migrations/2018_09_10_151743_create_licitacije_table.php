<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateLicitacijeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licitacije', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('last_user_id');
            $table->foreign('last_user_id')->references('id')->on('users');
            $table->unsignedInteger('artikl_id');
            $table->foreign('artikl_id')->references('id')->on('artikli');
            $table->timestamp('pocetno_vreme')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('krajnje_vreme')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('licitacije');
    }
}
