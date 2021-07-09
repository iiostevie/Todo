<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    //
    public function up()
    {
        Schema:drop('tasks','users');



        // 創建資料表 create(<tableName>, closure封包)
        Schema::create('tasks', function (Blueprint $table) {
            // <==><==><==><==><==> ?? ?? ?? ?? ?? <==><==><==><==><==>
            $table->addColumn();
            $table->increments('TaskID'); // how to define like T001, T002, T003??
            $table->string('Description');
            $table->isBoolean('isCompleted')->default(false);
            $table->time('Deadline');
            $table->timestamps();


        });
    }

    /* 原始
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
