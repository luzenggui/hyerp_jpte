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

            $table->date('checkdate');                       //�鲼����
            $table->string('checkno');                //���鹤��
            $table->integer('processinfo_id');                            //���յ�id
            $table->string('checkshifts');                //������
            $table->string('createname');                            //������
            $table->decimal('qty');                            //�ɲ�����

            $table->string('machineno');                            //֯����
            $table->string('fabricno')->nullable();                         //�䲼���
            $table->string('weavingno')->nullable();                         //֯����
            $table->string('greyfabricno')->nullable();                         //��������
            $table->string('mass')->nullable();                                   //��������

            $table->string('vol_number');                         //���
            $table->integer('length');                //�볤
            $table->integer('totalpoints');                //�ܷ���
            $table->decimal('y100points',5,2);                //100y�ܷ���
            $table->string('grade');                //����

            $table->integer('tearing')->nullable();                //˺��
            $table->integer('skew_bow')->nullable();                //γб/γ��
            $table->integer('stains')->nullable();                //����
            $table->integer('color_spot')->nullable();                //ɫ��
            $table->integer('wrinkle_bar')->nullable();                //����
            $table->integer('streakness')->nullable();                //�Ʊߡ���ߡ���Ҷ��
            $table->integer('narrow_width')->nullable();                //խ��
            $table->integer('elastoprint')->nullable();                //��ӡ
            $table->integer('colorstreaks')->nullable();                //ɫ��
            $table->integer('weftbar')->nullable();                //ϡ��·
            $table->integer('loosewarp')->nullable();                //�ɵ���
            $table->integer('hole')->nullable();                //�ƶ�
            $table->integer('float')->nullable();                //����
            $table->integer('brokenend_fillings')->nullable();                //�Ͼ�/γ
            $table->integer('shirikend_pick')->nullable();                //��/γ��Ȧ
            $table->integer('wrongend_pick')->nullable();                //���
            $table->integer('wrong_draft')->nullable();                //������ɫ�����ۡ�˫�������أ�
            $table->integer('mendingmark')->nullable();                //�޺�
            $table->integer('ribbon_yarn')->nullable();                //��ɴ
            $table->integer('tw')->nullable();                //��γ
            $table->integer('fh')->nullable();                //�ɻ�
            $table->integer('jb')->nullable();                //����
            $table->integer('oiledend_pick')->nullable();                //�;�/γ
            $table->integer('neps')->nullable();                //�޵�
            $table->integer('knots')->nullable();                //��ͷ
            $table->integer('tgby')->nullable();                //���ɲ���
            $table->integer('th')->nullable();                //����

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
