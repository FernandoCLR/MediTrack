<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('e_channels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('area');
            $table->string('d_name');
            $table->string('hospital');
            $table->date('date');
            $table->time('time');
            $table->integer('d_amount')->nullable()->default(null);
            $table->integer('h_amount')->nullable()->default(null);
            $table->integer('t_amount')->nullable()->default(null);
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
        Schema::dropIfExists('e_channels');
    }
}
