<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($newtable){
            $newtable->increments('id');
            $newtable->string('username', 100)->unique();
            $newtable->string('email', 100)->unique();
            $newtable->string('password',60);
            $newtable->timestamps();
        });

        Schema::create('posts', function($newtable){
            $newtable->increments('id');
            $newtable->text('content');
            $newtable->text('video_embed');
            $newtable->string('title');
            $newtable->integer('user_id')->nullable()->references('id')->on('users');
            $newtable->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
        Schema::drop('posts');
	}

}
