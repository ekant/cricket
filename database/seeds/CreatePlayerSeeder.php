<?php

use Illuminate\Database\Seeder;
use App\Players;
use App\Teams;

class CreatePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$players = Players::truncate();
    	
    	$teams = Teams::all();
    	if(!empty($teams)){
    		foreach ($teams as $team){
    			$key = 1;
    			
    			while($key <= 11){
    				$player = new Players();
    				$player->name = 'Player '.$key;
    				$player->team = $team->id;
    				$player->save();
    				$key++;
    			}
    			
    		}
    	}
    	
    	
    }
}
