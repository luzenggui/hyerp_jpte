<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcessinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processinfos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('insheetno')->unique();                       //厂编号
            $table->string('pattern');                         //花型
            $table->string('density');                   //纬密
            $table->string('width');                           //坯布门幅
            $table->string('ffwidth');                           //成布门幅
            $table->string('unit');                           //单位
            $table->string('syarntype');                           //纱支
            $table->string('contractno');                      //合同号
            $table->date('diliverydate');                      //交期
            $table->string('orderquantity');                  //合同数量
            $table->string('specification');                   //产品规格
            $table->string('yarn100m');                       //百米用纱量
            $table->string('code')->nullabel();                       //成品代码

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
        Schema::dropIfExists('processinfos');
    }
}
