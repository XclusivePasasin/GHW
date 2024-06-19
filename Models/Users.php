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
                $Passwd = base64_encode($_POST['Passwd']); // Encryption
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
                        $_SESSION['Access'] = $Result['Rol'];
                        header("Location: " . Connection::Route() . "./Views/Moduls/Dashboard.php");
                        exit();
                    } else {
                        header("Location: " . Connection::Route() . "./index.php?m=1"); // Campos Incorrectos 
                        exit();
                    }
                }
            }
        }

        function ValidateDUI()
        {
            $Connection = $this->dbh;
            if (isset($_POST["Send"])) {
                $Dui = $_POST['Dui'];
                if (empty($Dui)) {
                    header("location:" . Connection::Route() . "Views/Forms/ValidateDUI.php?m=2");
                    exit();
                }else{
                    $sql = "SELECT * FROM User_Info WHERE DUI = :Dui";
                    $stmt = $Connection->prepare($sql);
                    $stmt->bindParam(":Dui", $Dui, PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                    if (count($result) > 0) {
                        header("location: " . self::Route() . "Views/Forms/ResetPassword.php?Dui=$Dui");
                        exit();
                    } else {
                        header("location: " . self::Route() . "Views/Forms/ValidateDUI.php?m=4");
                        exit(); 
                    }
        
                    $stmt->closeCursor(); 
                }
            }
        }
    
        function ResetPassword(){
            $Connection = $this->dbh;
            if (isset($_POST["Send"])) {
                $Dui = $_POST['Dui'];
                $NewPassword = $_POST['NewPassword'];
                $RepeatPassword = $_POST['RepeatPassword'];
                if (empty($NewPassword) || empty($RepeatPassword)) {
                    header("location:" . Connection::Route() . "Views/Forms/ResetPassword.php?m=2&Dui=$Dui");
                    exit();
                }else if($NewPassword !== $RepeatPassword){
                    header("location:" . Connection::Route() . "Views/Forms/ResetPassword.php?m=4&Dui=$Dui");
                    exit();
                }else{
                    $Employee = $this->getEmployeeDUI($Dui);
                    if ($Employee) {
                        $ID_Employee = $Employee['ID_Employee'];
                        $sql = "UPDATE User SET UserPassword = :UserPassword WHERE ID_Employee = :ID_Employee";
                        $stmt = $Connection->prepare($sql);
                        $hashedPassword = base64_encode($NewPassword);
                        $stmt->bindParam(':UserPassword', $hashedPassword);
                        $stmt->bindParam(':ID_Employee', $ID_Employee);
                        $stmt->execute();
                        if($stmt->execute()){
                            header("location:" . Connection::Route() . "index.php?m=6");
                            exit();
                        }else{
                            header("location:" . Connection::Route() . "index.php?m=5");
                            exit();
                        }
                    }
                }
            }
        }
    
        function getEmployeeDUI($Dui){
            $Connection = $this->dbh;
            $Sql = "SELECT ID_Employee FROM Employee WHERE DUI = :Dui";
            $stmt = $Connection->prepare($Sql);
            $stmt->bindParam(':Dui', $Dui);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result ? $result : false; 
        }

    }
    

    class UserCRUD extends MySQL{

        private $Connection;
        public function __construct() {
            $this->Connection = $this->ConnectionMySQL();
        }

        public function Register ($Email,$Passwd,$Rol,$FirstName,$LastName,$Address,$Phone,$Dui,$Department)
        {
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
//Funcion para editar
        public function Update($idEmployee, $FirstName, $LastName, $Phone, $Dui, $Address, $Rol, $Department, $idUser, $email, $Passwd)
        {
            $Connection = $this->Connection;
            $UpdateEmployeeSQL = "CALL sp_UpdateUser(" .
                                mysqli_real_escape_string($Connection, $idEmployee) . ", '" .
                                mysqli_real_escape_string($Connection, $FirstName) . "', '" .
                                mysqli_real_escape_string($Connection, $LastName) . "', '" .
                                mysqli_real_escape_string($Connection, $Phone) . "', '" .
                                mysqli_real_escape_string($Connection, $Dui) . "', '" .
                                mysqli_real_escape_string($Connection, $Address) . "', " .
                                mysqli_real_escape_string($Connection, $Rol) . ", " .
                                mysqli_real_escape_string($Connection, $Department) . ", " .
                                mysqli_real_escape_string($Connection, $idUser) . ", '" .
                                mysqli_real_escape_string($Connection, $email) . "', '" .
                                mysqli_real_escape_string($Connection, $Passwd) . "')";
            $UpdateResult = mysqli_query($Connection, $UpdateEmployeeSQL);
            return True;
            if (!$UpdateResult) {
                return False;
            }
        }
//Funcion para eliminar
        public function Delete($id)
        {
            if (is_null($id) || !is_numeric($id)) {
                die("Error: ID de usuario no puede ser NULL o no numérico");
            }
        
            $Connection = $this->Connection;
            $idUser = intval($id);
        
            $DeleteEmployee = "DELETE FROM employee WHERE ID_Employee = $idUser";
            $DeleteEmployeeResult = mysqli_query($Connection, $DeleteEmployee);
            if (!$DeleteEmployeeResult) {
                die("Error al eliminar empleado: " . mysqli_error($Connection));
            }
        
            $DeleteUser = "DELETE FROM user WHERE ID_User = $idUser";
            $DeleteUserResult = mysqli_query($Connection, $DeleteUser);
            if (!$DeleteUserResult) {
                die("Error al eliminar usuario: " . mysqli_error($Connection));
            }
        }

        public function Validate($Dui, $Email){
            $Connection = $this->Connection;
            $Sql = "SELECT * FROM Employee WHERE DUI = '$Dui'";
            $SqlEmail = "SELECT * FROM User WHERE Email = '$Email'"; 
            $SendEmail = mysqli_query($Connection, $SqlEmail);
            $Send = mysqli_query($Connection, $Sql);
            if($Send->num_rows > 0 || $SendEmail->num_rows > 0){
                return False;
            }else{
                return True;
            }
        }

    }

    




?>