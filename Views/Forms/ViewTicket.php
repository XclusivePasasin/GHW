



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
<section class="box-typical box-typical-dashboard panel panel-default scrollable lobipanel lobipanel-sortable" data-inner-id="DLpwlFeFb4" data-index="0">
    <header class="box-typical-header panel-heading ui-sortable-handle">
        <h3 class="panel-title" style="max-width: calc(100% - 180px);">Recent tickets</h3>
        <div class="dropdown">
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a data-func="editTitle" data-tooltip="Edit title" data-toggle="tooltip" data-title="Edit title" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon glyphicon glyphicon-pencil"></i><span class="control-title">Edit title</span></a></li>
                <li><a data-func="unpin" data-tooltip="Unpin" data-toggle="tooltip" data-title="Unpin" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon glyphicon glyphicon-move"></i><span class="control-title">Unpin</span></a></li>
                <li><a data-func="reload" data-tooltip="Reload" data-toggle="tooltip" data-title="Reload" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon glyphicon glyphicon-refresh"></i><span class="control-title">Reload</span></a></li>
                <li><a data-func="minimize" data-tooltip="Minimize" data-toggle="tooltip" data-title="Minimize" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon glyphicon glyphicon-minus"></i><span class="control-title">Minimize</span></a></li>
                <li><a data-func="expand" data-tooltip="Fullscreen" data-toggle="tooltip" data-title="Fullscreen" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon glyphicon glyphicon-resize-full"></i><span class="control-title">Fullscreen</span></a></li>
                <li><a data-func="close" data-tooltip="Close" data-toggle="tooltip" data-title="Close" data-placement="bottom" data-original-title="" title=""><i class="panel-control-icon glyphicon glyphicon-remove"></i><span class="control-title">Close</span></a></li>
            </ul>
            <div class="dropdown-toggle" data-toggle="dropdown"><span class="panel-control-icon glyphicon glyphicon-cog"></span></div>
        </div>
    </header>
    <div class="box-typical-body panel-body jspScrollable" tabindex="0" style="overflow: hidden; padding: 0px; width: 393px;">

        <div class="jspContainer" style="width: 393px; height: 264px;">
            <div class="jspPane" style="padding: 0px; top: -50px; left: 0px; width: 393px;">
                <table class="tbl-typical">
                    <tbody>
                        <tr>
                            <th>
                                <div>Status</div>
                            </th>
                            <th>
                                <div>Subject</div>
                            </th>
                            <th align="center">
                                <div>Department</div>
                            </th>
                            <th align="center">
                                <div>Date</div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <span class="label label-success">Open</span>
                            </td>
                            <td>Website down for one week</td>
                            <td align="center">Support</td>
                            <td nowrap="" align="center"><span class="semibold">Today</span> 8:30</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="label label-success">Open</span>
                            </td>
                            <td>Restoring default settings</td>
                            <td align="center">Support</td>
                            <td nowrap="" align="center"><span class="semibold">Today</span> 16:30</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="label label-warning">Progress</span>
                            </td>
                            <td>Loosing control on server</td>
                            <td align="center">Support</td>
                            <td nowrap="" align="center"><span class="semibold">Yesterday</span></td>
                        </tr>
                        <tr>
                            <td>
                                <span class="label label-danger">Closed</span>
                            </td>
                            <td>Authorizations keys</td>
                            <td align="center">Support</td>
                            <td nowrap="" align="center">23th May</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="jspVerticalBar">
                <div class="jspCap jspCapTop"></div>
                <div class="jspTrack" style="height: 256px;">
                    <div class="jspDrag" style="height: 184px; top: 35.2381px;">
                        <div class="jspDragTop"></div>
                        <div class="jspDragBottom"></div>
                    </div>
                </div>
                <div class="jspCap jspCapBottom"></div>
            </div>
            <div class="jspHorizontalBar">
                <div class="jspCap jspCapLeft"></div>
                <div class="jspTrack" style="width: 385px;">
                    <div class="jspDrag" style="width: 342px; left: 0px;">
                        <div class="jspDragLeft"></div>
                        <div class="jspDragRight"></div>
                    </div>
                </div>
                <div class="jspCap jspCapRight"></div>
                <div class="jspCorner" style="width: 8px;"></div>
            </div>
        </div>
    </div><!--.box-typical-body-->
</section>


    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>