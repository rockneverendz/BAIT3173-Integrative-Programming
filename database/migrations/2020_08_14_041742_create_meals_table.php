<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedDecimal('price', 5, 2);
            $table->boolean('availability');
            $table->string('image');
            $table->unsignedBigInteger('staff_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('staff_id')->references('id')->on('staffs');
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
