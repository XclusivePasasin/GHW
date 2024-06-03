<?php
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
$Connection = new Connection();
?>

<!DOCTYPE html>
<html>

<head lang="es">
    <!--Import MainHead-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainHead.php'; ?>
    <style>
    .card {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 75%;
    }
</style>
</head>

<body>
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>User Management</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Users</a></li>
                        <li class="active">User Management</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
        <div class="card-block">
                    <form id="form-signin_v1" name="form-signin_v1" method="POST">
                            <h4>Access credentials</h4>
                            <fieldset class="form-group">
                                <label class="form-label">ID</label>
                                <input type="number" class="form-control" readonly="" value="1" id="IdUser">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Email</label>
                                <input name="Email" type="Email" class="form-control" placeholder="@codelab.sv">
                            </fieldset>
                            <fieldset class="form-group">
                                <label class="form-label">Password:</label>
                                <input name="Password" type="Password" class="form-control" placeholder="Example: Codelabs" maxlength="10">
                            </fieldset>   
                                <fieldset class="form-group">
                                    <button type="submit" class="btn">Login</button>
                                </fieldset>
                    </form>
            </div>
    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>