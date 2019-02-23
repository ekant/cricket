<?php

use Illuminate\Database\Seeder;
use App\Groups;
use App\MatchSchedule;
use Carbon\Carbon;

class MatchScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$match_schedules = MatchSchedule::truncate();
    	$group_with_teams = Groups::with('teams')->get();
    	$match_schedule_date = [];
    	
    	if(!empty($group_with_teams)){
    		foreach($group_with_teams as $key => $group_with_team){
    			
    			if(empty($match_schedule_date[$key])){
    				$match_schedule_date[$key] = Carbon::parse($_ENV['TOURNAMENT_START_DATE'])->toDateString();
    			}
    			
    			if(!empty($group_with_team->teams)){
    				
    				$teams = $group_with_team->teams;
    				
    				if(!empty($teams)){
    					foreach($teams as $team){
    						
    						foreach ($teams as $team2){
    							if($team->id != $team2->id){
    								
    								// check if already schedule for these teams has been created or not
    								$check_entry = MatchSchedule::where(function($q) use($team) {
								          $q->where('team_1', $team->id)
								            ->orWhere('team_2', $team->id);
								      })->where(function($q) use($team2) {
								          $q->where('team_1', $team2->id)
								            ->orWhere('team_2', $team2->id);
								      })->first();
								     
								      if(empty($check_entry)){
								      	$match_schedule = new MatchSchedule();
								      	$match_schedule->team_1 = $team->id;
								      	$match_schedule->team_2 = $team2->id;
								      	$match_schedule->group = $group_with_team->id;
								      	$match_schedule->game_type = array_get($_ENV,'game_type','ONEDAY');
								      	//$match_schedule->winner = null;
								      	//$match_schedule->description = null;
								      	$match_schedule->match_date = $match_schedule_date[$key];
								      	$match_schedule_date[$key] = Carbon::parse($match_schedule_date[$key])->addWeek()->toDateString();
								      	$match_schedule->save();
								      }
								    
								      
    							}
    						}
    						
    					}
    				}
    				
    				
    				
    			}
    		}
    	}
    	
    	
    }
}
