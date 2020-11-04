<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_forms', function (Blueprint $table) {
            $table->bigIncrements('FormID');
            $table->string('FormName');
            $table->integer('Status');
            $table->string('Link')->nullable();
        });

        DB::table('app_forms')->insert([
            ['FormName' => 'Users',
             'Status' => 1,
             'Link' => '/user'
            ],

            ['FormName' => 'Roles',
                'Status' => 1,
                'Link' => '/role'
            ],

            ['FormName' => 'Clients',
            'Status' => 1,
            'Link' => '/client'
            ],

            ['FormName' => 'Projects',
            'Status' => 1,
            'Link' => '/project'
            ],

            ['FormName' => 'Modules',
            'Status' => 1,
            'Link' => '/module'
            ],

            ['FormName' => 'Statuses',
            'Status' => 1,
            'Link' => '/status'
            ],

            ['FormName' => 'Priorities',
            'Status' => 1,
            'Link' => '/priority'
            ],

            ['FormName' => 'Tasks',
            'Status' => 1,
            'Link' => '/task'
            ],

            ['FormName' => 'Create Task',
            'Status' => 1,
            'Link' => '/task/create'
            ],

            ['FormName' => 'Active Timers',
            'Status' => 1,
            'Link' => '/task/active_timer'
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
        Schema::dropIfExists('app_forms');
    }
}
