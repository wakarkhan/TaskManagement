<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTkTaskCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tk_task_comments', function (Blueprint $table) {
            $table->id('CommentID');
            $table->integer('TaskID');
            $table->text('CommentText');
            $table->integer('CommentBy');
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
        Schema::dropIfExists('tk_task_comments');
    }
}
