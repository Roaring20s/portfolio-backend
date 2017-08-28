<?php
require("../model/Db.php");
require("../model/sortTasksModel.php");

$contact = $_POST["phone_number"];
$alert_message = $_POST["alert_message"];
$provider = $_POST["provider"];

$send = new Sorter();

//Determine Gateway
$userGateway = $send->determineGateway($provider);
$contact = $contact.$userGateway;
//Send Message
$send->mailUser($contact, "DUE TODAY", $alert_message);

$ar = array();
$test = "test";
$ar[] = $test;
echo json_encode($ar);












?>