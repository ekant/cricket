<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //
	protected $connection = 'mysql';
	
	protected $table = 'groups';
	
	public function teams(){
		return $this->hasMany('App\Teams','group_id','id');
	}
	
	public static function getAllWithTeams(){
		
		$groups = Groups::with('teams')->get();
		if(!empty($groups)){
			$groups = $groups->toArray();
		}
		return $groups;
		
	}
	
}
