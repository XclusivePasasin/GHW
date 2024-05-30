<?php
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
$Connection = new Connection();
?>

<!DOCTYPE html>
<html>

<head lang="es">
    <!--Import MainHead-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainHead.php'; ?>
</head>

<body>
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>NEW TICKET</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Tickets</a></li>
                        <li class="active">New Ticket</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
        <div class="card-block">
            <div class="row m-t-lg">
                <div class="col-md-6">
                    <form id="form-signup_v1" name="form-signup_v1" method="POST">
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-title">Title</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" placeholder="Subject..." required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-user">User</label>
                            <div class="form-control-wrapper">
                                <input type="text" class="form-control" id="" placeholder="Example: Elena Gomez" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-description">Description</label>
                            <div class="col-sm-16">
                                <textarea rows="8" class="form-control" placeholder="Description of problem" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="signup_v1-category">Category</label>
                            <select id="category" class="form-control" required>
                                <option hidden>Select category</option>
                                <option value=""></option>
                            </select>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">Nª Ticekt</label>
                        <div class="form-control-wrapper">
                            <input type="number" class="form-control" id="" placeholder="Nª Ticekt" disabled required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v2-name">Email</label>
                        <div class="form-control-wrapper">
                            <input name="Email" type="Email" class="form-control" placeholder="@codelab.sv" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-problems">Problems</label>
                        <select id="problems" class="form-control" required>
                            <option hidden>Select Problems</option>
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="signup_v1-priority">Priority</label>
                        <select id="priority" class="form-control" required>
                            <option hidden>Select Priority</option>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <center>
                        <div class="form-group">
                            <button type="submit" class="btn">Submit ticket</button>
                        </div>
                    </center>
                </div>
            </form>
            </div>
        </div><!--.row-->
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>