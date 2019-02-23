<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('players', function (Blueprint $table) {
    		$table->increments('id')->unsigned()->unique();
    		$table->string('name');
    		$table->integer('team');
    		$table->string('description')->nullable();
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
    	if(Schema::hasTable('players'))
    	{
    		Schema::drop('players');
    	}
    }
}
