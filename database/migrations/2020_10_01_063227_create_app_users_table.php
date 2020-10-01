<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_users', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('FirstName',100);
            $table->string('LastName',100);
            $table->string('Phone',15)->nullable();
            $table->string('Email',100)->nullable();
            $table->string('Username',30)->nullable();
            $table->string('Password',500)->nullable();
            $table->integer('CompanyID')->nullable();
            $table->integer('RoleID');
            $table->integer('Status');
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
        Schema::dropIfExists('app_users');
    }
}
