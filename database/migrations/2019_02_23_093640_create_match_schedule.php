<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchSchedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if(!Schema::hasTable('match_schedule'))
    	{
    		Schema::create('match_schedule', function (Blueprint $table) {
    			$table->increments('id')->unsigned()->unique();
    			$table->integer('team_1');
    			$table->integer('team_2');
    			$table->integer('group');
    			$table->date('match_date');
    			$table->string('game_type');
    			$table->integer('winner')->nullable();
    			$table->string('description')->nullable();
    			$table->timestamps();
    		});
    	}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    if(Schema::hasTable('match_schedule'))
        {
            Schema::drop('match_schedule');
        }
        
        
    }
}
