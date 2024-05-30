<?php

    class User extends Connection{

        //function Login
        public function Login(){
            $Connection = parent::ConnectionPDO();
            parent::Set_Names();
            if (isset($_POST["Send"])) {
                $Email = $_POST['Email'];
                $Passwd = $_POST['Passwd'];
                if (empty($Email) or empty($Passwd)) {
                    header("location:". Connection::Route()."index.php?m=2"); // Campos Vacios
                    exit();
                }else{
                    $SqlValidation = "SELECT * FROM user WHERE Email=:Email AND UserPassword=:Passwd";
                    $Stmt = $Connection->prepare($SqlValidation);
                    $Stmt->bindParam(':Email', $Email);
                    $Stmt->bindParam(':Passwd', $Passwd);
                    $Stmt->execute();
    
                    $Result = $Stmt->fetch();
    
                    if (is_array($Result) and count($Result)>0) {
                        $_SESSION['Id_User'] = $Result['ID_User'];
                        $_SESSION['Email'] = $Result['Email'];
                        $_SESSION['Id_Employee'] = $Result['ID_Employee'];
                        header("Location: " . Connection::Route() . "./Views/Moduls/Dashboard.php");
                        exit();
                    } else {
                        header("Location: " . Connection::Route() . "./index.php?m=1"); // Campos Incorrectos 
                        exit();
                    }
                }
            }
        }
    }




?>