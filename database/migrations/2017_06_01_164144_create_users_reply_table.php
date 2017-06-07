<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Replies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reply');
            $table->integer('user_id');
            $table->integer('parent_id');
            $table->string('parent_type')->default('App\\\Comment');
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
        Schema::dropIfExists('Replies');
    }
}
