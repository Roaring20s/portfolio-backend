<?php

require("../model/Db.php");
require("../model/sortTasksModel.php");

//SELECT STATEMENT OF EVERYTHING WITHIN 7 DAYS
$dbse = new DbTools();
$sort = new Sorter();
//Send email to user
$sort->categorizeNotification($dbse->selectUpcomingTasks());














?>