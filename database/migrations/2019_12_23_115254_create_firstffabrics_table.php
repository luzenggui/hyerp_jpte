<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirstffabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firstffabrics', function (Blueprint $table) {
            $table->increments('id');

            $table->date('indate');                                        //输入日期
            $table->integer('processinfo_id');                            //工艺单id
            $table->integer('length');                                    //码长
            $table->string('remark1')->nullable();                            //备注1
            $table->string('remark2')->nullable();                            //备注2
            $table->string('createname')->nullable();                            //创建人

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('firstffabrics');
    }
}
