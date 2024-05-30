<?php
    require_once './Config/Connection.php';
    if (isset($_POST["Send"]) and $_POST["Send"]=="Yes") {
        require_once ('./Models/Users.php');
        $User = new User();
        $User->Login();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <?php require_once './Views/Moduls/Head/HeadPage.php'; ?>
    <title>CodeLab</title>
</head>

<body class="bg-dark">

    <!--Styles-->
    <style>
        /*Source to use*/
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        :root {
            --dark: #16191c;
            --darkLight: #1e2126;
            --PurpleDark: #1B0140;
            --PurpleGrape: #6604F1;
            --PurpleLite: #B886FD;
            --Gray: #E7D8FB;
            --Pink: #FDE2FF;
            --white: #fff;
        }

        body {
            font-family: "Poppins", sans-serif;
            font-weight: 200;
            font-style: normal;
            color: white;
            height: 100vh;
        }

        .bg-dark {
            background-color: var(--PurpleGrape) !important;
        }

        .bg-dark-x {
            background-color: var(--white) !important;
            border-color: var(--PurpleDark) !important;
            border: 0;
        }

        .full-height {
            height: 100vh; /* Altura completa para todo el contenedor */
        }

        .btn-dark-x {
            background-color: var(--PurpleDark) !important;
        }

        .row {
            margin-right: 0;
            margin-left: 0;
        }

        .form-control,
        .btn {
            min-height: 3.125rem;
            line-height: initial;
        }

        .test {
            height: 100%; /* Para asegurar que cada elemento del carrusel ocupe todo el espacio */
        }

        .test img {
            object-fit: cover;
            height: 100%;
            width: 100%;
        }

    </style>

    <!--Login-->
    <section class="full-height">


        <div class="row no-gutters full-height" style="height:100vh;">
            <div class="col-lg-7 test d-none d-lg-block no-padding">
                <img src="http://localhost/GHW-PROJECT/Public/img/Login-picture.svg" alt="Img" class="w-100 h-100">
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100" style="height: 100vh;">
                <div class="px-lg-5 pt-lg-4 pb-lg-1 p-4 w-100">
                    <img src="http://localhost/GHW-PROJECT/Public/img/Login-Icon.svg" alt="Logo-5" class="img-fluid" style="width: 100px;">
                </div>
                <div class="px-lg-5 py-lg-4 p-4 w-100 align-selft-center justify-content-around align-items-center">
                    <h1>Welcome to CodeLabs</h1>
                    <!-- Container for the alert -->
                    <div id="alertContainer">
                        <?php
                        if (isset($_GET["m"])) {
                            switch ($_GET["m"]) {
                                case '1':
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error:</strong> Invalid access credentials.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                    break;
                                
                                case '2':
                                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error:</strong> The fields are empty.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>';
                                    break;
                            }
                        }
                        ?>
                    </div>

                    <form action="" method="POST" id="Login" >
                        <div class="mb-4">
                            <label for="Email" class="form-label font-weight-bold">Email</label>
                            <input type="email" class="form-control bg-dark-x font-weight-bold" id="Email" name="Email" placeholder="Enter your email">
                        </div>
                        <div class="mb-4">
                            <label for="Passwd" class="form-label font-weight-bold">Password</label>
                            <input type="password" class="form-control bg-dark-x font-weight-bold mb-2" id="Passwd" name="Passwd" placeholder="Enter your password">
                        </div>
                        <a href="#" class="form-text text-decoration-none mb-3 text-white">Have you forgotten your password?</a>
                        <input type="hidden" name="Send" value="Yes">
                        <button type="submit" class="btn text-white w-100 btn-dark-x font-weight-bold">
                            <i class="fa-solid fa-right-to-bracket lead mr-3" style="color: #ffffff;"></i>Log in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
