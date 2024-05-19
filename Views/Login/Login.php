<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <section >
        <div class="row no-gutters full-height" style="height:100vh;">
            <div class="col-lg-7 test d-none d-lg-block no-padding">
                <img src="./src/Login-picture.svg" alt="Img" class="w-100 h-100">
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-end min-vh-100" style="height: 100vh;">
                <div class="px-lg-5 pt-lg-4 pb-lg-1 p-4 w-100">
                    <img src="./src/Logo-5-Login.svg" alt="Logo-5" class="img-fluid" style="width: 340px;">
                </div>
                <div class="px-lg-5 py-lg-4 p-4 w-100 align-selft-center justify-content-around align-items-center">
                    <h1>Welcome to CodeLabs</h1>
                    <form>
                        <div class="mb-4">
                            <label for="User" class="form-label font-weight-bold">Username</label>
                            <input type="text" class="form-control bg-dark-x font-weight-bold" id="User" name="User" placeholder="Enter your username">
                        </div>
                        <div class="mb-4">
                            <label for="Passwd" class="form-label font-weight-bold">Password</label>
                            <input type="password" class="form-control bg-dark-x font-weight-bold mb-2" id="Passwd" name="Passwd" placeholder="Enter your password">
                        </div>
                        <a href="#" class="form-text text-decoration-none mb-3 text-white">Have you forgotten your password?</a>
                        <button type="submit" class="btn text-white w-100 btn-dark-x font-weight-bold">
                            <i class="fa-solid fa-right-to-bracket lead mr-3" style="color: #ffffff;"></i>Log in
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT6T9g6a4H6oYnxoB1p+Lr9s8on4ylFEYNr6D5K4h4eVOmYdX" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js" integrity="sha384-qGtX+DxFxRk8ZAYq8FyWZ/HtQyWVvVV2wKbvxdRLxwCCV1+8Y7XcZUc8IH2wZXmF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-oSWTY3wyyjtk2MMndmJbG2BB/qqoK9fUjMAeJ5saI1NYYon8PKi2Upf4lxrA+jTq" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/15cf58a385.js" crossorigin="anonymous"></script>
</body>

</html>
