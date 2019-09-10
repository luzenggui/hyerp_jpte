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

            $table->date('outputdate');                       //��������
            $table->integer('processinfo_id');                            //���յ�id
            $table->string('createname');                            //������
            $table->integer('segmentqty');                            //����
            $table->integer('qtyinspected');                            //�鲼����
            $table->char('ifcomplete',2)->nullable();                            //�Ƿ��˻�
            $table->integer('qtyoutput')->nullable();                            //��������

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
