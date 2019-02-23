<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}
			
			td, th {
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}
			
			tr:nth-child(even) {
			  background-color: #dddddd;
			}
        </style>
    </head>
    <body>
        
        <h2>{{array_get($match,'team1.name','')}} vs {{array_get($match,'team2.name','')}}</h2>
        <h2>Scheduled at {{array_get($match,'match_date','')}}</h2>
        @if(!empty(array_get($match,'winner','')))
        	@if(array_get($match,'winner','') == array_get($match,'team1.id',''))
        	<h2> {{array_get($match,'team1.name','')}} won the match ! </h2>
        	@endif
        	
        	@if(array_get($match,'winner','') == array_get($match,'team2.id',''))
        	<h2> {{array_get($match,'team2.name','')}} won the match ! </h2>
        	@endif
        	
        @endif
        @if(empty(array_get($match,'matchdetails',[])))
        <h3>Match yet to start. Don't go away!</h3>
        @else
        
        <?php 
        $team1 = array_get($match,'matchdetails.0.batting_team','');
        ?>
        
        <h2>{{array_get($match,'team1.name','')}} Innings </h2>
        <table>
		  <tr>
		  	<th>Event</th>
		    <th>Score.</th>
		    <th>Over</th>
		    <th>Description</th>
		  </tr>
        @foreach(array_get($match,'matchdetails',[]) as $match_detail)
        
	        @if(array_get($match_detail,'batting_team','') != $team1)
	        <?php
	        $team1 = array_get($match,'matchdetails.0.bowling_team','');
	        ?>
	        </table>
	        <h2>{{array_get($match,'team2.name','')}} Innings </h2>
        	<table>
			  <tr>
			  	<th>Event</th>
			    <th>Score.</th>
			    <th>Over</th>
			    <th>Description</th>
			  </tr>
	        @endif
        
        
        	<tr>
		    <td>{{array_get($match_detail,'event','')}}</td>
		    <td>{{array_get($match_detail,'event_score','')}}</td>
		    <td>{{array_get($match_detail,'event_over','')}}</td>
		    <td>{{array_get($match_detail,'description','')}}</td>
		  	</tr>
        
        
        @endforeach()
        
        </table>
        @endif
        
		  
		  
		
        
    </body>
</html>
