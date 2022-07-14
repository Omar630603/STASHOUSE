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
        Schema::create('storage_owners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('phone');
            $table->string('city');
            $table->string('address');
            $table->integer('rented')->default(0);
            $table->boolean('is_active')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_trusted')->default(false);
            $table->string('image')->default('images/storageOwner/defualtImage.png');
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
        Schema::dropIfExists('storage_owners');
    }
};
