<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_clients', function (Blueprint $table) {
            $table->bigIncrements('ClientID');
            $table->string('ClientName',200)->nullable();
            $table->integer('Status')->nullable();
            $table->integer('CompanyID')->nullable();
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
        Schema::dropIfExists('tk_clients');
    }
}
