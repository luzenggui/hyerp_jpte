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

            $table->string('insheetno')->unique();                       //�����
            $table->string('pattern');                         //����
            $table->string('density');                   //γ��
            $table->string('width');                           //�ŷ�
            $table->string('syarntype');                           //ɴ֧
            $table->string('contractno');                      //��ͬ��
            $table->date('diliverydate');                      //����
            $table->string('orderquantity');                  //��ͬ����
            $table->string('specification');                   //��Ʒ���

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
