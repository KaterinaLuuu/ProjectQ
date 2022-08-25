<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('body');
            $table->unsignedInteger('price');
            $table->unsignedInteger('old_price')->nullable();
            $table->string('salon');
            $table->unsignedInteger('car_class_id')->nullable();
            $table->string('kpp');
            $table->unsignedInteger('year');
            $table->string('color');
            $table->unsignedInteger('car_body_id')->nullable();
            $table->unsignedInteger('car_engine_id')->nullable();
            $table->boolean('is_new')->default(false);
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
        Schema::dropIfExists('cars');
    }
}
