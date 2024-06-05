<?php


    class User extends Connection{

        public function __construct() {
            $this->dbh = $this->ConnectionPDO(); 
            $this->Set_Names();     
        }
        // private $Connection = parent::ConnectionPDO();
        //function Login
        public function Login(){
            $Connection = $this->dbh;
            if (isset($_POST["Send"])) {
                $Email = $_POST['Email'];
                $Passwd = $_POST['Passwd'];
                // $Passwd = md5($_POST['Passwd']); // Encryption
                if (empty($Email) or empty($Passwd)) {
                    header("location:". Connection::Route()."index.php?m=2"); // Campos Vacios
                    exit();
                }else{
                    $SqlValidation = "SELECT * FROM User_Info WHERE Email=:Email AND Password=:Passwd";
                    $Stmt = $Connection->prepare($SqlValidation);
                    $Stmt->bindParam(':Email', $Email);
                    $Stmt->bindParam(':Passwd', $Passwd);
                    $Stmt->execute();
    
                    $Result = $Stmt->fetch();
    
                    if (is_array($Result) and count($Result)>0) {
                        $_SESSION['Id_User'] = $Result['ID_User'];
                        $_SESSION['Email'] = $Result['Email'];
                        $_SESSION['Name'] = $Result['Name'];
                        $_SESSION['LastName'] = $Result['Lastname'];
                        $_SESSION['Address'] = $Result['Address'];
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

    class UserCRUD extends MySQL{

        private $Connection;
        public function __construct() {
            $this->Connection = $this->ConnectionMySQL();
        }

        public function Register ($Email,$Passwd,$Rol,$FirstName,$LastName,$Address,$Phone,$Dui,$Department){
            $Connection = $this->Connection;
            $Model = new UserCRUD;
            $SqlRegisterEmployee = "INSERT INTO Employee (Name, Lastname, Phone, DUI, Address, ID_Rol, ID_Department) VALUES ('$FirstName', '$LastName', '$Phone', '$Dui', '$Address', $Rol, $Department);";
            $ResultRegister = mysqli_query($Connection, $SqlRegisterEmployee);
            if ($ResultRegister==True) {
                $ID_Employee = $Model->getID_Employee();
                $SqlRegisterUser = "INSERT INTO User (Email, UserPassword, ID_Employee) VALUES ('$Email', '$Passwd', $ID_Employee);";
                $ResultRegisterUser = mysqli_query($Connection, $SqlRegisterUser);
                if ($ResultRegisterUser==True) {
                    return True;
                }else{
                    return False;
                }
            }else{
                return False;
            }
        }

        public function getID_Employee(){
            $Connection = $this->Connection;
            $Sql = "SELECT ID_Employee FROM Employee ORDER BY ID_Employee DESC LIMIT 1";
            $SendData = mysqli_query($Connection, $Sql);
            $ResultID = $SendData->fetch_object();
            if($ResultID==True){
                return $ResultID->ID_Employee;
            }else{
                return null;
            }
        }
    }




?>