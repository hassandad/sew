<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>

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
	<script type="text/javascript" src="/writer/assets/js/core/app.js"></script>

	<script type="text/javascript" src="/writer/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/pages/datatables_basic.js"></script>

	<script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/pages/form_select2.js"></script>
	
	<script type="text/javascript" src="/writer/assets/js/pages/form_inputs.js"></script>
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
				<div action="#">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h5 class="panel-title">Profile</h5>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>

							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<fieldset>
											
											<div class="col-sm-6 col-md-10">
											<div class="thumbnail">
												<div class="thumb  thumb-slide">
												<?php if($student->image):?>
													<img src="/profile/<?php echo $student->image?>" id="fileShow" style="height:400px;width:400px" alt="">
												<?php else:?>
												<img src="/user.png" id="fileShow" style="height:400px;width:400px" alt="">
												<?php endif?>
													<div class="caption">
														<span>
															<input type="file" id="file" style="display:none"  onchange="readURL(this);" class="file-styled-primary">
															<button class="btn btn-success btn-float btn-rounded addFile" type="button"><i class="icon-pencil"></i></button>
														</span>
													</div>
												</div>
				
												
											</div>
										</div>

										</fieldset>
									</div>

									<div class="col-md-6">
										<fieldset>
										<legend class="text-semibold"><i class="icon-reading position-left"></i> Personal details</legend>
										
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Name:</label>
														<input type="text" placeholder="Bilal" value="<?php echo $student->name?>" id="name" class="form-control">
														<input type="hidden" id="token" value="{{ csrf_token() }}">  
													</div>
												</div>
												<div class="col-md-6">
											<div class="form-group">
												<label>Email:</label>
												<input type="email" placeholder="name@gmail.com" value="<?php echo $email?>" readonly class="form-control">
											</div>
										</div>
												
											</div>

											<div class="row">
											

												<div class="col-md-6">
													<div class="form-group">
														<label>Contact:</label>
														<input type="text" placeholder="+99-99-9999-9999" value="<?php echo $student->contact?>" id="contact" class="form-control">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
							                            <label>Timezone:</label>
							                            <select data-placeholder="Select your Timezone" id="timezone" class="select-search">
							                            	<?php foreach($timezone as $value):?>
															<?php if($student->timezone == $value):?>
							                                <option selected value="<?php echo $value?>"><?php echo $value?></option>
															<?php else:?>
															<option value="<?php echo $value?>"><?php echo $value?></option>
															<?php endif?>
															<?php endforeach?>
							                            </select>
						                            </div>
												</div>
												
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
							                            <label>Country:</label>
							                            <select data-placeholder="Select your country" id="country" class="select-search">
							                            	<?php foreach($country as $value):?>
															<?php if($student->country == $value->name):?>
							                                <option selected value="<?php echo $value->name?>"><?php echo $value->name?></option>
															<?php else:?>
															<option value="<?php echo $value->name?>"><?php echo $value->name?></option>
															<?php endif?>
															<?php endforeach?>
							                            </select>
						                            </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>State/Province:</label>
														<input type="text" placeholder="Bayern" value="<?php echo $student->state?>" id="state" class="form-control">
													</div>
												</div>
											</div>

											<div class="row">

												<div class="col-md-6">
													<div class="form-group">
														<label>City:</label>
														<input type="text" placeholder="Munich" value="<?php echo $student->city?>" id="city" class="form-control">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Address line:</label>
														<input type="text" placeholder="Ring street 12" value="<?php echo $student->address?>" id="address" class="form-control">
													</div>
												</div>
											</div>

											<div class="form-group">
												<label>About:</label>
												<textarea rows="5" cols="5" class="form-control" id="about" placeholder="Enter about yourself"><?php echo $student->about?></textarea>
											</div>
										</fieldset>
									</div>
								</div>

								<div class="text-right">
									<button type="submit" class="btn btn-primary update">Update<i class="icon-arrow-right14 position-right"></i></button>
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


	<script type="text/javascript">

		$('.addFile').on('click',function(){
			$('#file').click();
});
var file = null;
	var fileName;
    		function readURL(input) {
			if (input.files && input.files[0]) {
				fileName = input.files[0].name;
				console.log(input.files[0].name);
				var reader = new FileReader();
				reader.onload = function (e) {
				$("#fileShow").attr("src", e.target.result);
        		file = e.target.result;
				};
				reader.readAsDataURL(input.files[0]);
			}
		}

$('.update').on('click',function(){

//	alert($('#type_id').val());
	var Data = new Object();
	Data.name = $('#name').val();
    Data.contact = $('#contact').val();
    Data.country = $('#country').val();
    Data.state = $('#state').val();
    Data.city = $('#city').val();
	Data.address = $('#address').val();
	Data.about = $('#about').val();
	Data.timezone = $('#timezone').val();
    Data.file = file;
    Data.fileName = fileName;
	Data._token = $('#token').val();
	
	if ($('#name').val() == '') {
		alert('insert name');
	}
	else if($('#contact').val() == ''){
		alert('insert contact');
	}
	else if($('#country').val() == ''){
		alert('insert country');
	}
	else if($('#state').val() == ''){
		alert('insert state');
	}
	else if($('#city').val() == ''){
		alert('insert city');
	}
	else if($('#address').val() == ''){
		alert('insert address');
	}
	else if($('#about').val() == ''){
		alert('insert about');
	}
	else if($('#timezone').val() == ''){
		alert('insert timezone');
	}
	else{
    $.ajax({
        url: '/api/student/profile/update',
        data: Data,
        type: 'post',
        success: function(response){
            
					alert('Please Login again to see the Timezone Changes');
					setTimeout(()=> {
                            window.location.reload();
                        },2000);
                      
            
        }
           
});

	
	
	}
 
});

</script>

</body>
</html>
