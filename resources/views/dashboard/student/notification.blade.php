<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notifications</title>

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
	<link rel="stylesheet" href="/css/ReactToastify.min.css">
	<!-- Theme JS files -->
	<script type="text/javascript" src="/writer/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/pages/form_select2.js"></script>
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
		<div class="page-content col-md-12">


			<!-- Main content -->
			<div class="content-wrappr col-md-11 cnt-cnt">
				<!-- Sidebars overview -->
						<div class="panel panel-flat">
							<div class="panel-body">
								<div class="tabbable">
									

									<div class="tab-content">
										<div class="tab-pane active" id="basic-tab1">
											<div class="col-md-12">
                                            <h1 class="text-center">Notifications</h1>
											<div class="table-responsive">
									<table class="table text-nowrap">
										<thead>
											<tr>
												<th style="width: 50px">Issue Date</th>
												<th style="width: 300px;">User</th>
												<th>Description</th>
												<th class="text-center" style="width: 20px;"></th>
											</tr>
										</thead>
										<tbody>
											<tr class="active border-double">
												<td colspan="3">Today</td>
												<td class="text-right">
													<span class="badge bg-blue"><?php echo sizeof($data)?></span>
												</td>
											</tr>
											<?php foreach ($data as $key => $value):?>
											<tr>
												<td class="text-center">
													<h6 class="no-margin"> <small class="display-block text-size-small no-margin"><?php echo $value->created_on?></small></h6>
												</td>
												<td>
													<div class="media-left media-middle">
														<img style="height:30px" src="/user.png"/>
													</div>

													<div class="media-body">
														<a href="#" class="display-inline-block text-default text-semibold letter-icon-title"><?php echo $value->name?></a>
													</div>
												</td>
												<td>
													<a href="#" class="text-default display-inline-block">
														<span class="text-semibold"><?php echo $value->notification?></span>
													</a>
												</td>
												<td class="text-center">
												</td>
											</tr>
											<?php endforeach?>

											<tr class="active border-double">
												<td colspan="3">This Month</td>
												<td class="text-right">
													<span class="badge bg-success"><?php echo sizeof($dataMonth)?></span>
												</td>
											</tr>
											<?php foreach ($dataMonth as $key => $value):?>
										<tr>
											<td class="text-center">
												<h6 class="no-margin"> <small class="display-block text-size-small no-margin"><?php echo $value->created_on?></small></h6>
											</td>
											<td>
												<div class="media-left media-middle">
													<img style="height:30px" src="/user.png"/>
												</div>

												<div class="media-body">
													<a href="#" class="display-inline-block text-default text-semibold letter-icon-title"><?php echo $value->name?></a>
												</div>
											</td>
											<td>
												<a href="#" class="text-default display-inline-block">
													<span class="text-semibold"><?php echo $value->notification?></span>
												</a>
											</td>
											<td class="text-center">
											</td>
										</tr>
											<?php endforeach?>
											<tr class="active border-double">
												<td colspan="3">Remainings</td>
												<td class="text-right">
													<span class="badge bg-danger"><?php echo sizeof($dataRemains)?></span>
												</td>
											</tr>
											<?php foreach ($dataRemains as $key => $value):?>
											<tr>
												<td class="text-center">
													<h6 class="no-margin"> <small class="display-block text-size-small no-margin"><?php echo $value->created_on?></small></h6>
												</td>
												<td>
													<div class="media-left media-middle">
														<img style="height:30px" src="/user.png"/>
													</div>
	
													<div class="media-body">
														<a href="#" class="display-inline-block text-default text-semibold letter-icon-title"><?php echo $value->name?></a>
													</div>
												</td>
												<td>
													<a href="#" class="text-default display-inline-block">
														<span class="text-semibold"><?php echo $value->notification?></span>
													</a>
												</td>
												<td class="text-center">
												</td>
											</tr>
												<?php endforeach?>
										</tbody>
									</table>
								</div>

											</div>
										</div>

										<div class="tab-pane active" >
											<div class="col-md-12">

										

											</div>
										</div>

																												
									</div>
								</div>
							</div>
						</div>					
				<!-- /sidebars overview -->

	           
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->



	@include('dashboard.student.footer')





</body>
</html>
