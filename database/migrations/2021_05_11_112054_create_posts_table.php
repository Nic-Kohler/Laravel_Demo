<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
	public function up()
	{
		Schema::create("posts", function(Blueprint $table)
		{
			$table->increments("id");
			$table->integer("user_id");
			$table->text("title");
			$table->longText("content");
			$table->text("image_url");
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop("posts");
	}
}
