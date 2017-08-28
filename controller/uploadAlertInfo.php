<?php
require("../model/Db.php");

$dbse = new DbTools();

$contactDb = $_POST["phone_number"];
$msgDb = $_POST["alert_message"];
$providerDb = $_POST["phone_provider"];
$dayDb = $_POST["day_due"];
$monthDb = $_POST["month_due"];
$yearDb = $_POST["year_due"];
$dateAppendDb = $monthDb."/".$dayDb."/".$yearDb;
$timestampDb = (strtotime($dayDb." ".$monthDb." ".$yearDb)+7202);
$dayNotifDb = $_POST["day_notif"];
//$dayNotif = $_POST["days_notified"];
$ar = array();
$ar[] = $contactDb;
$ar[] = $msgDb;
$ar[] = $providerDb;
$ar[] = $dateAppendDb;
$ar[] = $timestampDb;
$ar[] = $dayNotifDb;

//Check if empty
for($i = 0; $i < count($ar); $i++) {
    if(empty($ar[$i])){
        return false;
        exit();
    }    
}    

$dbse->upload($contactDb, $msgDb, $dateAppendDb, $providerDb, $timestampDb, $dayNotifDb);

//Upload them to the database
echo json_encode($ar);

?>