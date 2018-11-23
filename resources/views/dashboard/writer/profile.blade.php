<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile</title>

    <!-- Global stylesheets -->
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
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/writer/assets/js/core/libraries/jasny_bootstrap.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/fullcalendar/fullcalendar.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/visualization/echarts/echarts.js"></script>

    <script type="text/javascript" src="/writer/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/writer/assets/js/pages/user_profile_tabbed.js"></script>

    <script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

</head>

<body class="sidebar-xs has-detached-left">

    @include('dashboard.writer.header') @include('dashboard.writer.nav')

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper col-md-12 cnt-cnt">

                <!-- Content area -->
                <div class="content">

                    <!-- Detached sidebar -->
                    <div class="sidebar-detached col-md-3">
                        <div class="sidebar sidebar-default sidebar-separate" style="width:100%;padding-right:0px;">
                            <div class="sidebar-content">

                                <!-- User details -->
                                <div class="content-group">
                                    <div class="panel-body bg-indigo-400 border-radius-top text-center" style="background-image: url(../../../assets/images/bg.png); background-size: contain;">
                                        <div class="content-group-sm">
                                            <h6 class="text-semibold no-margin-bottom">
                                            <?php echo $writer->name ?>
											</h6>

                                            <span class="display-block">Writer</span>
                                        </div>
                                        <?php if($writer->image):?>
                                            <img src="/profile/<?php echo $writer->image ?>" class="img-circle" alt="" style="width: 110px; height: 110px;">
                                            <?php else:?>
                                                <img src="/user.png" class="img-circle" alt="" style="width: 110px; height: 110px;">
                                                <?php endif?>

                                                    <div class="text-center">
                                                        @if($rating == 1)
                                                        <div class="text-nowrap">
                                                        <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                        </div>
                                                        @elseif($rating == 2)
                                                        <div class="text-nowrap">
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                           <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                        </div>
                                                        @elseif($rating == 3)
                                                        <div class="text-nowrap">
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                           <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                        </div>
                                                        @elseif($rating == 4)
                                                        <div class="text-nowrap">
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                        </div>
                                                        @else
                                                        <div class="text-nowrap">
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                            <i class="icon-star-full2 text-size-base text-warning-300"></i>
                                                        </div>
                                                        @endif

                                                        <div>{{ count($review) }} reviews</div>
                                                    </div>

                                    </div>
                                </div>
                                <!-- /user details -->

                                <!-- Assignment -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Assignments</span>
                                        <ul class="icons-list">
                                        </ul>
                                    </div>

                                    <div class="category-content">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-body">
                                                    <a class="media-heading text-semibold">Working Assignment</a>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <span class="label bg-blue-400"><?php echo $writer->paper_type?></span>
                                                </div>
                                            </li>
                                            <li class="media">
                                                <div class="media-body">
                                                    <a class="media-heading text-semibold">Compeleted Assignment</a>
                                                </div>
                                                <div class="media-right media-middle">
                                                    <span class="label bg-success-400"><?php echo $writer->subject_id?></span>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                                <!-- Assignment -->

                                <!-- Types Of Works -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Types Of Works</span>
                                        <ul class="icons-list">
                                        </ul>
                                    </div>

                                    <div class="category-content">
                                        <ul class="media-list">
                                            <?php foreach($paperType as $value):?>
                                                <li class="media">
                                                    <div class="media-left">
                                                        <a href="#" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-merge"></i></a>
                                                    </div>

                                                    <div class="media-body">
                                                        <span class="text-semibold"><?php echo $value?></span>
                                                    </div>
                                                </li>
                                                <?php endforeach?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Types Of Works -->

                                <!-- Topics -->
                                <div class="sidebar-category">
                                    <div class="category-title">
                                        <span>Topics</span>
                                        <ul class="icons-list">
                                        </ul>
                                    </div>

                                    <div class="category-content">
                                        <ul class="media-list">
                                            <?php foreach($subject as $value):?>
                                                <li class="media">
                                                    <div class="media-left">
                                                        <a href="#" class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-branch"></i></a>
                                                    </div>

                                                    <div class="media-body">
                                                        <span class="text-semibold"><?php echo $value?></span>
                                                    </div>
                                                </li>
                                                <?php endforeach?>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Topics -->

                            </div>
                        </div>
                    </div>
                    <!-- /detached sidebar -->

                    <!-- Detached content -->
                    <div class="container-detached col-md-9">
                        <div class="content-detached">

                            <div class="panel panel-bordered">
                                <div class="panel-heading bg-indigo-400 ">
                                    <h1 class="panel-title"><?php echo $writer->name?></h1>
                                    <div class="heading-elements">
                                      
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="col-md-10">
                                        <h3 class="panel-title">About</h3>
                                        <p>
                                            <?php echo $writer->intro_long?>
                                                <p>
                                                    <br>
                                                    <h3 class="panel-title">Education</h3>
                                                    <p>
                                                        <?php echo $writer->education?>
                                                            <?php if($writer->graduated):?>
                                                                & Graduated From
                                                                <?php echo $writer->graduated?>
                                                                    <?php endif?>
                                                                        <p>
                                                                            <br>
                                                                            <h3 class="panel-title">Languages</h3>
                                                                            <p>
                                                                                <?php echo $writer->language?>
                                                                                    <p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-1" style=" padding-right:40px">
                                                    <i style="font-size:40px;" class="icon-heart6"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h2 class="panel-title"> Good Reviews</h2>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="progress content-group-sm">
                                                <div class="progress-bar" style="width: {{ $goodreview }}%">
                                                    <span class="sr-only">15% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-md-1" style=" padding-right:40px">
                                                    <i style="font-size:40px;" class="icon-heart-broken2"></i>
                                                </div>
                                                <div class="col-md-9">
                                                    <h2 class="panel-title"> Bad Reviews</h2>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel-body">
                                            <div class="progress content-group-sm">
                                                <div class="progress-bar" style="width: {{ $badreview }}%">
                                                    <span class="sr-only">15% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <div class="heading-elements">
                                        
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs bg-indigo-400">
                                            <li class="active"><a href="#colored-tab1" data-toggle="tab">Reviews</a></li>
                                            <li><a href="#colored-tab2" data-toggle="tab">Finished Assignments</a></li>
                                            <!-- <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                                        <ul class="dropdown-menu dropdown-menu-right">
                                                            <li><a href="#colored-tab3" data-toggle="tab">Dropdown tab</a></li>
                                                            <li><a href="#colored-tab4" data-toggle="tab">Another tab</a></li>
                                                        </ul>
                                                    </li> -->
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="colored-tab1">
                                            @foreach($review as $value)
                                                <div class="panel panel-flat">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <img src="/img/student.png" style="height:50px" />
                                                            </div>
                                                            <div class="col-md-10">
                                                                <h2 class="panel-title">{{ $value->student_id }}</h2> {{ $value->text }}
                                                            </div>
                                                            @if($value->ratting > 3)
                                                            <div class="col-md-1">
                                                                <i style="font-size:40px;  color:#26e" class="icon-thumbs-up3"></i>
                                                            </div>
                                                            @else
                                                            <div class="col-md-1">
                                                                <i style="font-size:40px;  color:#26e" class="icon-thumbs-up3"></i>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            </div>

                                            <div class="tab-pane" id="colored-tab2">
                                            <?php foreach($compeleted as $value):?>
                                                <div class="panel panel-flat">
                                                    <div class="panel-heading">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <i style="font-size:40px" class="icon-file-text"></i>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <h2 class="panel-title"><?php echo $value->topic?></h2>
                                                            </div>
                                                            <div class="col-md-1">
                                                                <i style="font-size:40px; color:#26e41d" class="icon-checkmark4"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /detached content -->

                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    @include('dashboard.writer.footer')

  

</body>

</html>