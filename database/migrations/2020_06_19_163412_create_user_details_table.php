<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', static function (Blueprint $table) {
            $table->id();
            $table->string('sender_name');
            $table->string('sender_email')->unique()->nullable();
            $table->string('sender_mobile')->nullable();
            $table->string('sender_country');
            $table->string('sender_address')->nullable();
            $table->string('receiver_name');
            $table->string('receiver_email')->unique();
            $table->string('receiver_mobile')->nullable();
            $table->string('receiver_country');
            $table->string('receiver_address')->nullable();
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
        Schema::dropIfExists('user_details');
    }
}
