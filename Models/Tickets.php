<?php

class TicketCRUD extends MySQL
{

private $Connection;
public function __construct() {
    $this->Connection = $this->ConnectionMySQL();
}

    public function RegisterTicket($idTicket, $Title,$Description,$CreateDate,$UpdateDate,$idStatus,$idUser,$idPriority,$idDifficulty)
    {
        $Connection = $this->Connection;
        $TicketModel = new TicketCRUD;
        $RegisterTicketSQL = "CALL sp_InsertTicket(" .
                                mysqli_real_escape_string($Connection, $idTicket) . "', '" .
                                mysqli_real_escape_string($Connection, $Title) . "', '" .
                                mysqli_real_escape_string($Connection, $Description) . "', '" .
                                mysqli_real_escape_string($Connection, $CreateDate) . "', '" .
                                mysqli_real_escape_string($Connection, $UpdateDate) . "', '" .
                                mysqli_real_escape_string($Connection, $idStatus) . "', " .
                                mysqli_real_escape_string($Connection, $idUser) . ", " .
                                mysqli_real_escape_string($Connection, $idPriority) . ", " .
                                mysqli_real_escape_string($Connection, $idDifficulty) . "')";
        $TicketResult = mysqli_query($Connection, $RegisterTicketSQL);
        if($TicketResult==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}