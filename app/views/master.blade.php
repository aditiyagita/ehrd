<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- Apple devices fullscreen -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<!-- Apple devices fullscreen -->
	<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	
	<title>{{ $data['title'] }}</title>

	<!-- Bootstrap -->
	{{ HTML::style('assets/css/bootstrap.css') }}
	<!-- Bootstrap responsive -->
	{{ HTML::style('assets/css/bootstrap-responsive.min.css') }}
	<!-- jQuery UI -->
	{{ HTML::style('assets/css/plugins/jquery-ui/smoothness/jquery-ui.css') }}
	{{ HTML::style('assets/css/plugins/jquery-ui/smoothness/jquery.ui.theme.css') }}
	<!-- PageGuide -->
	{{ HTML::style('assets/css/plugins/pageguide/pageguide.css') }}
	<!-- Fullcalendar -->
	{{ HTML::style('assets/css/plugins/fullcalendar/fullcalendar.css') }}
	{{ HTML::style('assets/css/plugins/fullcalendar/fullcalendar.print.css" media="print') }}
	<!-- chosen -->
	{{ HTML::style('assets/css/plugins/chosen/chosen.css') }}
	<!-- select2 -->
	{{ HTML::style('assets/css/plugins/select2/select2.css') }}
	<!-- icheck -->
	{{ HTML::style('assets/css/plugins/icheck/all.css') }}
	<!-- Theme CSS -->
	{{ HTML::style('assets/css/style.css') }}
	<!-- Color CSS -->
	{{ HTML::style('assets/css/themes.css') }}
	<!-- dataTables -->
	{{ HTML::style('assets/css/plugins/datatable/TableTools.css') }}


	<!-- jQuery -->
	{{ HTML::script('assets/js/jquery.min.js') }}
	
	<!-- Nice Scroll -->
	{{ HTML::script('assets/js/plugins/nicescroll/jquery.nicescroll.min.js') }}
	<!-- jQuery UI -->
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.core.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.widget.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.draggable.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.sortable.min.js') }}
	<!-- Validation -->
	{{ HTML::script('assets/js/plugins/validation/jquery.validate.min.js') }}
	{{ HTML::script('assets/js/plugins/validation/additional-methods.min.js') }}
	<!-- icheck -->
	{{ HTML::script('assets/js/plugins/icheck/jquery.icheck.min.js') }}
	<!-- Bootstrap -->
	{{ HTML::script('assets/js/bootstrap.min.js') }}

	
	<!-- Touch enable for jquery UI -->
	{{ HTML::script('assets/js/plugins/touch-punch/jquery.touch-punch.min.js') }}
	<!-- slimScroll -->
	{{ HTML::script('assets/js/plugins/slimscroll/jquery.slimscroll.min.js.js') }}
	<!-- Form -->
	{{ HTML::script('assets/js/plugins/form/jquery.form.min.js') }}
	<!-- vmap -->
	{{ HTML::script('assets/js/plugins/vmap/jquery.vmap.min.js') }}
	{{ HTML::script('assets/js/plugins/vmap/jquery.vmap.world.js') }}
	{{ HTML::script('assets/js/plugins/vmap/jquery.vmap.sampledata.js') }}
	<!-- Bootbox -->
	{{ HTML::script('assets/js/plugins/bootbox/jquery.bootbox.js') }}
	<!-- Flot -->
	{{ HTML::script('assets/js/plugins/flot/jquery.flot.min.js') }}
	{{ HTML::script('assets/js/plugins/flot/jquery.flot.bar.order.min.js') }}
	{{ HTML::script('assets/js/plugins/flot/jquery.flot.pie.min.js') }}
	{{ HTML::script('assets/js/plugins/flot/jquery.flot.resize.min.js') }}
	<!-- imagesLoaded -->
	{{ HTML::script('assets/js/plugins/imagesLoaded/jquery.imagesloaded.min.js') }}
	<!-- PageGuide -->
	{{ HTML::script('assets/js/plugins/pageguide/jquery.pageguide.js') }}
	<!-- FullCalendar -->
	{{ HTML::script('assets/js/plugins/fullcalendar/fullcalendar.min.js') }}
	<!-- Chosen -->
	{{ HTML::script('assets/js/plugins/chosen/chosen.jquery.min.js') }}
	<!-- select2 -->
	{{ HTML::script('assets/js/plugins/select2/select2.min.js') }}
	<!-- icheck -->
	{{ HTML::script('assets/js/plugins/icheck/jquery.icheck.min.js') }}
	<!-- Theme framework -->
	{{ HTML::script('assets/js/eakroko.min.js') }}
	<!-- Theme scripts -->
	{{ HTML::script('assets/js/application.min.js') }}

	<!-- jQuery UI -->
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.core.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.widget.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.mouse.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.resizable.min.js') }}
	{{ HTML::script('assets/js/plugins/jquery-ui/jquery.ui.sortable.min.js') }}
	<!-- slimScroll -->
	{{ HTML::script('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') }}
	<!-- Bootstrap -->
	{{ HTML::script('assets/js/bootstrap.min.js') }}
	<!-- Bootbox -->
	{{ HTML::script('assets/js/plugins/bootbox/jquery.bootbox.js') }}
	<!-- Bootbox -->
	{{ HTML::script('assets/js/plugins/form/jquery.form.min.js') }}
	<!-- Validation -->
	{{ HTML::script('assets/js/plugins/validation/jquery.validate.min.js') }}
	{{ HTML::script('assets/js/plugins/validation/additional-methods.min.js') }}
	<!-- Form -->
	{{ HTML::script('assets/js/plugins/form/jquery.form.min.js') }}
	<!-- Wizard -->
	{{ HTML::script('assets/js/plugins/wizard/jquery.form.wizard.min.js') }}
	{{ HTML::script('assets/js/plugins/mockjax/jquery.mockjax.js') }}
	<!-- dataTables -->
	{{ HTML::script('assets/js/plugins/datatable/jquery.dataTables.min.js') }}
	{{ HTML::script('assets/js/plugins/datatable/TableTools.min.js') }}
	{{ HTML::script('assets/js/plugins/datatable/ColReorderWithResize.js') }}
	{{ HTML::script('assets/js/plugins/datatable/ColVis.min.js') }}
	{{ HTML::script('assets/js/plugins/datatable/jquery.dataTables.columnFilter.js') }}
	{{ HTML::script('assets/js/plugins/datatable/jquery.dataTables.grouping.js') }}

	<!--[if lte IE 9]>
		<script src="asset/js/plugins/placeholder/jquery.placeholder.min.js"></script>
		<script>
			$(document).ready(function() {
				$('input, textarea').placeholder();
			});
		</script>
	<![endif]-->
	

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{url::asset('backend/img/favicon.ico')}}" />
	<!-- Apple devices Homescreen icon -->
	<link rel="apple-touch-icon-precomposed" href="{{url::asset('backend/img/apple-touch-icon-precomposed.png')}}" />

</head>

	@yield('content')


</html>