<?php

session_start();

class Connection {

    // Credentials
    protected $dbh;
    protected $mysql;
    
    protected function ConnectionPDO() {

       try {
        $Connection = $this -> dbh = new PDO("mysql:local=localhost;dbname=TicketSystem","root","");
        return $Connection;
       } catch (Exception $Error) {
        print "Error: ".$Error->getMessage().'<br>';
        die();
       }
    }
    
    public function Set_Names() {
        return $this->dbh->query("SET NAMES 'utf8'");
    }
    
    public function Route() {
        return "http://localhost:/GHW-PROJECT/";
    }

    
}

class MySQL{
    
    public function ConnectionMySQL()
    {
        $ConnectionMySQL = mysqli_connect("localhost","root","","TicketSystem"); 
        return $ConnectionMySQL;
    }

    public function Route() 
    {
        return "http://localhost:/GHW-PROJECT/";
    }
}

?>

