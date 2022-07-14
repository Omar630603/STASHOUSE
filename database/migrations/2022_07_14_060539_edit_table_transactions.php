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
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('rent_id')->after('id');
            $table->foreign('rent_id')->references('id')->on('rents')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('customer_id')->after('rent_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['rent_id']);
            $table->dropColumn('rent_id');
            $table->dropForeign(['customer_id']);
            $table->dropColumn('customer_id');
        });
    }
};
