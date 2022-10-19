<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->string('genre');
            $table->string('slug');
            $table->string('biography', 180);
            $table->string('level')->nullable();
            $table->integer('ex')->nullable();
            $table->string('twitter')->nullable();
            $table->string('avatar')->default('profile.png');
            $table->string('email')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('like')->default(0);
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
        //
    }
};
