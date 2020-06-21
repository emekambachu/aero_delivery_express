<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', static function (Blueprint $table) {

            $table->id();

            $table->string('parcel');
            $table->integer('parcel_weight');

            $table->integer('user_detail_id')->unsigned()->index();
            $table->foreign('user_detail_id')->references('id')->on('user_details')->onDelete('cascade');

            $table->string('tracking_id');

            $table->tinyInteger('is_active')->default('1');

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
        Schema::dropIfExists('shipments');
    }
}
