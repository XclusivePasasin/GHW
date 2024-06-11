<?php

class TicketCRUD extends MySQL
{

private $Connection;
public function __construct() {
    $this->Connection = $this->ConnectionMySQL();
}

    public function RegisterTicket($Title,$Description,$CreateDate,$UpdateDate,$idStatus,$idUser,$idPriority,$idDifficulty)
    {
        $Connection = $this->Connection;
        $TicketModel = new TicketCRUD;

        $RegisterTicketSQL = "CALL sp_InsertTicket(" .
                                mysqli_real_escape_string($Connection, $Title) . ", '" .
                                mysqli_real_escape_string($Connection, $Description) . "', '" .
                                mysqli_real_escape_string($Connection, $CreateDate) . "', '" .
                                mysqli_real_escape_string($Connection, $UpdateDate) . "', '" .
                                mysqli_real_escape_string($Connection, $idStatus) . ", " .
                                mysqli_real_escape_string($Connection, $idUser) . ", '" .
                                mysqli_real_escape_string($Connection, $idPriority) . "', '" .
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