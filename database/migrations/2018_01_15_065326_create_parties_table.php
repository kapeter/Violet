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
            $table->string('issue1');
            $table->string('issue2');
            $table->string('issue3');
            $table->string('issue4');
            $table->string('issue5');
            $table->string('issue6');
            $table->string('issue7');
            $table->string('issue7_more')->nullable();
            $table->string('issue8');
            // $table->string('fullname');
            // $table->string('phone');
            // $table->string('email');
            $table->text('think')->nullable();
            $table->text('suggest')->nullable();
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
