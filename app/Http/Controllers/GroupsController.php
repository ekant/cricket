<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\MatchSchedule;
use App\Groups;

class GroupsController extends Controller
{
    /**
     * Show all the match lists
     *
     */
    public function getAll()
    {
    	
    	$groups = Groups::getAllWithTeams();
    	
    	//print_r($groups);exit;
    	
        return view('points_table', compact('groups'));
    }
}