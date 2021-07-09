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
        Schema::dropIfExists('Task');


        // 創建資料表 create(<tableName>, closure封包)
        Schema::create('tasks', function (Blueprint $table) {
            //$table->addColumn();
            $table->increments('id')->first(); // how to define like T001, T002, T003??
            $table->mediumText('description');
            $table->boolean('iscompleted')->default(false);
            $table->time('due')->nullable();
            $table->timestamps();

        });

        //Schema::table()
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
