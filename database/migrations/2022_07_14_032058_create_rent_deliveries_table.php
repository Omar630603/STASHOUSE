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
        Schema::create('rent_deliveries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rent_id');
            $table->foreign('rent_id')->references('id')->on('rents')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('delivery_driver_id');
            $table->foreign('delivery_driver_id')->references('id')->on('delivery_drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('description')->nullable();
            $table->dateTime('picked_up_time');
            $table->dateTime('delivered_time');
            $table->string('picked_up_location');
            $table->string('delivered_to_location');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('rent_deliveries');
    }
};
