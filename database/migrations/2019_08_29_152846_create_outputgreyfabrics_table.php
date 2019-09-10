<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputgreyfabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputgreyfabrics', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->date('outputdate');                       //出货日期
            $table->integer('processinfo_id');                            //工艺单id
            $table->string('createname');                            //创建人
            $table->integer('segmentqty');                            //段数
            $table->integer('qtyinspected');                            //验布长度
            $table->char('ifcomplete',2)->nullable();                            //是否了机
            $table->integer('qtyoutput')->nullable();                            //出货长度

            $table->timestamps();

            $table->foreign('processinfo_id')->references('id')->on('processinfos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputgreyfabrics');
    }
}
