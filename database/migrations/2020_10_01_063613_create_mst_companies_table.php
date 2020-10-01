<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_companies', function (Blueprint $table) {
            $table->id('CompanyID');
            $table->string('CompanyName',300)->nullable();
            $table->integer('Status')->nullable();
            $table->datetime('RegisteredDate')->nullable();
            $table->string('LicenseKey',500)->nullable();
            $table->datetime('LicenseStart')->nullable();
            $table->datetime('LicenseExpiry')->nullable();
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
        Schema::dropIfExists('mst_companies');
    }
}
