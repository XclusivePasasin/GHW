<?php
require_once 'C:\xampp\htdocs\GHW-PROJECT\Config\Connection.php';
require_once 'C:\xampp\htdocs\GHW-PROJECT\Models\Tickets.php';
$Connection = new MySQL();
$ConnectionMYSQL = $Connection->ConnectionMySQL();
$TicketModel = new TicketCRUD();

$perPage = 10;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $perPage;

if ($ConnectionMYSQL)
{
    $SelectTicketsSQL10 = "SELECT * FROM TicketStatusView";
    $Tickets10 = mysqli_query($ConnectionMYSQL, $SelectTicketsSQL10);
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
                    <h3>VIEW TICKET</h3>
                    <ol class="breadcrumb breadcrumb-simple">
                        <li><a href="#">CodeLab</a></li>
                        <li><a href="#">Tickets</a></li>
                        <li class="active">View Ticket</li>
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
                                <div class="bootstrap-table-header">ALL TICKETS</div>
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
                                        <th style="text-align: center; " data-field="price" tabindex="0">
                                            <div class="th-inner sortable both">EMAIL</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="price" tabindex="0">
                                            <div class="th-inner sortable both">DEPARTMENT</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="price" tabindex="0">
                                            <div class="th-inner sortable both">TITLE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="name" tabindex="0">
                                            <div class="th-inner sortable both">STATUS</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="name" tabindex="0">
                                            <div class="th-inner sortable both">PRIORITY</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="operate" tabindex="0">
                                            <div class="th-inner ">CREATE DATE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="operate" tabindex="0">
                                            <div class="th-inner ">UPDATE DATE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php while ($InfoTickets10 = $Tickets10->fetch_object()) { ?>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle; ">
                                            <?php echo $InfoTickets10->Email ?>
                                        </td>
                                        <td style="text-align: center; ">
                                                <?php echo $InfoTickets10->Department ?>
                                        </td>
                                        <td style="text-align: center; ">
                                                <?php echo $InfoTickets10->Title ?>
                                        </td>
                                        <td style="text-align: center; ">
                                        <?php if ($InfoTickets10->TicketStatus == "Open") { ?>
                                            <button class="btn btn-success" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                            <?php echo $InfoTickets10->TicketStatus; ?>
                                            </button>
                                            <?php } else if ($InfoTickets10->TicketStatus == "In Progress") { ?>
                                            <button class="btn btn-warning" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                            <?php echo $InfoTickets10->TicketStatus; ?>
                                            </button>
                                            <?php } else if ($InfoTickets10->TicketStatus == "Closed") { ?>
                                            <button class="btn btn-danger" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                            <?php echo $InfoTickets10->TicketStatus; ?>
                                            </button>
                                        <?php } ?>
                                        </td>
                                        <td style="text-align: center; ">
                                        <?php if ($InfoTickets10->ID_Priority == 1) { ?>
                                            <button class="btn btn-primary" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                                Low
                                            </button>
                                            <?php } else if ($InfoTickets10->ID_Priority == 2) { ?>
                                            <button class="btn btn-success" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                                Medium
                                            </button>
                                            <?php } else if ($InfoTickets10->ID_Priority == 3) { ?>
                                            <button class="btn btn-warning" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                                High
                                            </button>
                                            <?php } else if ($InfoTickets10->ID_Priority == 4) { ?>
                                            <button class="btn btn-danger" type="button" aria-haspopup="true" aria-expanded="false" style="width: 110px; font-size:15px; ;">
                                                Critical
                                            </button>
                                        <?php } ?>
                                        </td>
                                        <td style="text-align: center; ">
                                            <?php echo $InfoTickets10->CreateDate ?>
                                        </td>
                                        <td style="text-align: center; ">
                                            <?php echo $InfoTickets10->UpdateDate ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="EditTicket.php?id=<?php echo $InfoTickets10->ID_Ticket; ?>">
                                                <i class="fa fa-eye"></i>
                                            </a>                                               
                                            <a class="like" href="CommentTicket.php?id=<?php echo $InfoTickets10->ID_Ticket; ?>" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                                <ul class="pagination">
                                    <li class="page-pre"><a href="javascript:void(0)"><i class="font-icon font-icon-arrow-left"></i></a></li>
                                    <li class="page-next"><a href="javascript:void(0)"><i class="font-icon font-icon-arrow-right"></i></a></li>
                                </ul>
                            </div>
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