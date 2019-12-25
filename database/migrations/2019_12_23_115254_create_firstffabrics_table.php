<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFirstffabricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firstffabrics', function (Blueprint $table) {
            $table->increments('id');

            $table->date('indate');                                        //��������
            $table->integer('processinfo_id');                            //���յ�id
            $table->integer('length');                                    //�볤
            $table->string('remark1')->nullable();                            //��ע1
            $table->string('remark2')->nullable();                            //��ע2
            $table->string('createname')->nullable();                            //������

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
        Schema::dropIfExists('firstffabrics');
    }
}
