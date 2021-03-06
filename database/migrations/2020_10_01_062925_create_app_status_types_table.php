<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppStatusTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_status_types', function (Blueprint $table) {
            $table->bigIncrements('StatusID');
            $table->string('StatusType',100)->nullable();
            $table->string('StatusText',100)->nullable();
            $table->string('StatusValue',50)->nullable();
            $table->timestamp('CreatedOn')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('ModifiedOn')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('CreatedBy')->nullable();
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
        Schema::dropIfExists('app_status_types');
    }
}
