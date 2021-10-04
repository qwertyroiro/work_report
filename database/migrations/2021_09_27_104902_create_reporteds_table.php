<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text("month");
            $table->text("day");
            $table->text("teacher");
            $table->text("DAC");
            $table->text("classroom");
            $table->text("absence")->nullable();
            $table->text("delay")->nullable();
            $table->text("report")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporteds');
    }
}
