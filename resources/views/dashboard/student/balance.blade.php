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
	<link rel="stylesheet" href="/css/ReactToastify.min.css">
	<!-- Core JS files -->
	<script type="text/javascript" src="/writer/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/loaders/blockui.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/ui/nicescroll.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/ui/drilldown.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/writer/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="/writer/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/writer/assets/js/pages/datatables_basic.js"></script>

	<script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	@include('dashboard.student.header')


	@include('dashboard.student.nav')

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
								<h1 style="text-align: center;">Comming Soon</h1>
									<ul class="nav nav-tabs nav-tabs-highlight">
										<li class="active"><h4>Balance Details</h4></li>							
									</ul>

									<div class="tab-content">
										<div class="tab-pane active" id="badges-tab1">
																<div class="table-responsive col-md-6">
																<h5 style="text-align: center;">Balance Available</h5>
																<div class="dollar-div">$128.00</div>
																<div style="text-align: center;"><button type="button" class="btn btn-success heading-btn"><i class="icon-folder-download" style="margin-right: 8px;"></i>Withdraw</button></div>
																</div>															
																<div class="col-md-6">
																<h5 style="text-align: center;">Funds on Hold</h5>																
																<div class="fund-div">$128.00</div>
																<div style="text-align: center;">Bed one supposing breakfast day fulfilled</br>off depending questions</div>
															</div>
														</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
				<!-- Basic datatable -->
				<div class="panel panel-info col-md-10 cnt-cnt" style="padding: 0px;">
					<div class="panel-heading">
						<h4 class="panel-title">Withdrawal Requests</h4>
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
								<th>Withdrawal ID</th>
								<th>Transiction ID</th>
								<th>Payment Method</th>
								<th>Amount</th>
								<th>Date</th>
								<th class="text-center">Actions</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1062</td>
								<td>111252</td>
								<td>Paypal</td>
								<td>$125.00</td>
								<td>12-08-2017</td>
								<td class="text-center"><button type="button" class="btn btn-warning heading-btn legitRipple">Cancel</button></td>
								<td><span class="label label-primary">Processing</br>(Scheduled for 12/08/2017)</td>
							</tr>
							<tr>
								<td>1062</td>
								<td>111252</td>
								<td>Paypal</td>
								<td>$125.00</td>
								<td>12-08-2017</td>
								<td class="text-center"></td>
								<td class="text-center"><span class="label label-success">Processed</td>
							</tr>							
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

								<!-- Basic datatable -->
				<div class="panel panel-primary col-md-10 cnt-cnt" style="padding: 0px;">
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
								<th>Status</th>
								<th>Reference</th>
								<th>Description</th>
								<th>Date & Time</th>
								<th>Incoming</th>
								<th>Expanse</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="text-center"><span class="label label-success"><i class="icon-drawer-in"></i></br>Credit</span></td>
								<td>1122001</td>
								<td>Bed one supposing breakfast day fulfilled off depending questions Bed one supposing breakfast day fulfilled
								off depending questions</td>
								<td>22 Jun 2017 (04:00 AM)</td>
								<td>$12.00</td>
								<td>00</td>
							</tr>
							<tr>
								<td class="text-center"><span class="label label-danger"><i class="icon-drawer-out"></i></br>Debit</span></td>
								<td>1122001</td>
								<td>Bed one supposing breakfast day fulfilled off depending questions Bed one supposing breakfast day fulfilled
								off depending questions</td>
								<td>22 Jun 2017 (04:00 AM)</td>
								<td>00</td>
								<td>$120.00</td>
							</tr>							
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->

								<!-- Basic datatable -->
				<div class="panel panel-success col-md-10 cnt-cnt" style="padding: 0px;">
					<div class="panel-heading">
						<h4 class="panel-title">Funds on Hold</h4>
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
								<th>Title</th>
								<th>Amount</th>
								<th>Date of Enrollment</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><span style="font-weight: bold;">Order:</span><span><a href="#">This will be the title of Assignment from which the fund are on hold</a></span></td>
								<td>$ 51.00</td>
								<td>September 22, 2017 at 12:00 am</td>
							</tr>
							<tr>
								<td><span style="font-weight: bold;">Order:</span><span><a href="#">This will be the title of Assignment from which the fund are on hold</a></span></td>
								<td>$ 51.00</td>
								<td>September 22, 2017 at 12:00 am</td>
							</tr>							
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->


	@include('dashboard.student.footer')

</body>
</html>
