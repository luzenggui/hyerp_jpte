<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutputheadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outputheads', function (Blueprint $table) {
            //
            $table->increments('id');

            $table->date('outputdate');                       //��������
            $table->integer('processinfo_id');                            //���յ�id
            $table->string('createname');                            //������
            $table->string('note')->nullable();                            //��ע
            
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
        Schema::dropIfExists('outputheads');
    }
}
