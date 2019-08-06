<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name', 100);
            $table->text('description');
            $table->string('phone', 15);
            $table->string('email', 100)->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_customer');
    }
}
