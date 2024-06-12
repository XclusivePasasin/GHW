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
