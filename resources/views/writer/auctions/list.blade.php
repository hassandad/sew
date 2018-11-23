<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auctions</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="/writer/assets/js/plugins/loaders/pace.min.js"></script>
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
    <script async src="/dist/auctionList.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
@include('writer.header')
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content col-md-12">

    

        <!-- Main content -->
        <div class="content-wrapper col-md-12">
                <!-- Secondary sidebar -->
			<div class="sidebar sidebar-main sidebar-default sidebar-separate col-md-3">
				<div class="sidebar-content">

					<!-- Sidebar search -->
						<div class="panel panel-flat">
							<div class="panel-body">
								<div class="tabbable">
									<ul class="nav nav-tabs nav-tabs-highlight">
										<li class="active"><h4>My Order</h4></li>							
									</ul>
								</div>
								<div>
									<ul class="order-menu">
										<li><a class="a-active" href="#">All Orders<span style="float: right; background: #90ab00; padding: 4px 9px; border-radius: 15px; color: #FFF; text-align: center;">125</span></a></li>
										<li><a href="#">In Progress<span style="float: right; background: #ff0000; padding: 4px 9px; border-radius: 15px; color: #FFF; text-align: center;">5</span></a></li>
                                        <li><a href="#">Order In Revision<span style="float: right; background: #da0484; padding: 4px 9px; border-radius: 15px; color: #FFF; text-align: center;">4</span></a></li>
										<li><a href="#">Order being Refunded<span style="float: right; background: #00bcd4; padding: 4px 9px; border-radius: 15px; color: #FFF; text-align: center;">1</span></a></li>
										<li><a href="#">Finished Order<span style="float: right; background: #ff7043; padding: 4px 9px; border-radius: 15px; color: #FFF; text-align: center;">200</span></a></li>
                                        <li><a href="#">Order under Approval<span style="float: right; background: #da0484; padding: 4px 9px; border-radius: 15px; color: #FFF; text-align: center;">3</span></a></li>
                                        <li><a href="#">Amount Earned</a></li>
                                        <li><a href="#">Writing Guidelines</a></li>
                                        <li><a href="#">My Credentials</a></li>
									</ul>
								</div>
							</div>
						</div>
					<!-- /sidebar search -->
				</div>
			</div>
			<!-- /secondary sidebar -->
            <!-- Page header -->
            <div class="page-header col-md-9" style=height:50px>
                <div class="page-header-content  cnt-cnt" style=height:50px>
                    <div class="page-title" style=height:50px;padding:0>
                        <h4>
                            <span class="text-semibold">Available Assignments </span></h4>
                    </div>
                </div>
            </div>
            <!-- /page header -->
           <div class="col-md-9" id="auction-list"></div>


        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Footer -->
<div class="navbar navbar-default">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li><a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
    </ul>

    <div class="navbar-collapse collapse" id="navbar-second">
        <div class="navbar-text">
            © 2017. <a href="#">Subject Expert Writers</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">SEW</a>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li><a href="#" class="legitRipple">Help center</a></li>
                <li><a href="#" class="legitRipple">Policy</a></li>
                <li><a href="#" class="text-semibold legitRipple">Upgrade your account</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- /footer -->



</body>
</html>