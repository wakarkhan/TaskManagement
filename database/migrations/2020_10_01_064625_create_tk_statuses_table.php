<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('StatusText',200);
            $table->integer('CompanyID')->nullable();
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
        Schema::dropIfExists('tk_statuses');
    }
}
