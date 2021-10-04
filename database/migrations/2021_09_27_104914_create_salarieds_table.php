<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarieds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text("month");
            $table->text("day");
            $table->text("teacher");
            $table->text("mail");
            $table->text("classroom");
            $table->text("time1");
            $table->text("time2");
            $table->text("time3");
            $table->text("salary");
            $table->text("from");
            $table->text("to");
            $table->text("expenses");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salarieds');
    }
}
