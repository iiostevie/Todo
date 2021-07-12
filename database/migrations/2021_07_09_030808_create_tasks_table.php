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
        Schema::dropIfExists('tasks');


        // 創建資料表 create(<tableName>, closure封包)
        Schema::create('tasks', function (Blueprint $table) {
            //$table->addColumn();
            $table->increments('id'); // how to define like T001, T002, T003??
            $table->mediumText('description')->nullable();
            $table->boolean('iscompleted')->default(false);
            $table->time('due')->nullable();
            $table->timestamps();
        });

        //Schema::table()
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */

    //反向
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
