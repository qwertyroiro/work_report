<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promoteds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->text("classroom");
            $table->text("student");
            $table->text("month");
            $table->text("day");
            $table->text("rank");
            $table->text("teacher");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promoteds');
    }
}
