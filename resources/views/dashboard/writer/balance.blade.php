<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Balance</title>

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
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/nicescroll.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/drilldown.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/notifications/pnotify.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>

    <script type="text/javascript" src="/writer/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/writer/assets/js/pages/form_multiselect.js"></script>

    <script type="text/javascript" src="/writer/assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/picker.time.js"></script>

    <script type="text/javascript" src="/writer/assets/js/pages/picker_date.js"></script>
    <!-- /theme JS files -->
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/pages/form_select2.js"></script>

</head>

<body>

    @include('dashboard.writer.header') @include('dashboard.writer.nav')

    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-10 cnt-cnt">
                        <div class="panel panel-flat">
                            <div class="panel-body">
                                <div class="tabbable">
                                    <ul class="nav nav-tabs nav-tabs-highlight">
                                        <li class="active">
                                            <h4>Balance Details</h4></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="badges-tab1">
                                            <div class="table-responsive col-md-6">
                                                <h5 style="text-align: center;">Balance Available</h5>
                                                <div class="dollar-div">$
                                                    <?php echo $totalCompelete?>
                                                </div>
                                                <div style="text-align: center;">
                                                    <button type="button" class="btn btn-success heading-btn"><i class="icon-folder-download" style="margin-right: 8px;"></i>Withdraw</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5 style="text-align: center;">Balance on Hold</h5>
                                                <div class="fund-div">$
                                                    <?php echo $totalPending?>
                                                </div>
                                                <div style="text-align: center;">Bed one supposing breakfast day fulfilled</br>off depending questions</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 cnt-cnt">
                    <div class="panel panel-flat">

                        <div class="panel-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs bg-primary">
                                    <li class="active"><a href="#colored-tab1" data-toggle="tab">Withdrawl Requests</a></li>
                                    <li><a href="#colored-tab2" data-toggle="tab">History</a></li>
                                    <li><a href="#colored-tab3" data-toggle="tab">Funds On Hold</a></li>
                                    <!-- <li><a href="#colored-tab4" data-toggle="tab">Notification</a></li> -->
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="colored-tab1">
                                        <!-- Basic datatable -->
                                        <div class="panel panel-success  cnt-cnt">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Withdrawl Requests</h4>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li>
                                                            <a data-action="collapse"></a>
                                                        </li>
                                                        <li>
                                                            <a data-action="reload"></a>
                                                        </li>
                                                        <li>
                                                            <a data-action="close"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <table class="table datatable-basic">
                                                <thead>
                                                    <tr>
                                                        <th>Payment No</th>
                                                        <th>Assignment Topic</th>
                                                        <th>Payment Method</th>
                                                        <th>Price</th>
                                                        <th>Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($compelete as $value):?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value->no?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value->topic?>
                                                            </td>
                                                            <td>Paypal</td>
                                                            <td>$
                                                                <?php echo $value->price?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value->created_on?>
                                                            </td>
                                                            <td class="text-center"><span class="label label-success">Compeleted</td>
														</tr>		
													<?php endforeach?>					
												</tbody>
											</table>
										</div>
				<!-- /basic datatable -->
                                    </div>

                                    <div class="tab-pane" id="colored-tab2">

                                                <!-- Basic datatable -->
				<div class="panel panel-success cnt-cnt">
					<div class="panel-heading">
						<h4 class="panel-title">History</h4>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>
					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Payment No</th>
								<th>Assignment Topic</th>
								<th>Payment Method</th>
								<th>Price</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($compelete as $value):?>
							<tr>
								<td><?php echo $value->no?></td>
								<td><?php echo $value->topic?></td>
								<td>Paypal</td>
								<td>$<?php echo $value->price?></td>
								<td><?php echo $value->created_on?></td>
								<td class="text-center"><span class="label label-success">Compeleted</td>
							</tr>		
						<?php endforeach?>					
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

                                    </div>

                                    <div class="tab-pane" id="colored-tab3">

                                                <!-- Basic datatable -->
				<div class="panel panel-success cnt-cnt">
					<div class="panel-heading">
						<h4 class="panel-title">Funds On Hold</h4>
						<div class="heading-elements">
							<ul class="icons-list">
		                		<li><a data-action="collapse"></a></li>
		                		<li><a data-action="reload"></a></li>
		                		<li><a data-action="close"></a></li>
		                	</ul>
	                	</div>
					</div>
					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>Payment No</th>
								<th>Assignment Topic</th>
								<th>Payment Method</th>
								<th>Price</th>
								<th>Date</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($pending as $value):?>
							<tr>
								<td><?php echo $value->no?></td>
								<td><?php echo $value->topic?></td>
								<td>Paypal</td>
								<td>$<?php echo $value->price?></td>
								<td><?php echo $value->created_on?></td>
								<td class="text-center"><span class="label label-success">Pending</td>
							</tr>		
						<?php endforeach?>					
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

	@include('dashboard.writer.footer')

</body>
</html>