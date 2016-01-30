<!DOCTYPE html>
<html>
  <head>
    <title>
      J-System
    </title>
    <link rel="shortcut icon" href="<?=$dir;?>/images/jSystem-icon.png" />
	<link href="@pages/stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/hightop-font.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/select2.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/morris.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/bootstrap-editable.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/ladda-themeless.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/social-buttons.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/jquery.fileupload-ui.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/dropzone.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/nestable.css" media="screen" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/style.css" media="all" rel="stylesheet" type="text/css" />
	<link href="@pages/stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme" type="text/css" />
	<link href="@pages/stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme" type="text/css" />
	<link href="@pages/stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme" type="text/css" />
	<link href="@pages/stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" type="text/javascript"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/raphael.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/selectivizr-min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.mousewheel.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.vmap.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.vmap.world.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
	<script src="@pages/javascripts/fullcalendar.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/gcal.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/datatable-editable.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
	<script src="@pages/javascripts/excanvas.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.isotope.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/isotope_extras.js" type="text/javascript"></script>
	<script src="@pages/javascripts/modernizr.custom.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
	<script src="@pages/javascripts/select2.js" type="text/javascript"></script>
	<script src="@pages/javascripts/styleswitcher.js" type="text/javascript"></script>
	<script src="@pages/javascripts/wysiwyg.js" type="text/javascript"></script>
	<script src="@pages/javascripts/typeahead.js" type="text/javascript"></script>
	<script src="@pages/javascripts/summernote.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.validate.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/typeahead.js" type="text/javascript"></script>
	<script src="@pages/javascripts/spin.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/ladda.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/moment.js" type="text/javascript"></script>
	<script src="@pages/javascripts/mockjax.js" type="text/javascript"></script>
	<script src="@pages/javascripts/bootstrap-editable.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/xeditable-demo-mock.js" type="text/javascript"></script>
	<script src="@pages/javascripts/xeditable-demo.js" type="text/javascript"></script>
	<script src="@pages/javascripts/address.js" type="text/javascript"></script>
	<script src="@pages/javascripts/daterange-picker.js" type="text/javascript"></script>
	<script src="@pages/javascripts/date.js" type="text/javascript"></script>
	<script src="@pages/javascripts/morris.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/skycons.js" type="text/javascript"></script>
	<script src="@pages/javascripts/fitvids.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
	<script src="@pages/javascripts/dropzone.js" type="text/javascript"></script>
	<script src="@pages/javascripts/jquery.nestable.js" type="text/javascript"></script>
	<script src="@pages/javascripts/main.js" type="text/javascript"></script>
	<script src="@pages/javascripts/respond.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
  </head>
  <body class="fourofour">
	
    <!-- Login Screen -->
    <div class="fourofour-container">
      <h1>
             <canvas class="skycons-element" data-skycons="RAIN" height="240" id="rain" width="240"></canvas>
      </h1>
      <h2>
        <img src="@pages/images/jSystem-logo-white-transparent.png" height="42"> Will be available soon.
      </h2>
      <a class="btn btn-lg btn-default-outline" href="/"><i class="fa fa-home"></i>Go back to JINUEMALL</a>
    </div>
    <!-- End Login Screen -->
  </body>
</html>