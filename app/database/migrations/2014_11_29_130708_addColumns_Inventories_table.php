<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('Inventories', function(Blueprint $table)
        {
            $table->string('name')->after('id');
            $table->string('description')->after('name');
            $table->string('initials',4)->after('description');
            $table->integer('qty')->unsigned()->after('initials');

	    });
    }
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('Inventories', function($table)
        {
            $table->dropColumn(array('name', 'description', 'initials','qty'));
        });
	}

}
