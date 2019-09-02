<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityreportheadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantityreportheads', function (Blueprint $table) {
            $table->increments('id');

            $table->date('djdate');                //登记日期
            $table->string('checkno');                //检验工号
            $table->string('note')->nullable();                //备注
            $table->string('manufactureshifts');                //制造班次
            $table->string('machineno');                //车号
            $table->integer('length')->nullable();                //码长
            $table->integer('totalpoints')->nullable();                //总罚分
            $table->decimal('y100points',2)->nullable();                //100y总罚分
            $table->string('grade')->nullable()->nullable();                //评级
            $table->integer('processinfo_id');                //工艺单号
            $table->string('checkshifts');                //检验班次
            $table->string('createname');                //创建人
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
        Schema::dropIfExists('quantityreportheads');
    }
}
