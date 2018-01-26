<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('parties', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('openid');
        //     $table->string('nickname');
        //     $table->string('headimgurl');
        //     $table->string('fullname');
        //     $table->string('number');
        //     $table->boolean('has_drawn');
        //     $table->timestamps();
        // });

        Schema::create('parties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('openid');
            $table->string('nickname');
            $table->string('headimgurl');
            $table->string('fullname');
            $table->string('phone');
            $table->string('topic3');
            $table->string('topic4');
            $table->string('topic5');
            $table->string('topic6');
            $table->string('topic7');
            $table->string('topic8_1')->default(0);
            $table->string('topic8_2')->default(0);
            $table->string('topic8_3')->default(0);
            $table->string('topic8_4')->default(0);
            $table->string('topic9_1')->default(0);
            $table->string('topic9_2')->default(0);
            $table->string('topic9_3')->default(0);
            $table->string('topic9_4')->default(0);
            $table->boolean('has_drawn')->default(false);
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
        Schema::dropIfExists('parties');
    }
}
