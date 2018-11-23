<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Place An Order</title>

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


    	<!-- Theme JS files -->
	<script type="text/javascript" src="/writer/assets/js/plugins/notifications/jgrowl.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="/writer/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/writer/assets/js/pages/picker_date.js"></script>

    <script type="text/javascript" src="/writer/assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="/writer/assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

    <!-- /theme JS files -->

</head>

<body>

    @include('dashboard.student.header') @include('dashboard.student.nav')

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
                                        <h1 class="text-center" style="text-Transform:uppercase">Place An Order</h1>
                                        <!-- Advanced legend -->
                                        <div class="form-horizontal">
                                            <div class="panel panel-flat">

                                                <div class="panel-body">
                                                    <h3 style="text-Transform:uppercase">Main</h3>
                                                    <fieldset>
                                                        <div class="collapse in">
                                                            <div id="change" class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-3 control-label">Assignment Topic * :</label>
                                                                <div class="col-lg-9">
                                                                    <input type="text" id="topic" class="form-control" placeholder="Enter Assignment Topic">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </fieldset>
                                                    <fieldset>
                                                        <div class="collapse in" id="demo1">

                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-3 control-label">Paper Type * :</label>
                                                                <div class="col-lg-9">
                                                                    <select id="type_id" class="select-search">
                                                                        <optgroup label="Select Paper Type ">
                                                                            <?php foreach ($type as $value) : ?>
                                                                                <option value="<?php echo $value->id ?>">
                                                                                    <?php echo $value->name?>
                                                                                </option>
                                                                                <?php endforeach?>
                                                                        </optgroup>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-3 control-label">Subject * :</label>
                                                                <div class="col-lg-9">
                                                                    <select id="subject_id" class="select-search">

                                                                        <?php foreach ($subject as $value) : ?>
                                                                            <optgroup label="<?php echo $value->name ?>">
                                                                                <?php foreach ($sub as $key) : ?>
                                                                                    <?php if ($key->subject_id == $value->id):?>
                                                                                        <option value="<?php echo $key->id ?>">
                                                                                            <?php echo $key->name?>
                                                                                        </option>
                                                                                        <?php endif?>

                                                                                            <?php endforeach?>
                                                                                                <?php endforeach?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-3 control-label">Paper Details :</label>
                                                                <div class="col-lg-9">
                                                                    <textarea rows="5" cols="5" id="detail" class="form-control" placeholder="Enter brief details of Assignment"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </fieldset>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /a legend -->

                                    </div>
                                </div>

                                <div class="tab-pane active">
                                    <div class="col-md-12">

                                        <!-- Advanced legend -->
                                        <div class="form-horizontal">
                                            <div class="panel panel-flat">
                                                <div class="panel-body">
                                                    <h3>Details</h3>

                                                    <fieldset>
                                                        <div class="collapse in" id="demo1">
                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right ">Min. Pages :</label>
                                                                <div class="col-lg-4">
                                                                    <input type="number" class="form-control" id="page" value="1" placeholder="Enter Page No,    default = 1">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right ">Page Size :</label>
                                                                <div class="col-lg-4">
                                                                    <select id="pageSize" class="select-search">
                                                                        <optgroup label="Choose Level">
                                                                            <option value="1">Single Space</option>
                                                                            <option value="2">Double Space</option>
                                                                            <option value="3">Other</option>
                                                                        </optgroup>

                                                                    </select>
                                                                </div>
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Total Words:</label>
                                                                <div class="col-lg-4">
                                                                    <input type="number" class="form-control" value="550" id="word" readonly="" placeholder="Enter Word Quantity Per Page,   default = 275">
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Type of Service :</label>
                                                                <div class="col-lg-4">
                                                                    <select id="service" class="select-search">
                                                                        <optgroup label="Choose Service">
                                                                            <option value="Custom Writing">Custom Writing</option>
                                                                            <option value="Editing">Editing</option>
                                                                        </optgroup>
                                                                    </select>
                                                                </div>

                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Academic Level :</label>
                                                                <div class="col-lg-4">
                                                                    <select id="academic" class="select-search">
                                                                        <optgroup label="Choose Level">
                                                                            <option value="Middle School">Middle School</option>
                                                                            <option value="High School">High School</option>
                                                                            <option value="Undergraduate/Bachelor">Undergraduate/Bachelor</option>
                                                                            <option value="Masters">Masters</option>
                                                                            <option value="PHP">PHD</option>
                                                                        </optgroup>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" id="token" value="{{ csrf_token() }}">
                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Formatting Style :</label>
                                                                <div class="col-lg-4">
                                                                    <select id="format_id" class="select-search">
                                                                        <optgroup label="Choose Format">
                                                                            <?php foreach ($format as $value) : ?>
                                                                                <option value="<?php echo $value->id ?>">
                                                                                    <?php echo $value->name?>
                                                                                </option>
                                                                                <?php endforeach?>
                                                                        </optgroup>

                                                                    </select>
                                                                </div>
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Deadline * :</label>
                                                                <div class="col-lg-4">
                                                                    <div class="input-group">
											                        <span class="input-group-addon"><i class="icon-calendar22"></i></span>
											                        <input type="text" class="form-control deadline"  id="anytime-both" placeholder="if empty then it select current date and time">
										                            </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Price :</label>

                                                                <div class="col-lg-4">
                                                                    <input type="number" class="form-control" id="price"  placeholder="Enter Price,    default = 5">

                                                                </div>
                                                                <label style="text-Transform:uppercase" class="col-lg-2 control-label text-right">Attach File :</label>

                                                                <div class="col-lg-4">
                                                                    <button class="btn btn-primary btn-rounded  addFile">ADD File</button>
                                                                    <input type="file" class="form-control" style="display:none" onchange="readURL(this);" id="file">
                                                                    <label id="fileName"></label>

                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                </fieldset>

                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-primary btn-rounded  place">Place <i class="icon-arrow-right14 position-right   "></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /a legend -->

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

    <script type="text/javascript">
        var file;
        var fileName;

        function readURL(input) {
            if (input.files && input.files[0]) {
                fileName = input.files[0].name;
                if (input.files[0].size > 5242880) {
                    alert('File Size is greater than 5 MB');
                } else {
                    
                var reader = new FileReader();
                reader.onload = function(e) {
                    file = e.target.result;
                    $('#fileName').text(fileName);
                };
                reader.readAsDataURL(input.files[0]);
                }
            }
        }

        $('#pageSize').on('change', function() {
            if ($('#pageSize').val() == '1') {
                $('#word').val($('#page').val()*550);
                $('#word').attr("readonly",true);
            } else if ($('#pageSize').val() == '2'){
                $('#word').val($('#page').val()*275);
                $('#word').attr("readonly",true);
            } else {
                $('#word').removeAttr("readonly");
            }


        });

        $('#page').keyup(function() {
            if ($('#pageSize').val() == '1') {
                $('#word').val($('#page').val()*550);
                $('#word').attr("readonly",true);
            } else if ($('#pageSize').val() == '2'){
                $('#word').val($('#page').val()*275);
                $('#word').attr("readonly",true);
            } else {
                $('#word').removeAttr("readonly");
            }


        });

        $('.addFile').on('click', function() {
            $('#file').click();
        });

        $('.place').on('click', function() {

            //	alert($('#type_id').val());
            var Data = new Object();
            Data.topic = $('#topic').val();
            Data.type_id = $('#type_id').val();
            Data.subject_id = $('#subject_id').val();
            Data.detail = $('#detail').val();
            Data.page = $('#page').val();
            Data.word = $('#word').val();
            Data.file = file;
            Data.fileName = fileName;
            Data.service = $('#service').val();
            Data.academic = $('#academic').val();
            Data.format_id = $('#format_id').val();
            Data.deadline = $('.deadline').val();
            Data.price = $('#price').val();
            Data._token = $('#token').val();

            if ($('#topic').val() == '') {
                $("#change").addClass("has-error");
            }else if($('.dealine').val() == ''){
                alert('insert deadline');
            }else if($('#page').val() < 1){
                alert('no of page invalid');
            }else if($('#price').val() < 5){
                alert('Price is Invalid');
            }  else {
                if ($('#page').val() == '') {
                    Data.page = 1;
                }
                if (!file) {
                    Data.file = null;
                }
                if ($('#word').val() == '') {
                    Data.word = 550;
                }
                if ($('#price').val() == '') {
                    Data.price = 5;
                }

                $("#change").removeClass("has-error");
                $.ajax({
                    url: '/api/orders/add',
                    data: Data,
                    type: 'post',
                    success: function(response) {

                        alert('successfull');
                        // setTimeout(() => {
                        //     window.location.href = '/dashboard/student/myOrder'
                        // }, 2000);

                    }

                });

            }

        });
    </script>

</body>

</html>