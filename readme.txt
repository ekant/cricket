Install project, run composer update and if required provide permissions and create laravel.log file.


1. create mysql db and configure in .env
2. configure NO_OF_GROUPS,NO_OF_TEAMS,GAME_TYPE,TOURNAMENT_START_DATE in .env
3. run php artisan migrate   // to create all tables in db
4. run php artisan db:seed --class=GroupTeamSeeder // Seeder to create specified number of teams amd groups
5. run php artisan db:seed --class=MatchScheduleSeeder // Seeder to create match schedules
6. run php artisan db:seed --class=CreatePlayerSeeder // Seeder to create players

7. /match-schedules will show the list of all matches that are scheduled.
8. /points-table will show points table group wise.

