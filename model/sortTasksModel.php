<?php
class Sorter{
    private $dayNotifyHolder = array();
    
    //Decide when a task is due
    public function categorizeNotification($tasks){
        for($i = 0; $i < count($tasks); $i++){
            $timeDiff = $tasks[$i]["timestamp"] - (time() - 18000);
            for($j = 0; $j < 8; $j++){
                if($timeDiff > (86400*$j) && $timeDiff < (86400*($j+1))){
                    //If the number of days away matches the notification they put in, email them. 
                    $daysNotifyArray = str_split($tasks[$i]["day_notif"]);
                    for($x = 0; $x < count($daysNotifyArray); $x++){
                        if($daysNotifyArray[$x] == $j+1) {
                            sleep(1);
                            $mailerMessage = $tasks[$i]["alert_message"]. " is due in ".$daysNotifyArray[$x]." day(s)";
                            $contact = $tasks[$i]["contact"].$this->determineGateway($tasks[$i]["provider"]);
                            $this->mailUser($contact, "ALERT", $mailerMessage);
                        }
                    }
                }
            }
        }
    }
    //Delimit the days notification into an array
    public function delimitDaysNotify($taskInformation){
        $splitTask = array();
        $dayNotifHolder = array();
        for($i = 0; $i < count($taskInformation); $i++){
            $splitTask = str_split($taskInformation[$i]["day_notif"]);
            $dayNotifHolder[$i] = $splitTask;
        }
        return $dayNotifHolder;
    }
    //Mail user the email or text
    public function mailUser($con, $sub, $msg){
        mail($con, $sub, $msg);
    }
    //Create SMS gateway based on provider
    public function determineGateway($userGateway){
        $smtpLink = "";
        if($userGateway == "None") {
            $smtp = "";
            return $smtp;
        } else {
            if($userGateway == "ATT"){
                $smtpLink = "@txt.att.net";
                return $smtpLink;
            } elseif($userGateway == "Sprint"){
                $smtpLink = "@messaging.sprintpcs.com";
                return $smtpLink;
            } elseif($userGateway == "Verizon"){
                $smtpLink = "@vtext.com";
                return $smtpLink;
            } elseif($userGateway == "T-Mobile"){
                $smtpLink = "@tmomail.net";
                return $smtpLink;
            } else {
                exit();
            }
        }
    }
    
}



















?>