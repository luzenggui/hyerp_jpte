<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputfinishfabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputfinishfabrics', function (Blueprint $table) {
            $table->increments('id');

            $table->date('checkdate');                       //验布日期
            $table->string('checkno');                //检验工号
            $table->integer('processinfo_id');                            //工艺单id
            $table->string('checkshifts');                //检验班次
            $table->string('createname');                            //创建人
            $table->decimal('qty');                            //成布数量

            $table->string('machineno');                            //织机号
            $table->string('fabricno')->nullable();                         //落布卷号
            $table->string('weavingno')->nullable();                         //织布号
            $table->string('greyfabricno')->nullable();                         //坯布工号
            $table->string('mass')->nullable();                                   //质量问题

            $table->string('vol_number');                         //卷号
            $table->integer('length');                //码长
            $table->integer('totalpoints');                //总罚分
            $table->decimal('y100points',5,2);                //100y总罚分
            $table->string('grade');                //评级

            $table->integer('tearing')->nullable();                //撕裂
            $table->integer('skew_bow')->nullable();                //纬斜/纬弧
            $table->integer('stains')->nullable();                //污渍
            $table->integer('color_spot')->nullable();                //色点
            $table->integer('wrinkle_bar')->nullable();                //皱条
            $table->integer('streakness')->nullable();                //破边、卷边、荷叶边
            $table->integer('narrow_width')->nullable();                //窄幅
            $table->integer('elastoprint')->nullable();                //橡弹印
            $table->integer('colorstreaks')->nullable();                //色档
            $table->integer('weftbar')->nullable();                //稀密路
            $table->integer('loosewarp')->nullable();                //松吊经
            $table->integer('hole')->nullable();                //破洞
            $table->integer('float')->nullable();                //跳花
            $table->integer('brokenend_fillings')->nullable();                //断经/纬
            $table->integer('shirikend_pick')->nullable();                //经/纬起圈
            $table->integer('wrongend_pick')->nullable();                //错格
            $table->integer('wrong_draft')->nullable();                //穿错（错色、错综、双经、错筘）
            $table->integer('mendingmark')->nullable();                //修痕
            $table->integer('ribbon_yarn')->nullable();                //带纱
            $table->integer('tw')->nullable();                //脱纬
            $table->integer('fh')->nullable();                //飞花
            $table->integer('jb')->nullable();                //浆斑
            $table->integer('oiledend_pick')->nullable();                //油经/纬
            $table->integer('neps')->nullable();                //棉点
            $table->integer('knots')->nullable();                //结头
            $table->integer('tgby')->nullable();                //条干不匀
            $table->integer('th')->nullable();                //条花

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
        Schema::dropIfExists('outputfinishfabrics');
    }
}
