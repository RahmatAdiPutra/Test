<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTdSalesdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('td_salesdetail', function (Blueprint $table) {
            $table->bigIncrements('salesdetail_id');
            $table->unsignedInteger('sales_id');
            $table->unsignedInteger('cluster_id');
            $table->unsignedInteger('type_id');
            $table->integer('price');
            $table->integer('qty');
            $table->integer('total');

            // $table->foreign('sales_id')->references('sales_id')->on('th_sales')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('cluster_id')->references('cluster_id')->on('m_cluster')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('type_id')->references('type_id')->on('m_type')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('td_salesdetail');
    }
}
