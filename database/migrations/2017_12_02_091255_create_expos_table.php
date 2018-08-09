<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->float('coordinateX');
			$table->float('coordinateY');
			$table->dateTime('expoDate');
			$table->string('expoAddress');
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
		Schema::drop('expos');
	}

}
