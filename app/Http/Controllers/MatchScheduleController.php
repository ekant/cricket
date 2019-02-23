<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\MatchSchedule;
use App\MatchDetail;
use Carbon\Carbon;
use App\Teams;

class MatchScheduleController extends Controller
{
    /**
     * Show all the match lists
     *
     */
    public function getAll()
    {
    	$matches = MatchSchedule::matchesScheduleWise();
    	
    	//print_r($matches);exit;
    	
        return view('match_schedule', compact('matches'));
    }
    
    public function postPlayMatch($match_id){
    	
    	$match  = MatchSchedule::find($match_id);
    	
    	if(!empty($match)){
    		
    		$match_details_insert_array = MatchDetail::where('match_id',$match_id)->first();
    		if(!empty($match_detail)){
    			return redirect('/match-detail/'.$match_id);
    		}
    		
    		$match_details_insert_array = [];
    		$score = '0-0';
    		$overs = '0.0';
    		for($i = 0;$i < 300;$i++){
    			
    			$match_detail = MatchDetail::playBall($match->id, $score, $overs);
    			//print_r($score);exit;
    			$match_detail['batting_team'] = $match->team_1;
    			$match_detail['bowling_team'] = $match->team_2;
    			$match_detail['event_score'] = $score;
    			$match_detail['event_over'] = $overs;
    			$match_detail['created_at'] = Carbon::now()->toDateTimeString();
    			$match_detail['updated_at'] = Carbon::now()->toDateTimeString();
    			$match_details_insert_array[] = $match_detail;
    			
    		}
    		
    		$team_1_score = $score;
    		$score = '0-0';
    		$overs = '0.0';
    		for($i = 0;$i < 300;$i++){
    			$match_detail = MatchDetail::playBall($match->id, $score, $overs);
    			$match_detail['batting_team'] = $match->team_2;
    			$match_detail['bowling_team'] = $match->team_1;
    			$match_detail['created_at'] = Carbon::now()->toDateTimeString();
    			$match_detail['updated_at'] = Carbon::now()->toDateTimeString();
    			$match_details_insert_array[] = $match_detail;
    			 
    		}
    		
    		$team_2_score = $score;
    		//print_r($match_details_insert_array);exit;
    		if(!empty($match_details_insert_array)){
    			MatchDetail::insert($match_details_insert_array);
    		}
    		
    		$team_1_score = explode('-', $team_1_score)[0];
    		$team_2_score = explode('-', $team_2_score)[0];
    		
    		if($team_1_score > $team_2_score){
    			$match->winner = $match->team_1;
    		}elseif($team_1_score < $team_2_score){
    			$match->winner = $match->team_2;
    		}
			
    		$match->description = 'Match Played';
    		$match->save();
    		
    		if(!empty($match->winner)){
    			$team = Teams::find($match->winner);
    			$team->points = $team->points+2;
    			$team->save();
    		}
    		
    		
    	}
    	return redirect('/match-detail/'.$match_id);
    	
    	
    }
    
    public function getMatchDetail($match_id){
    	
    	$match = MatchSchedule::where('id',$match_id)->with('team1','team2','groupdata','matchdetails')->first();
    	
    	if(!empty($match)){
    		$match = $match->toArray();
    	}
    	//print_r($match);exit;
    	return view('match_detail', compact('match'));
    	print_r($match);exit;
    	
    	
    }
    
}