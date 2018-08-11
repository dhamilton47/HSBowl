<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar_path')->nullable();
            $table->boolean('email_confirmed')->default(false);
            $table->string('email_confirmation_token', 25)->nullable()->unique();
            $table->unsignedInteger('school_id')->nullable();
            $table->unsignedInteger('role')->default(0);
            $table->boolean('role_confirmed')->default(false);
            $table->string('role_confirmation_token', 25)->nullable()->unique();
            $table->boolean('team1')->default(false);
            $table->boolean('team2')->default(false);
            $table->boolean('team3')->default(false);
            $table->boolean('team4')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
