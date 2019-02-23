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
        
        <table>
		  <tr>
		    <th>Match No.</th>
		    <th>Scheduled At</th>
		    <th>Group</th>
		    <th>Team 1</th>
		    <th>Team 2</th>
		    <th>Action</th>
		  </tr>
		  
		  @if(!empty($matches))
		  	@foreach($matches as $key => $match)
		  	<tr>
		    <td>{{$key++}}</td>
		    <td>{{array_get($match,'match_date','')}}</td>
		    <td>{{array_get($match,'groupdata.name','')}}</td>
		    <td>{{array_get($match,'team1.name','')}}</td>
		    <td>{{array_get($match,'team2.name','')}}</td>
		    <td><a href="/play-match/{{$match['id']}}" target="_blank">Play Match </a></td>
		    <td><a href="/match-detail/{{$match['id']}}" target="_blank">View Match Details</a></td>
		  	</tr>
		  	@endforeach
		  @endif
		  
		  
		</table>
        
    </body>
</html>
