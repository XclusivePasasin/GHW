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

    public function UpdateTicket($idTicket, $Title, $Description, $CreateDate, $UpdateDate, $idStatus, $idUser, $idPriority, $idDifficulty)
    {
        $Connection = $this->Connection;
        $UpdateTicketSQL = "CALL sp_UpdateTicket(" .
                            intval($idTicket) . ", " .
                            "'" . mysqli_real_escape_string($Connection, $Title) . "', " .
                            "'" . mysqli_real_escape_string($Connection, $Description) . "', " .
                            "'" . mysqli_real_escape_string($Connection, $CreateDate) . "', " .
                            intval($idStatus) . ", " .
                            intval($idUser) . ", " .
                            intval($idPriority) . ", " .
                            intval($idDifficulty) . ")";
    
        $UpdateResult = mysqli_query($Connection, $UpdateTicketSQL);
        if (!$UpdateResult) {
            return False;
        }
        return True;
    }

    function InsertComment($idComment, $Date, $Content, $idTicket) 
    {
        $Connection = $this->Connection;
        $InsertCommentSQL = "CALL sp_InsertComment(" .
                            intval($idComment) . ", " .
                            "'" . mysqli_real_escape_string($Connection, $Date) . "', " .
                            "'" . mysqli_real_escape_string($Connection, $Content) . "', " .
                            intval($idTicket) . ")";
    
        $CommentResult = mysqli_query($Connection, $InsertCommentSQL);
        if (!$CommentResult) {
            return False;
        }
        return True;
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
