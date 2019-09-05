<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputquantityitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputquantityitems', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->integer('outputquantityhead_id');                            //��ͷid

            $table->string('fabricno')->default(1);                         //�䲼���
            $table->string('machineno');                            //֯����
            $table->integer('meter');                                 //�鲼����
            $table->string('mass');                                   //��������
            $table->string('remark')->nullable();                                //��ע

            $table->string('note');                //���ע
            $table->string('manufactureshifts');                //���
            $table->integer('length');                //�볤
            $table->integer('totalpoints');                //�ܷ���
            $table->decimal('y100points',5,2);                //100y�ܷ���
            $table->string('grade');                //����
            $table->integer('loosewarp')->nullable();                //�ɵ���
            $table->integer('wrongdraft')->nullable();                //����
            $table->integer('dentmark')->nullable();                //��·
            $table->integer('warpstreak')->nullable();                //���
            $table->integer('brokend_fillings')->nullable();                //�Ͼ�γ
            $table->integer('hole')->nullable();                //�ƶ�
            $table->integer('wrongend_pick')->nullable();                //��/���
            $table->integer('oiledend_pick')->nullable();                //�;�/γ
            $table->integer('shirikend_pick')->nullable();                //��/γ��Ȧ
            $table->integer('doublewarp_weft')->nullable();                //˫��/˫γ
            $table->integer('shw_selvedgemark')->nullable();                //�߳Ŵ�
            $table->integer('colorstreaks')->nullable();                //ɫ��
            $table->integer('weftbar')->nullable();                //ϡ��·
            $table->integer('beltweft')->nullable();                //��γ
            $table->integer('foreignyarn')->nullable();                //��˿
            $table->integer('knots')->nullable();                //��ͷ
            $table->integer('neps')->nullable();                //�޽�
            $table->integer('tw')->nullable();                //��γ
            $table->integer('fh')->nullable();                //֯�ɻ�
            $table->integer('cws')->nullable();                //��γɴ
            $table->integer('th')->nullable();                //����
            $table->integer('thn')->nullable();                //����
            $table->integer('bsc')->nullable();                //��ɴ��
            $table->integer('jb')->nullable();                //����

            $table->timestamps();

            $table->foreign('outputquantityhead_id')->references('id')->on('outputquantityheads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputquantityitems');
    }
}
