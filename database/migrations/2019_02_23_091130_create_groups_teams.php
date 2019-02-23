<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if(!Schema::hasTable('groups'))
    	{
    		Schema::create('groups', function (Blueprint $table) {
    			$table->increments('id')->unsigned()->unique();
    			$table->string('name');
    			$table->timestamps();
    		});
    	}
    	
    	if(!Schema::hasTable('teams'))
    	{
    		Schema::create('teams', function (Blueprint $table) {
    			$table->increments('id')->unsigned()->unique();
    			$table->string('name');
    			$table->integer('group_id');
    			$table->integer('points');
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
    if(Schema::hasTable('groups'))
        {
            Schema::drop('groups');
        }
        
        if(Schema::hasTable('teams'))
        {
        	Schema::drop('teams');
        }
    }
    
    
    
}
