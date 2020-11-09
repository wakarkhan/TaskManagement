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
            $table->bigIncrements('UserID');
            $table->string('FirstName',100);
            $table->string('LastName',100);
            $table->string('Phone',15)->nullable();
            $table->string('Email',100)->nullable();
            $table->string('Username',30)->nullable();
            $table->string('Password',500)->nullable();
            $table->integer('IsMaster')->default('0');
            $table->integer('CompanyID')->nullable();
            $table->integer('RoleID')->nullable();
            $table->integer('Status')->nullable();
            $table->rememberToken();
            $table->timestamp('CreatedOn')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('ModifiedOn')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('CreatedBy')->nullable();
            $table->integer('ModifiedBy')->nullable();
        });


        DB::table('app_users')->insert([
            ['FirstName' => 'Muhammad Waqar',
             'LastName' => 'Khan',
             'Phone' => '03012367099',
             'Email' => 'wakaarkhan@yahoo.com',
             'Username' => 'wakarkhan',
             'Password' => md5("khan#786"),
             'IsMaster' => 1,
             'RoleID' => 1,
             'Status' => 1,
             'CreatedBy' => 1,
            ],
        ]);
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
