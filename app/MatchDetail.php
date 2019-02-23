<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchDetail extends Model
{
    //
	protected $connection = 'mysql';
	
	protected $table = 'match_details';
	
	public static function playBall($match_id,&$score,&$over){
		
		$events = [
				'1',
				'2',
				'3',
				'4',
				'6',
				'W',
				'0'
		];
		$match_detail =  [];
		$description = '';
		$match_detail['match_id'] = $match_id;
		$match_detail['event'] = $events[array_rand($events)];
		
		$event_score = explode('-', $score)[0];
		$event_wicket = explode('-', $score)[1];
		
		$total_overs = explode('.', $over)[0];
		$ball_in_over = explode('.', $over)[1];
		
		if($event_wicket >= 10){
			$match_detail['event'] = '0';
		}
		
		switch ($match_detail['event']){
			case '1':
				$event_score += 1;
				$description = 'Tight single taken';
				break;
			case '2':
				$event_score += 2;
				$description = 'Played in deep for 2.';
				break;
			case '3':
				$event_score += 1;
				$description = 'Awesome running b/w the wickets.';
				break;
			case '4':
				$event_score += 4;
				$description = 'Excellent shot.';
				break;
			case '6':
				$event_score += 6;
				$description = 'Its mighty.';
				break;
			case '0':
				$description = 'Its a dot ball.';
				break;
			case 'W':
				$event_wicket += 1;
				$description = 'Wicket !!!';
				break;
							
		}
		
		if($ball_in_over == 5){
			$total_overs ++;
			$ball_in_over = 0;
		}else{
			$ball_in_over ++;
		}
		
		$score = implode('-', [$event_score,$event_wicket]);
		$over = implode('.', [$total_overs,$ball_in_over]);
		
		$match_detail['event_score'] = $score;
		$match_detail['event_over'] = $over;
		$match_detail['description'] = $description;
		
		return $match_detail;
		
		//dd($score);
		print_r($match_detail);exit;
		print_r($match_detail);exit;
		
	}
	
}
