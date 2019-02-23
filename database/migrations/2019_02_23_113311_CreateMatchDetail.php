<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('match_details', function (Blueprint $table) {
    		$table->increments('id')->unsigned()->unique();
    		$table->integer('match_id');
    		$table->char('event');
    		$table->integer('batting_team');
    		$table->integer('bowling_team');
    		$table->string('event_score');
    		$table->string('event_over');
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
    	if(Schema::hasTable('match_details'))
    	{
    		Schema::drop('match_details');
    	}
    }
}
