<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function($table)
		{
			$table->increments('id');
			$table->string('author');
			$table->string('title');
			$table->string('body');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}