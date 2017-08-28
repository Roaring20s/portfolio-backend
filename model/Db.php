<?php
require("../classes/DbModel.php");

class DbTools extends Model {
    
    public function selectUpcomingTasks(){
		$this->query('SELECT * FROM invoices WHERE timestamp <= UNIX_TIMESTAMP() + 604800 AND timestamp > UNIX_TIMESTAMP()');
		$rows = $this->resultSet();
		return $rows;
	}
    
	public function upload($contact, $alert_message, $due_date, $provider, $timestamp, $day_notif){
        //Insert into Database
        $this->query('INSERT INTO invoices (contact, alert_message, due_date, provider, timestamp, day_notif) VALUES(:contact, :alert_message, :due_date, :provider, :timestamp, :day_notif)');
        $this->bind(':contact', $contact);
        $this->bind(':alert_message', $alert_message);
        $this->bind(':due_date', $due_date);
        $this->bind(':provider', $provider);
        $this->bind(':timestamp', $timestamp);
        $this->bind(':day_notif', $day_notif);
        $this->execute();
     }
}



//WHERE TIMESTAMP < TIMESTAMP NOW + 604800
















?>