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
                        <div class="columns columns-right btn-group pull-right">
                            <button class="btn btn-default" type="button" name="paginationSwitch" title="Hide/Show pagination">
                                <i class="font-icon font-icon-arrow-square-down"></i>
                            </button>
                            <button class="btn btn-default" type="button" name="refresh" title="Refresh">
                                <i class="font-icon font-icon-refresh"></i>
                            </button>
                            <button class="btn btn-default" type="button" name="toggle" title="Toggle">
                                <i class="font-icon font-icon-list-square"></i>
                            </button>
                            <div class="keep-open btn-group" title="Columns">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <i class="font-icon font-icon-list-rotate"></i>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu">

                                    <li><span class="checkbox
                                    "><input id="datatable-columns-checkbox-2" type="checkbox" data-field="name" value="2" checked="checked"> <label for="datatable-columns-checkbox-2">Status</label></span></li>
                                    <li><span class="checkbox"><input id="datatable-columns-checkbox-3" type="checkbox" data-field="price" value="3" checked="checked"> <label for="datatable-columns-checkbox-3">Item Price</label></span></li>
                                    <li><span class="checkbox"><input id="datatable-columns-checkbox-4" type="checkbox" data-field="operate" value="4" checked="checked"> <label for="datatable-columns-checkbox-4">Item Operate</label></span></li>
                                </ul>
                            </div>
                            <div class="export btn-group"><button class="btn btn-default dropdown-toggle" data-toggle="dropdown" type="button"><i class="font-icon font-icon-download"></i> <span class="caret"></span></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li data-type="json"><a href="javascript:void(0)">JSON</a></li>
                                    <li data-type="xml"><a href="javascript:void(0)">XML</a></li>
                                    <li data-type="csv"><a href="javascript:void(0)">CSV</a></li>
                                    <li data-type="txt"><a href="javascript:void(0)">TXT</a></li>
                                    <li data-type="sql"><a href="javascript:void(0)">SQL</a></li>
                                    <li data-type="excel"><a href="javascript:void(0)">MS-Excel</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pull-right search"><input class="form-control" type="text" placeholder="Search"></div>
                    </div>
                    <div class="fixed-table-container" style="padding-bottom: 0px;">
                        <div class="fixed-table-header" style="display: none;">
                            <table></table>
                        </div>
                        <div class="fixed-table-body">
                            <div class="fixed-table-loading" style="top: 88px;">Loading, please wait...</div>
                            <table id="table" class="table table-striped table-hover" data-toolbar="#toolbar" data-search="true" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-show-export="true" data-detail-view="true" data-detail-formatter="detailFormatter" data-minimum-count-columns="2" data-show-pagination-switch="true" data-pagination="true" data-id-field="id" data-page-list="[10, 25, 50, 100, ALL]" data-show-footer="false" data-response-handler="responseHandler">
                                <thead>
                                    <tr>
                                        <th style="text-align: center; vertical-align: middle; " rowspan="2" data-field="id" tabindex="0">
                                            <div class="th-inner sortable both">TICEKT ID</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center; " data-field="name" tabindex="0">
                                            <div class="th-inner sortable both">STATUS</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="price" tabindex="0">
                                            <div class="th-inner sortable both">TITLE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                        <th style="text-align: center; " data-field="operate" tabindex="0">
                                            <div class="th-inner ">OPERATE</div>
                                            <div class="fht-cell"></div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr data-index="0">
                                        <td style="text-align: center; vertical-align: middle; ">0</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status  "><button class="btn btn-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Draft</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <tr data-index="1">

                                        <td style="text-align: center; vertical-align: middle; ">1</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status  "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="2">

                                        <td style="text-align: center; vertical-align: middle; ">2</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status  "><button class="btn btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Moderation</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                            <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="3">

                                        <td style="text-align: center; vertical-align: middle; ">3</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status  "><button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Published</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="4">

                                        <td style="text-align: center; vertical-align: middle; ">4</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status  "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="5">

                                        <td style="text-align: center; vertical-align: middle; ">4</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status dropup "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="6">

                                        <td style="text-align: center; vertical-align: middle; ">4</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status dropup "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="7">

                                        <td style="text-align: center; vertical-align: middle; ">4</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status dropup "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="8">

                                        <td style="text-align: center; vertical-align: middle; ">4</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status dropup "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr data-index="9">

                                        <td style="text-align: center; vertical-align: middle; ">4</td>
                                        <td style="text-align: center; ">
                                            <div class="dropdown dropdown-status dropup "><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pending</button>
                                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Draft</a><a class="dropdown-item" href="#">Pending</a><a class="dropdown-item" href="#">Moderation</a><a class="dropdown-item" href="#">Published</a>
                                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td style="text-align: center; ">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                            </td>
                                        </td>
                                        <td style="text-align: center;">
                                            <a class="like" href="javascript:void(0)" title=view">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a class="like" href="javascript:void(0)" title="coment">
                                                <i class="fa fa-comment"></i>
                                            </a>
                                        </td>
                                    </tr>
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
                        <div class="fixed-table-pagination">
                            <div class="pull-left pagination-detail"><span class="pagination-info">Showing 1 to 10 of 22 rows</span><span class="page-list"><span class="btn-group dropup"><button type="button" class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><span class="page-size">10</span> <span class="caret"></span></button>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="active"><a href="javascript:void(0)">10</a></li>
                                            <li><a href="javascript:void(0)">25</a></li>
                                        </ul>
                                    </span> records per page</span></div>
                            <div class="pull-right pagination">
                                <ul class="pagination">
                                    <li class="page-pre"><a href="javascript:void(0)"><i class="font-icon font-icon-arrow-left"></i></a></li>
                                    <li class="page-number active"><a href="javascript:void(0)">1</a></li>
                                    <li class="page-number"><a href="javascript:void(0)">2</a></li>
                                    <li class="page-number"><a href="javascript:void(0)">3</a></li>
                                    <li class="page-next"><a href="javascript:void(0)"><i class="font-icon font-icon-arrow-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </section><!--.box-typical-->


        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/GHW-PROJECT/Views/Moduls/Head/MainJS.php'; ?>
</body>

</html>