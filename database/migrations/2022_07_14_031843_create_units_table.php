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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unit_category_id');
            $table->foreign('unit_category_id')->references('id')->on('unit_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('storage_owner_id');
            $table->foreign('storage_owner_id')->references('id')->on('storage_owners')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->uniqid();
            $table->string('city');
            $table->string('address');
            $table->string('private_key')->uniqid();
            $table->integer('price_per_day');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_rented')->default(false);
            $table->integer('capacity')->default(0);
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
        Schema::dropIfExists('units');
    }
};
