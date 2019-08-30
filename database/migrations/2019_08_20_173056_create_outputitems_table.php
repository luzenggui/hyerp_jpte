<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputitemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputitems', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->integer('outputhead_id');                            //��ͷid
            $table->string('fabricno')->default(1);                         //�䲼���
            $table->string('machineno');                            //֯����
            $table->integer('meter');                                 //�鲼����
            $table->string('mass');                                   //��������
            $table->string('remark')->nullable();                                //��ע

            $table->timestamps();

            $table->foreign('outputhead_id')->references('id')->on('outputheads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outputitems');
    }
}
