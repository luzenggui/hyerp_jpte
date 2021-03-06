<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputquantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputquantities', function (Blueprint $table) {
            $table->increments('id');

            $table->date('outputdate');                       //出货日期
            $table->string('number');                       //序号
            $table->string('checkno');                //检验工号
            $table->string('manufactureshifts')->default('A');                //制造班次
            $table->integer('processinfo_id');                            //工艺单id
            $table->string('checkshifts');                //检验班次
            $table->string('createname');                            //创建人

            $table->string('remark')->nullable();                            //备注

            $table->string('fabricno')->default(1);                         //落布卷号
            $table->string('machineno');                            //织机号
            $table->integer('meter');                                 //验布长度
            $table->integer('gfmeter');                                 //来坯长度
            $table->string('mass')->nullable();                                   //质量问题

            $table->string('note');                //验布工工号
            $table->integer('length');                //码长
            $table->integer('totalpoints');                //总罚分
            $table->decimal('y100points',5,2);                //100y总罚分
            $table->string('grade');                //评级
            $table->integer('loosewarp')->nullable();                //松吊经
            $table->integer('wrongdraft')->nullable();                //错综
            $table->integer('dentmark')->nullable();                //筘路
            $table->integer('warpstreak')->nullable();                //错扣
            $table->integer('brokend_fillings')->nullable();                //断经纬
            $table->integer('hole')->nullable();                //破洞
            $table->integer('wrongend_pick')->nullable();                //错花/错格
            $table->integer('oiledend_pick')->nullable();                //油经/纬
            $table->integer('shirikend_pick')->nullable();                //经/纬起圈
            $table->integer('doublewarp_weft')->nullable();                //双经/双纬
            $table->integer('shw_selvedgemark')->nullable();                //边撑疵
            $table->integer('colorstreaks')->nullable();                //色档
            $table->integer('weftbar')->nullable();                //稀密路
            $table->integer('beltweft')->nullable();                //带纬
            $table->integer('foreignyarn')->nullable();                //三丝
            $table->integer('knots')->nullable();                //结头
            $table->integer('neps')->nullable();                //棉结
            $table->integer('tw')->nullable();                //脱纬
            $table->integer('fh')->nullable();                //织飞花
            $table->integer('cws')->nullable();                //错纬纱
            $table->integer('th')->nullable();                //条花
            $table->integer('thn')->nullable();                //条痕
            $table->integer('bsc')->nullable();                //边纱长
            $table->integer('jb')->nullable();                //浆斑

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
        Schema::dropIfExists('outputquantities');
    }
}
