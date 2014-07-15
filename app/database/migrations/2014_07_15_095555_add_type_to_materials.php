<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddTypeToMaterials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('materials', function(Blueprint $table)
		{
			$table->string('type');
			$table->text('url');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('materials', function(Blueprint $table)
		{
			$table->dropColumn('type');
			$table->dropColumn('url');
		});
	}

}
