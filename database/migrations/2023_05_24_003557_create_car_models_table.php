<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('manufacturer_name_id')->unsigned();
            // $table->foreign('category_id')->references('id')->on('category')->onDelete('restrict');			$table->string('model_name', 191);
            $table->string('model_name', 191);
			$table->string('color_code', 191);
            $table->bigInteger('manufacturing_year')->nullable();
			$table->string('registration_number', 191);
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
			$table->boolean('status')->default(false);
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
        Schema::dropIfExists('car_models');
    }
}
