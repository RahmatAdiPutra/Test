<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_type', function (Blueprint $table) {
            $table->bigIncrements('type_id');
            $table->unsignedInteger('cluster_id');
            $table->string('type_name', 50);
            $table->integer('price');
            $table->text('description');

            // $table->foreign('cluster_id')->references('cluster_id')->on('m_cluster')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_type');
    }
}
