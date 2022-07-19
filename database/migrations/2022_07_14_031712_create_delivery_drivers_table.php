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
        Schema::create('delivery_drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('driver_name');
            $table->string('phone')->uniqid();
            $table->string('city');
            $table->string('address');
            $table->string('vehicle_name');
            $table->string('vehicle_color');
            $table->string('vehicle_number')->unique();;
            $table->integer('price_per_km');
            $table->integer('deliveried')->default(0);
            $table->string('image')->default('images/deliveryDriver/defaultImage.png');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('delivery_drivers');
    }
};
