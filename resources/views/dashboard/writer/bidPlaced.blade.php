<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bid Placed Assignment</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/writer/assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/loaders/blockui.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/drilldown.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/writer/assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/pickers/daterangepicker.js"></script>

    <script type="text/javascript" src="/writer/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/writer/assets/js/pages/dashboard.js"></script>

    <script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
    <script async src="/dist/writerBidAssignmentList.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->

@include('dashboard.writer.header')


	@include('dashboard.writer.nav')
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content col-md-12">

    

        <!-- Main content -->
        <div class="content-wrapper col-md-12">
                <!-- Secondary sidebar -->
			<div class="sidebar sidebar-main sidebar-default sidebar-separate col-md-3">
				<div class="sidebar-content">

				</div>
			</div>
			<!-- /secondary sidebar -->
            <!-- Page header -->
            <div class="page-header col-md-12" style=height:50px>
                <div class="page-header-content  cnt-cnt" style=height:50px>
                    <div class="page-title" style=height:50px;padding:0>
                        <h4>
                            <span class="text-semibold" style="text-Transform:uppercase">Bid Placed Assignments </span></h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->
           <div class="col-md-12" id="auction-list"></div>


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

@include('dashboard.writer.footer')



</body>
</html>