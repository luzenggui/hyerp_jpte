<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputquantityheadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputquantityheads', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->date('outputdate');                       //��������
            $table->string('checkno');                //���鹤��
            $table->string('note')->nullable();                //�����α�ע
            $table->string('manufactureshifts');                //������
//            $table->string('machineno');                //����
            $table->integer('length')->nullable();                //�볤
            $table->integer('totalpoints')->nullable();                //�ܷ���
            $table->decimal('y100points',5,2)->nullable();                //100y�ܷ���
            $table->string('grade')->nullable()->nullable();                //����
            $table->integer('processinfo_id');                            //���յ�id
            $table->string('checkshifts');                //������
            $table->string('createname');                            //������

            $table->string('remark')->nullable();                            //��ע

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
        Schema::dropIfExists('outputquantityheads');
    }
}
