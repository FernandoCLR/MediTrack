<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimelinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timelines', function (Blueprint $table) {
                       $table->increments('id');
                       $table->string('title');
                       $table->string('hospital');
                       $table->mediumText('body');
                       $table->mediumText('treatment');
                       $table->mediumText('status');
                       $table->integer('user_id');
                       $table->string('file_title')->nullable()->default(null);
                       $table->string('file_name')->nullable()->default(null);
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
        Schema::dropIfExists('timelines');
    }
}
