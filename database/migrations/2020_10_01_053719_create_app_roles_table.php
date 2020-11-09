<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_roles', function (Blueprint $table) {
            $table->bigIncrements('RoleID');
            $table->string('RoleName',200);
            $table->integer('Status')->nullable();
            $table->timestamp('CreatedOn')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('ModifiedOn')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('CreatedBy')->nullable();
            $table->integer('ModifiedBy')->nullable();
        });

        DB::table('app_roles')->insert([
            ['RoleName' => 'Administrator',
             'Status' => 1,
             'CreatedBy' => 1,
            ],

            ['RoleName' => 'Other',
             'Status' => 1,
             'CreatedBy' => 1,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_roles');
    }
}
