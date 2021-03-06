<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostMetaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postMeta',function($table){
			$table->increments('id');
			$table->integer('postId')->unsigned();
			$table->text('metaKey');
			$table->text('metaValue');
			$table->timestamps();
			$table->softDeletes();
			$table->foreign('postId')->references('id')->on('posts')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postMeta');
	}

}