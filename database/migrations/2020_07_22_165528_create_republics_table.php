<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('republicName');
            $table->longtext('description');
            $table->string('postalCode');
            $table->boolean('privateRoom');
            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->integer('roomPrice');
        });

        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
    });
}

        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
