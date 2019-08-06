<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('th_sales', function (Blueprint $table) {
            $table->bigIncrements('sales_id');
            $table->unsignedInteger('customer_id');
            $table->dateTime('sales_dat');
            $table->text('notes');
            $table->integer('total_sales_prices');

            // $table->foreign('customer_id')->references('customer_id')->on('m_customer')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('th_sales');
    }
}
