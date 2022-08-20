<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrap_data', function (Blueprint $table) {
            $table->id();
            $table->string('canada')->nullable();
            $table->string('america')->nullable();
            $table->string('australia')->nullable();
            $table->string('switzerland')->nullable();
            $table->string('newzealand')->nullable();
            $table->string('japan')->nullable();
            $table->string('japan_2')->nullable();
            $table->string('germany')->nullable();
            $table->string('france')->nullable();
            $table->string('england')->nullable();
            $table->string('turkey')->nullable();
            $table->dateTime('time')->nullable();
            $table->string('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scrap_data');
    }
}
