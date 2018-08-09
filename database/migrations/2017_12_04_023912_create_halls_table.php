<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHallsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('halls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('expo');
			$table->boolean('booked');
			$table->integer('user');
			$table->string('name');
			$table->text('polygon');
			$table->float('price');
			$table->dateTime('expoDate');
			$table->string('expoAddress');
			$table->string('logo');
			$table->string('documents');
			$table->string('contact');
			$table->string('email');
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
		Schema::drop('halls');
	}

}
