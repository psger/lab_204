<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hastable('comments')){
            Schema::dropIfExists('comments');
        };
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->integer('post_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('content');
            $table->integer('like')->default(0);
            $table->timestamps();

//            $table->foreign('post_id')->references('id')->on('posts');
//            $table->foreign('user_id')->references('id')->on('users');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('comments');
    }
}
