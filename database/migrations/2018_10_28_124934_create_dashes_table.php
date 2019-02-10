<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id'); 
            $table->string('first_name');
            $table->string('second_name'); 
            $table->string('last_name');
            $table->date('dob');
            $table->integer('age');
            $table->integer('m_tp_no');
            $table->integer('h_tp_no');
            $table->string('email');
            $table->string('emg_one_name');
            $table->string('emg_one_relationto_user');
            $table->string('emg_two_relationto_user');
            $table->string('emg_two_name');
            $table->integer('emg_one');
            $table->integer('emg_two');
            $table->string('b_grp');
            $table->mediumText('description')->nullable();
            $table->string('address');
            $table->string('nic');
            $table->string('gender');
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
        Schema::dropIfExists('dashes');
    }
}
