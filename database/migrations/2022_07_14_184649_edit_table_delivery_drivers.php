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
        Schema::table('delivery_drivers', function (Blueprint $table) {
            $table->unsignedBigInteger('delivery_company_id');
            $table->foreign('delivery_company_id')->references('id')->on('delivery_companies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delivery_drivers', function (Blueprint $table) {
            $table->dropForeign(['delivery_company_id']);
            $table->dropColumn('delivery_company_id');
        });
    }
};
