<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_tasks', function (Blueprint $table) {
            $table->id('TaskID');
            $table->string('Title',300);
            $table->string('Description',500)->nullable();
            $table->integer('ClientID')->nullable();
            $table->integer('ProjectID')->nullable();
            $table->integer('ModuleID')->nullable();
            $table->datetime('StartDate')->nullable();
            $table->datetime('EndDate')->nullable();
            $table->integer('PriorityID')->nullable();
            $table->integer('TaskStatusID')->nullable();
            $table->integer('Status')->nullable();
            $table->datetime('CreatedOn')->nullable();
            $table->integer('CreatedBy')->nullable();
            $table->datetime('ModifiedOn')->nullable();
            $table->integer('ModifiedBy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tk_tasks');
    }
}
