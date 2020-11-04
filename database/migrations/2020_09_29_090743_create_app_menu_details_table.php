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
        });

        //GET MENU RECORDS
        $menuList = DB::table('app_menus')->get();
        $menuChildCount = 1;

        foreach($menuList as $rowMenu)
        {
            $sortOrder = 1;
            $formList = DB::select('select * from app_forms where FormID not in (Select FormID from app_menu_details) ');
            $menuChildCount = 1;
            foreach($formList as $rowForm)
            {
                $isMenuDetailExist = DB::table('app_menu_details')->where('Title',$rowForm->FormName)->count();
                if($menuChildCount <= (int)$rowMenu->ChildMenusCount){
                    if($menuChildCount <= $rowMenu->ChildMenusCount) {
                        DB::table('app_menu_details')->insert([
                            ['MenuID' => $rowMenu->MenuID,
                             'FormID' => $rowForm->FormID,
                             'Title' =>  $rowForm->FormName,
                             'Description' => $rowForm->FormName .' Management',
                             'SortOrder' => $sortOrder,
                            ]
                        ]);
                        $menuChildCount++;
                    }
                }
                $sortOrder++;
            }
        }
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
