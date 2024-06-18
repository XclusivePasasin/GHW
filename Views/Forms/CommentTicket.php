<?php
$Include = require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
include_once 'C:\xampp\htdocs\GHW-PROJECT\Controllers\Users-Controller.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';

$Connection = new MySQL();
$ConnectionMYSQL = $Connection->ConnectionMySQL();

$ID_Ticket = $_GET["id"];

if ($ConnectionMYSQL)
{
    $SelectComments = "SELECT * FROM CommentView WHERE ID_Ticket = $ID_Ticket";
    $Comments = mysqli_query($ConnectionMYSQL, $SelectComments);
}

if (isset($_SESSION['Message']) && !empty($_SESSION['Message']) && isset($_SESSION['MessageType']) && !empty($_SESSION['MessageType'])) {
    if ($_SESSION['MessageType'] == 'success') {
        echo '<div class="alert alert-aquamarine alert-border-left alert-close alert-dismissible fade in" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">×</span>';
        echo '</button>';
        echo '<strong>Heads Up!</strong> ' . $_SESSION['Message'];
        echo '</div>';
        
    } elseif ($_SESSION['MessageType'] == 'error') {
        echo '<div class="alert alert-warning alert-border-left alert-close alert-dismissible fade in" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">×</span>';
        echo '</button>';
        echo '<strong>Error!</strong> ' . $_SESSION['Message'];
        echo '</div>';
    }
    unset($_SESSION['Message']);
    unset($_SESSION['MessageType']);
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if(isset($_SESSION['Email'])) 
{     
    $Email = $_SESSION['Email'];
}
else 
{
    header("Location: " . Connection::Route() . "../index.php");     
    exit(); 
}

?>

<!DOCTYPE html>
<html>

<head lang="es">
    <!--Import MainHead-->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainHead.php'; ?>
</head>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        .container-fluid {
            padding: 20px;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .box-typical {
            padding: 20px;
            background-color: #fff;
        }
    </style>
<body>
<header class="section-header">
    <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>COMMENT TICKET</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Tickets</a></li>
                        <li class="active">Comment Ticket</li>
                    </ol>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <section class="box-typical">
            <div class="table-responsive">
                <div class="bootstrap-table">
                    <div class="fixed-table-toolbar">
                        <div class="bars pull-left">
                            <div id="toolbar">
                                <div class="bootstrap-table-header" style = "vertical-align: middle;">COMMENTS</div>
                            </div>
                        </div>
                    </div>
                    <div class="fixed-table-container" style="padding-bottom: 0px;">
                        <div class="fixed-table-header" style="display: none;">
                            <table></table>
                        </div>
                        <div class="fixed-table-body">
                            <div class="fixed-table-loading" style="top: 88px;"></div>
                            <table id="table" class="table table-striped table-hover" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-show-export="true" data-detail-view="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]" data-show-footer="false" data-response-handler="responseHandler">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; " data-field="" tabindex="0">
                                            <div class="th-inner sortable both">EMPLOYEE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="" tabindex="0">
                                            <div class="th-inner sortable both">EMAIL</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="" tabindex="0">
                                            <div class="th-inner sortable both">DEPARTMENT</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center;" rowspan="2" data-field="id" tabindex="0">
                                            <div class="th-inner sortable both">CONTENT</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="" tabindex="0">
                                            <div class="th-inner sortable both">DATE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                            <tbody>
                            <?php while ($AllComments = $Comments->fetch_object()) { ?>
                                    <tr>
                                        <td style="text-align: center; ">
                                            <?php echo ($AllComments->Name . " " . $AllComments->Lastname) ?>
                                        </td>
                                        <td style="text-align: center; vertical-align: middle; ">
                                            <?php echo $Email ?>
                                        </td>
                                        <td style="text-align: center; ">
                                            <?php echo $AllComments->Department ?>
                                        </td>
                                        <td style="text-align: center; ">
                                            <?php echo $AllComments->Content ?>
                                        </td>
                                        <td style="text-align: center; ">
                                            <?php echo $AllComments->Date ?>
                                        </td>
                                    </tr>
                                    <?php }?>
                            </tbody>
                        </table>
                        </div>
                        <div class="fixed-table-footer" style="display: none;">
                            <table>
                                <tbody>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section><!--.box-typical-->
    </div>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>
</html>