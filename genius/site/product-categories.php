<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?php echo $site_dir;?>/images/favicon.png">

    <title>Product Categories<?php echo " ‹ ".$site_title;?></title>

    <!--Core CSS -->
    <link href="<?php echo $site_dir;?>/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/bootstrap-reset.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="<?php echo $site_dir;?>/css/style.css" rel="stylesheet">
    <link href="<?php echo $site_dir;?>/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="<?php echo $site_dir;?>/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<?php 
include "header.php";
include "sidebar.php";
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Editable Table
                        <span class="tools pull-right">
                            <a href="<?php echo $site_dir;?>/javascript:;" class="fa fa-chevron-down"></a>
                            <a href="<?php echo $site_dir;?>/javascript:;" class="fa fa-cog"></a>
                            <a href="<?php echo $site_dir;?>/javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <button id="editable-sample_new" class="btn btn-primary">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?php echo $site_dir;?>/#">Print</a></li>
                                        <li><a href="<?php echo $site_dir;?>/#">Save as PDF</a></li>
                                        <li><a href="<?php echo $site_dir;?>/#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Count Product</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php
								$category_query=mysql_query('SELECT * FROM product_category ORDER BY product_category_name ASC');
								while($category=mysql_fetch_array($category_query)){
								$category_id=$category['product_category_id'];
								?>
                                <tr class="">
                                    <td><?php echo $category['product_category_name'];?></td>
                                    <td><?php echo mysql_result(mysql_query("SELECT COUNT(product_category_id) FROM product_category WHERE product_category_id=$category_id"),0);?></td>
                                    <td><a class="edit" href="javascript:;">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <?php
								}
								?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->
        </section>
    </section>
    <!--main content end-->
<?php include "sidebar_right.php";?>

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="<?php echo $site_dir;?>/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery-migrate.js"></script>

<script src="<?php echo $site_dir;?>/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo $site_dir;?>/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo $site_dir;?>/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="<?php echo $site_dir;?>/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="<?php echo $site_dir;?>/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="<?php echo $site_dir;?>/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.resize.js"></script>
<script src="<?php echo $site_dir;?>/js/flot-chart/jquery.flot.pie.resize.js"></script>

<script type="text/javascript" src="<?php echo $site_dir;?>/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo $site_dir;?>/js/data-tables/DT_bootstrap.js"></script>

<!--common script init for all pages-->
<script src="<?php echo $site_dir;?>/js/scripts.js"></script>

<!--script for this page only-->
<script>
var EditableTable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="form-control small" value="' + aData[0] + '">';
                jqTds[2].innerHTML = '<a class="edit" href="">Save</a>';
                jqTds[3].innerHTML = '<a class="cancel" href="">Cancel</a>';
            }

            function saveRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 5, false);
                oTable.fnDraw();
            }

            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
                oTable.fnDraw();
            }

            var oTable = $('#editable-sample').dataTable({
                "aLengthMenu": [
                    [10, 15, 20, -1],
                    [10, 15, 20, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-6'i><'col-lg-6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

            jQuery('#editable-sample_wrapper .dataTables_filter input').addClass("form-control medium"); // modify table search input
            jQuery('#editable-sample_wrapper .dataTables_length select').addClass("form-control xsmall"); // modify table per page dropdown

            var nEditing = null;

            $('#editable-sample_new').click(function (e) {
                e.preventDefault();
                var aiNew = oTable.fnAddData(['', '', '', '',
                        '<a class="edit" href="">Edit</a>', '<a class="cancel" data-mode="new" href="">Cancel</a>'
                ]);
                var nRow = oTable.fnGetNodes(aiNew[0]);
                editRow(oTable, nRow);
                nEditing = nRow;
            });

            $('#editable-sample a.delete').live('click', function (e) {
                e.preventDefault();

                if (confirm("Are you sure to delete this row ?") == false) {
                    return;
                }

                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
                alert("Deleted! Do not forget to do some ajax to sync with backend :)");
            });

            $('#editable-sample a.cancel').live('click', function (e) {
                e.preventDefault();
                if ($(this).attr("data-mode") == "new") {
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else {
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
            });

            $('#editable-sample a.edit').live('click', function (e) {
                e.preventDefault();

                /* Get the row as a parent of the link that was clicked on */
                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) {
                    /* Currently editing - but not this row - restore the old before continuing to edit mode */
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
                } else if (nEditing == nRow && this.innerHTML == "Save") {
                    /* Editing this row and want to save it */
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    alert("Updated! Do not forget to do some ajax to sync with backend :)");
                } else {
                    /* No edit in progress - let's start one */
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
        }

    };

}();
</script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

</body>
</html>
