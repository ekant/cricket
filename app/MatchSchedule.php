<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchSchedule extends Model
{
	protected $connection = 'mysql';
	
	protected $table = 'match_schedule';
	
	public function team1(){
		return $this->hasOne('App\Teams','id','team_1');
	}
	
	public function team2(){
		return $this->hasOne('App\Teams','id','team_2');
	}
	
	public function groupdata(){
		return $this->hasOne('App\Groups','id','group');
	}
	
	public function matchdetails(){
		return $this->hasMany('App\MatchDetail','match_id');
	}
	
	public static function matchesGroupWise(){
		
		$matches = MatchSchedule::orderBy('match_date','asc')->with('team1','team2','groupdata')->get();
		
		$matches_group_by = [];
		if(!empty($matches)){
			$matches = $matches->toArray();
			foreach($matches as $match){
				//print_r($match);exit;
				$matches_group_by[$match['group']][] = $match;
			}
		}
		return $matches_group_by;
		
	}
	
	public static function matchesScheduleWise(){
	
		$matches = MatchSchedule::orderBy('match_date','asc')->with('team1','team2','groupdata')->get();
	
		$matches_group_by = [];
		if(!empty($matches)){
			$matches = $matches->toArray();
		}
		return $matches;
	
	}
	
}
