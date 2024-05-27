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
                                    <input type="text" class="form-control" id="" placeholder="Text">                                
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="signup_v1-user">User</label>
                                <div class="form-control-wrapper">
                                    <input type="text" class="form-control" id="" placeholder="Text">    
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="signup_v1-description">Description</label>
                                <div class="col-sm-16">
                                     <textarea rows="4" class="form-control" placeholder="Textarea"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="signup_v1-categoryl">Category</label>
                                <select id="exampleSelect" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn">Sign up!</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <form id="form-signup_v2" name="form-signup_v2" method="POST">
                            <div class="form-group">
                                <label class="form-label" for="signup_v2-name">Nª Ticekt</label>
                                <div class="form-control-wrapper">
                                    <input id="signup_v2-name" class="form-control" name="signup_v2[name]" type="text" data-validation="[OPTIONAL, NAME, L>=2, TRIM]">
                                </div>
                            </div>
                            <div class="form-group form-group-radios">
                                <label class="form-label" id="signup_v2-gender">
                                    Gender <span class="color-red">*</span>
                                </label>
                                <div class="radio">
                                    <input id="signup_v2-gender-male" name="signup_v2[gender]" data-validation="[NOTEMPTY]" data-validation-group="signup_v2-gender" data-validation-message="You must select a gender" type="radio" value="male">
                                    <label for="signup_v2-gender-male">Male</label>
                                </div>
                                <div class="radio">
                                    <input id="signup_v2-gender-female" name="signup_v2[gender]" data-validation-group="signup_v2-gender" type="radio" value="female">
                                    <label for="signup_v2-gender-female">Female</label>
                                </div>
                                <div class="radio">
                                    <input id="signup_v2-gender-other" name="signup_v2[gender]" data-validation-group="signup_v2-gender" type="radio" value="other">
                                    <label for="signup_v2-gender-other">Other</label>
                                </div>
                            </div>
                            <div class="form-group form-group-checkbox">
                                <div class="checkbox">
                                    <input id="signup_v2-agree" name="signup_v2[agree]" data-validation="[NOTEMPTY]" data-validation-message="You must agree the terms and conditions" type="checkbox">
                                    <label for="signup_v2-agree">I agree the <a href="#">terms</a> and <a href="#">conditions</a></label>
                                </div>
                            </div>
                            <button type="submit" class="btn">Sign up!</button>
                        </form>
                    </div>
                </div><!--.row-->
            </div>
        </section>
		<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>
</html>