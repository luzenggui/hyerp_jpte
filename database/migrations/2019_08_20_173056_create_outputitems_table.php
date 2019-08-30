<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputitems', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->integer('outputhead_id');                            //表头id
            $table->string('fabricno')->default(1);                         //落布卷号
            $table->string('machineno');                            //织机号
            $table->integer('meter');                                 //验布长度
            $table->string('mass');                                   //质量问题
            $table->string('remark')->nullable();                                //备注

            $table->timestamps();

            $table->foreign('outputhead_id')->references('id')->on('outputheads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputitems');
    }
}
