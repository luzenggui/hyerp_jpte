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

            $table->date('djdate');                //�Ǽ�����
            $table->string('checkno');                //���鹤��
            $table->string('note')->nullable();                //��ע
            $table->string('manufactureshifts');                //������
            $table->string('machineno');                //����
            $table->integer('length')->nullable();                //�볤
            $table->integer('totalpoints')->nullable();                //�ܷ���
            $table->decimal('y100points',2)->nullable();                //100y�ܷ���
            $table->string('grade')->nullable();                //����
            $table->integer('processinfo_id');                //���յ���
            $table->string('checkshifts');                //������
            $table->string('createname');                //������
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
