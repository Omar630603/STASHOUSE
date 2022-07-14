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
        Schema::create('storage_owner_delivery_drivers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('storage_owner_id');
            $table->foreign('storage_owner_id')->references('id')->on('storage_owners')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('delivery_driver_id');
            $table->foreign('delivery_driver_id')->references('id')->on('delivery_drivers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('storage_owner_delivery_drivers');
    }
};
