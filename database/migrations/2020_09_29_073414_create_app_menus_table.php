<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_menus', function (Blueprint $table) {
            $table->bigIncrements('MenuID');
            $table->string('Title',100);
            $table->string('Description',500)->nullable();
            $table->integer('SortOrder')->nullable();
            $table->string('ClassName',100)->nullable();
            $table->integer('ChildMenusCount')->nullable();
            $table->integer('Status')->nullable();
        });

        DB::table('app_menus')->insert([
            ['Title' => 'Configuration',
             'Description' => 'App Configurations',
             'SortOrder' => 0,
             'ClassName' => 'nav-icon far fa-plus-square',
             'ChildMenusCount' => 7,
             'Status' => 1
            ],

            ['Title' => 'Task',
             'Description' => 'Tasks Management',
             'SortOrder' => 0,
             'ClassName' => 'nav-icon fas fa-edit',
             'ChildMenusCount' => 3,
             'Status' => 1
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
        Schema::dropIfExists('app_menus');
    }
}
