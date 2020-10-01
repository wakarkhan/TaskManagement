<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppMenuDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_menu_details', function (Blueprint $table) {
            $table->bigIncrements('MenuDetailID');
            $table->integer('MenuID')->nullable();
            $table->integer('FormID')->nullable();
            $table->string('Title',100)->nullable();
            $table->string('Description',200)->nullable();
            $table->integer('SortOrder')->nullable();
            $table->integer('MenuType')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_menu_details');
    }
}
