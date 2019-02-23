<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    //
	protected $connection = 'mysql';
	
	protected $table = 'teams';
	
	
	public function players(){
		
		return $this->hasMany('App\Players','team','id');
	}
}
