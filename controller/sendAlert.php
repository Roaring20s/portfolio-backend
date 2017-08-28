<?php
//This will involve a CRON job
require("../model/Db.php");

//SELECT STATEMENT OF EVERYTHING WITHIN 7 DAYS
$dbse = new DbTools();

var_dump($dbse->selectUpcomingTasks());






//Which alerts are within 1-7 days from being taken place
//If the window suits the accompanying number
//Then send the message


//See what alerts are due within 1-7 days

//a



















?>