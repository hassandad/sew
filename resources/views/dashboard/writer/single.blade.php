<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SWE-Auctions</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/core.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/components.css" rel="stylesheet" type="text/css">
    <link href="/writer/assets/css/colors.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link rel="stylesheet" href="/css/ReactToastify.min.css">
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
    <script async src="/dist/writerOrderSingle.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
@include('dashboard.writer.header')

@include('dashboard.writer.nav')
<!-- /second navbar -->
<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->

            <div id="detail-div" data-count='' data-id="<?php echo $id?>"></div>


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
