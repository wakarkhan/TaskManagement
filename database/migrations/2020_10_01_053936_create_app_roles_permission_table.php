<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppRolesPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_roles_permission', function (Blueprint $table) {
            $table->bigIncrements('PermissionID');
            $table->integer('MenuDetailID')->nullable();
            $table->integer('UserID')->nullable();
            $table->integer('IsView')->nullable();
            $table->timestamp('CreatedOn')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->datetime('ModifiedOn')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->integer('CreatedBy')->nullable();
        });

        $permissionList = DB::select('select * from app_menu_details order by sortorder');

        foreach($permissionList as $rowPermission)
        {
            DB::table('app_roles_permission')->insert([
                [   'MenuDetailID' => $rowPermission->MenuDetailID,
                    'UserID' => 1,
                    'IsView' =>  1,
                    'CreatedBy' => 1,
                ]
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_roles_permission');
    }
}
