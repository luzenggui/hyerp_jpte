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

            $table->date('outputdate');                       //出货日期
            $table->integer('processinfo_id');                            //工艺单id
            $table->string('createname');                            //创建人
            $table->string('note')->nullable();                            //备注
            
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
