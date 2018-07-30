<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->unsignedInteger('team1')->default(0);
            $table->unsignedInteger('team2')->default(0);
            $table->unsignedInteger('school_year')->default(0);
            $table->date('match_date')->default(now());
            $table->unsignedInteger('number_of_games_baker')->default(0);
            $table->unsignedInteger('number_of_games_linage')->default(0);
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
        Schema::dropIfExists('matches');
    }
}
