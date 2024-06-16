<?php

class TicketCRUD extends MySQL
{
    private $Connection;
    
    public function __construct() 
    {
        $this->Connection = $this->ConnectionMySQL();
    }

    public function RegisterTicket($idTicket, $Title, $Description, $idStatus, $idUser, $idPriority, $idDifficulty)
    {
        $Connection = $this->Connection;
        
        $RegisterTicketSQL = "CALL sp_InsertTicket(" .
                             "NULL, " .
                             "'" . mysqli_real_escape_string($Connection, $Title) . "', " .
                             "'" . mysqli_real_escape_string($Connection, $Description) . "', " .
                             intval($idStatus) . ", " .
                             intval($idUser) . ", " .
                             intval($idPriority) . ", " .
                             intval($idDifficulty) . ")";
                             
        $TicketResult = mysqli_query($Connection, $RegisterTicketSQL);

        return true;

        if(!$TicketResult)
        {
            return false;
        }
    }

    public function UpdateTicket($idTicket, $Title, $Description, $CreateDate, $idStatus, $idUser, $idPriority, $idDifficulty)
    {
        $Connection = $this->Connection;
        $UpdateTicketSQL = "CALL sp_UpdateTicket(" .
                            mysqli_real_escape_string($Connection, $idTicket) . ", '" .
                            mysqli_real_escape_string($Connection, $Title) . "', '" .
                            mysqli_real_escape_string($Connection, $Description) . "', '" .
                            mysqli_real_escape_string($Connection, $CreateDate) . "', '" .
                            mysqli_real_escape_string($Connection, $idStatus) . "', '" .
                            mysqli_real_escape_string($Connection, $idUser) . "', " .
                            mysqli_real_escape_string($Connection, $idPriority) . ", " .
                            mysqli_real_escape_string($Connection, $idDifficulty) . ", " ;
        $UpdateResult = mysqli_query($Connection, $UpdateEmployeeSQL);
        return True;
        if (!$UpdateResult) {
            return False;
        }
    }

    public function Select_10_Tickets($Connection)
{
    $SelectTicketsSQL = "SELECT * FROM Ticket ORDER BY CreateDate DESC LIMIT 10";
    $Select_10_Ticket = mysqli_query($Connection, $SelectTicketsSQL);

    if (!$Select_10_Ticket) 
    {
        return false;
    }

    return $Select_10_Ticket;
}


    function ProblemsHTML($ID_Category, $Connection) 
    {
        $ProblemsSQL = "SELECT * FROM problems WHERE ID_Category = $ID_Category";
        $ProblemsResult = mysqli_query($Connection, $ProblemsSQL);
        $htmlProblems = "";
        while ($ProblemData = $ProblemsResult->fetch_object()) 
        {
            $htmlProblems .= '<option value="' . $ProblemData->ID_Problem . '">' . $ProblemData->Name . '</option>';
        }

        return $htmlProblems;
    }
}

?>
