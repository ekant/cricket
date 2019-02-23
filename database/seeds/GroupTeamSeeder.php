<?php

use Illuminate\Database\Seeder;
use App\Groups;
use App\Teams;

class GroupTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$no_of_groups = array_get($_ENV,'NO_OF_GROUPS',2);
    	$no_of_teams = array_get($_ENV,'NO_OF_TEAMS',8);
    	
    	$factor = intval($no_of_teams/$no_of_groups);
    	$team_index = 1;
    	
    	$delete_groups = Groups::truncate();
    	$delete_teams = Groups::truncate();
    	
    	if(!empty($no_of_groups)){
    		
    		for($i = 1;$i<= $no_of_groups; $i++){
    			$group = new Groups();
    			$group->name = 'Group '.$i;
    			$group->save();
    			
    			if(!empty($factor)){
    				for($j = 1;$j<= $factor; $j++){
    					if($team_index <= $no_of_teams){
    						$team = new Teams();
    						$team->name = 'Team '.$team_index;
    						$team->group_id = $group->id;
    						$team->points = 0;
    						$team->save();
    							
    						$team_index++;
    					}
    					
    					
    				}
    			}
    			
    		}
    		
    	}
    }
}
