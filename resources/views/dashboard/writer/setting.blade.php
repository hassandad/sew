<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Settings</title>

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
        <div class="page-content col-md-12">

            <!-- Main content -->
            <div class="content-wrappr col-md-11 cnt-cnt">

                <!-- Settings modal -->
                <div id="createTemplate" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="icon-cog5 position-left"></i> Create Template</h5>
                            </div>

                            <!-- Form inside modal -->
                            <div action="#">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Template Name</label>
                                        <div class="row">
                                            <input type="text" maxLength="250" id="templateName" class="form-control" placeholder="Enter Template Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Template Text</label>
                                        <div class="row">
                                            <textarea rows="5" cols="5" maxLength="5000" id="templateText" class="form-control" placeholder="Enter Template Text"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info  createTemplate">Create</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="editTemplate" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title"><i class="icon-cog5 position-left"></i> Edit Template</h5>
                            </div>

                            <!-- Form inside modal -->
                            <div action="#">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Template Name</label>
                                        <div class="row">
                                            <input type="text" maxLength="250" class="form-control" id="editTemplateName" placeholder="Enter Template Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Template Text</label>
                                        <div class="row">
                                            <textarea rows="5" cols="5" maxLength="250" class="form-control" id="editTemplateText" placeholder="Enter Template Text"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info updateTemplate">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h6 class="panel-title">Setting</h6>
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

                        <div class="panel-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs bg-primary">
                                    <li class="active"><a href="#colored-tab1" data-toggle="tab">Qualification</a></li>
                                    <li><a href="#colored-tab2" data-toggle="tab">Personal</a></li>
                                    <li><a href="#colored-tab3" data-toggle="tab">Templates</a></li>
                                    <!-- <li><a href="#colored-tab4" data-toggle="tab">Notification</a></li> -->
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="colored-tab1">
                                        <div class="col-md-12">

                                            <!-- Advanced legend -->
                                            <div class="form-horizontal" >
                                                <div class="panel panel-flat">
                                                    <div class="panel-body">
                                                        <h3>Introduction</h3>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">My Introduction:(Visible to all users)</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" maxLength="250" id="intro_short" class="form-control" value="<?php echo $writer->intro_short?>" placeholder="Enter Short Intro">
                                                                        <input type="hidden" id="token" value="{{ csrf_token() }}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label"></label>
                                                                    <div class="col-lg-9">
                                                                        <textarea rows="5" cols="5" maxLength="4450" id="intro_long" class="form-control" placeholder="Enter brief introduction of yourself"><?php echo $writer->intro_long?></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Education: (Visible to all users)</label>
                                                                    <div class="col-lg-9">
                                                                        <select id="education" class="select">
                                                                            <?php if($writer->education == 'None'):?>
                                                                                <option selected value="None">None</option>
                                                                                <?php else : ?>
                                                                                    <option value="None">None</option>
                                                                                    <?php endif?>
                                                                                        <?php if($writer->education == 'High School'):?>
                                                                                            <option selected value="High School">High School</option>
                                                                                            <?php else : ?>
                                                                                                <option value="High School">High School</option>
                                                                                                <?php endif?>
                                                                                                    <?php if($writer->education == 'Assosiate'):?>
                                                                                                        <option selected value="Assosiate">Assosiate</option>
                                                                                                        <?php else : ?>
                                                                                                            <option value="Assosiate">Assosiate</option>
                                                                                                            <?php endif?>
                                                                                                                <?php if($writer->education == 'Bachelor'):?>
                                                                                                                    <option selected value="Bachelor">Bachelor</option>
                                                                                                                    <?php else : ?>
                                                                                                                        <option value="Bachelor">Bachelor</option>
                                                                                                                        <?php endif?>
                                                                                                                            <?php if($writer->education == 'Master'):?>
                                                                                                                                <option selected value="Master">Master</option>
                                                                                                                                <?php else : ?>
                                                                                                                                    <option value="Master">Master</option>
                                                                                                                                    <?php endif?>
                                                                                                                                        <?php if($writer->education == 'Doctor'):?>
                                                                                                                                            <option selected value="Doctor">Doctor</option>
                                                                                                                                            <?php else : ?>
                                                                                                                                                <option value="Doctor">Doctor</option>
                                                                                                                                                <?php endif?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Graduated from</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" maxLength="250" id="graduated" value="<?php echo $writer->graduated?>" class="form-control" placeholder="Enter Short Intro">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Specialized in</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" maxLength="250" id="specialized" value="<?php echo $writer->specialized?>" class="form-control" placeholder="Enter Short Intro">
                                                                    </div>
                                                                </div>

                                                                <!-- Select All option -->
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Preffered Assignment</label>
                                                                    <div class="col-lg-9">
                                                                        <div class="multi-select-full">
                                                                            <select class="multiselect-select-all" id="paper_type" multiple="multiple">

                                                                                <?php foreach($type as $value):?>
                                                                                    <?php foreach($writer->paper_type as $key => $wtype):?>
                                                                                        <?php if($value->id == $wtype):?>
                                                                                            <option selected value="<?php echo $value->id?>">
                                                                                                <?php echo $value->name?>
                                                                                            </option>
                                                                                            <?php break;?>
                                                                                                <?php elseif($key+1 == count($writer->paper_type)):?>
                                                                                                    <option value="<?php echo $value->id?>">
                                                                                                        <?php echo $value->name?>
                                                                                                    </option>
                                                                                                    <?php endif?>
                                                                                                        <?php endforeach?>

                                                                                                            <?php endforeach?>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /select All option -->

                                                                <!-- Select All option -->
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Preffered Diciplines</label>

                                                                    <div class="multi-select-full  col-lg-9">
                                                                        <select id="subject_id" class="multiselect-select-all" multiple="multiple">
                                                                            <?php foreach ($subject as $value) : ?>
                                                                                <optgroup label="<?php echo $value->name ?>">
                                                                                    <?php foreach ($sub as $key) : ?>
                                                                                        <?php if ($key->subject_id == $value->id):?>
                                                                                            <?php foreach($writer->subject_id as $k => $subject):?>
                                                                                                <?php if($subject ==  $key->id):?>
                                                                                                    <option selected value="<?php echo $key->id ?>">
                                                                                                        <?php echo $key->name?>
                                                                                                    </option>
                                                                                                    <?php break;?>
                                                                                                        <?php elseif($k+1 == count($writer->subject_id)):?>
                                                                                                            <option value="<?php echo $key->id ?>">
                                                                                                                <?php echo $key->name?>
                                                                                                            </option>
                                                                                                            <?php endif?>
                                                                                                                <?php endforeach?>
                                                                                                                    <?php endif?>

                                                                                                                        <?php endforeach?>
                                                                                                                            <?php endforeach?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <!-- /select All option -->
                                                                <!-- Select All option -->
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Languages</label>
                                                                    <div class="col-lg-9">
                                                                        <div class="multi-select-full">
                                                                            <select class="multiselect-select-all" id="language" multiple="multiple">
                                                                                <?php foreach($writer->language as $key => $lang):?>
                                                                                    <?php if($lang ==  "English"):?>
                                                                                        <option selected value="English">English</option>
                                                                                        <?php break;?>
                                                                                            <?php elseif($key+1 == count($writer->language)):?>
                                                                                                <option value="English">English</option>
                                                                                                <?php endif?>
                                                                                                    <?php endforeach?>
                                                                                                        <?php foreach($writer->language as $key => $lang):?>
                                                                                                            <?php if($lang ==  "German"):?>
                                                                                                                <option selected value="German">German</option>
                                                                                                                <?php break;?>
                                                                                                                    <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                        <option value="German">German</option>
                                                                                                                        <?php endif?>
                                                                                                                            <?php endforeach?>
                                                                                                                                <?php foreach($writer->language as $key => $lang):?>
                                                                                                                                    <?php if($lang ==  "French"):?>
                                                                                                                                        <option selected value="French">French</option>
                                                                                                                                        <?php break;?>
                                                                                                                                            <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                                                <option value="French">French</option>
                                                                                                                                                <?php endif?>
                                                                                                                                                    <?php endforeach?>
                                                                                                                                                        <?php foreach($writer->language as $key => $lang):?>
                                                                                                                                                            <?php if($lang ==  "Spanish"):?>
                                                                                                                                                                <option selected value="Spanish">Spanish</option>
                                                                                                                                                                <?php break;?>
                                                                                                                                                                    <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                                                                        <option value="Spanish">Spanish</option>
                                                                                                                                                                        <?php endif?>
                                                                                                                                                                            <?php endforeach?>
                                                                                                                                                                                <?php foreach($writer->language as $key => $lang):?>
                                                                                                                                                                                    <?php if($lang ==  "Portuguese"):?>
                                                                                                                                                                                        <option selected value="Portuguese">Portuguese</option>
                                                                                                                                                                                        <?php break;?>
                                                                                                                                                                                            <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                                                                                                <option value="Portuguese">Portuguese</option>
                                                                                                                                                                                                <?php endif?>
                                                                                                                                                                                                    <?php endforeach?>
                                                                                                                                                                                                        <?php foreach($writer->language as $key => $lang):?>
                                                                                                                                                                                                            <?php if($lang ==  "Russian"):?>
                                                                                                                                                                                                                <option selected value="Russian">Russian</option>
                                                                                                                                                                                                                <?php break;?>
                                                                                                                                                                                                                    <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                                                                                                                        <option value="Russian">Russian</option>
                                                                                                                                                                                                                        <?php endif?>
                                                                                                                                                                                                                            <?php endforeach?>
                                                                                                                                                                                                                                <?php foreach($writer->language as $key => $lang):?>
                                                                                                                                                                                                                                    <?php if($lang ==  "Arabic"):?>
                                                                                                                                                                                                                                        <option selected value="Arabic">Arabic</option>
                                                                                                                                                                                                                                        <?php break;?>
                                                                                                                                                                                                                                            <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                                                                                                                                                <option value="Arabic">Arabic</option>
                                                                                                                                                                                                                                                <?php endif?>
                                                                                                                                                                                                                                                    <?php endforeach?>
                                                                                                                                                                                                                                                        <?php foreach($writer->language as $key => $lang):?>
                                                                                                                                                                                                                                                            <?php if($lang ==  "Chinese"):?>
                                                                                                                                                                                                                                                                <option selected value="Chinese">Chinese</option>
                                                                                                                                                                                                                                                                <?php break;?>
                                                                                                                                                                                                                                                                    <?php elseif($key+1 == count($writer->language)):?>
                                                                                                                                                                                                                                                                        <option value="Chinese">Chinese</option>
                                                                                                                                                                                                                                                                        <?php endif?>
                                                                                                                                                                                                                                                                            <?php endforeach?>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- /select All option -->

                                                            </div>
                                                        </fieldset>
                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-primary addQualification">Save Qualification<i class="icon-arrow-right14 position-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /a legend -->

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="colored-tab2">
                                        <div class="col-md-12">

                                            <!-- Advanced legend -->
                                            <div class="form-horizontal">
                                                <div class="panel panel-flat">
                                                    <div class="panel-body">
                                                        <h3>User Photo</h3>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Your Image</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="file" id="file" accept="image/*" onchange="readURL(this);" class="file-styled">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <h3>Name</h3>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Name</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control" id="name" value="<?php echo $writer->name?>" placeholder="Enter Your Name">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <h3>Date of Birth</h3>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Select Day, Month and Year</label>
                                                                    <div class="col-lg-9">
                                                                        <div class="input-group">
                                                                            <span class="input-group-addon"><i class="icon-calendar3"></i></span>
                                                                            <input type="text" class="form-control dob" id="anytime-date" value="<?php echo $writer->dob?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <h3>Contact Details</h3>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Email</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control" readonly value="<?php echo \Illuminate\Support\Facades\Session::get('user')->email?>" placeholder="Enter Short Intro">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Country</label>
                                                                    <div class="col-lg-9">
                                                                        <select data-placeholder="Select your country" id="country" class="select">
                                                                            <?php foreach($country as $value):?>
                                                                            <?php if($writer->country == $value->name):?>
                                                                            <option selected value="<?php echo $value->name?>"><?php echo $value->name?></option>
                                                                            <?php else : ?>
                                                                            <option value="<?php echo $value->name?>"><?php echo $value->name?></option>
                                                                            <?php endif?>
                                                                            <?php endforeach?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">City</label>
                                                                    <div class="col-lg-3">
                                                                        <input type="text" class="form-control" id="city" value="<?php echo $writer->city?>" placeholder="Enter City">
                                                                    </div>
                                                                    <label class="col-lg-1 control-label">Address</label>
                                                                    <div class="col-lg-5">
                                                                        <input type="text" class="form-control" id="address" value="<?php echo $writer->address?>" placeholder="Enter Address">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <h3>Password</h3>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Old Password</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="password" class="form-control" id="oldPassword" placeholder="Enter Password">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">New Password</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="password" class="form-control" id="newPassword" placeholder="Enter Password">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Confirm Password</label>
                                                                    <div class="col-lg-9">
                                                                        <input type="password" class="form-control" id="newPasswordRepeat" placeholder="Enter Password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <h3>Other</h3>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Timezone</label>
                                                                    <div class="col-lg-9">
                                                                    <select data-placeholder="Select your Timezone" id="timezone" class="select-search">
							                            	<?php foreach($timezone as $value):?>
															<?php if($writer->timezone == $value):?>
							                                <option selected value="<?php echo $value?>"><?php echo $value?></option>
															<?php else:?>
															<option value="<?php echo $value?>"><?php echo $value?></option>
															<?php endif?>
															<?php endforeach?>
							                            </select>   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-primary addPersonal">Save <i class="icon-arrow-right14 position-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /a legend -->

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="colored-tab3">
                                        <div class="col-md-12">

                                            <!-- Advanced legend -->
                                            <div class="form-horizontal">
                                                <div class="panel panel-flat">
                                                    <div class="panel-body">
                                                        <h3>Templates Options for Bids</h3>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Create Template</label>
                                                                    <div class="col-lg-9">
                                                                        <button type="submit" data-action="modal" data-toggle="modal" data-target="#createTemplate" class="btn btn-success">Create New Template<i class="icon-arrow-right14 position-right"></i></button>
                                                                    </div>
                                                                </div>
                                                                <?php foreach($template as $value):?>
                                                                <div class="panel panel-white">
                                                                    <div class="panel-heading">
                                                                        <h6 class="panel-title"><?php echo $value->name?></h6>

                                                                        <div class="heading-elements">
                                                                            <ul class="icons-list">
                                                                                <li>
                                                                                    <a class="getTemplate" href="#" data-action="modal" data-toggle="modal" data-id="<?php echo $value->id ?>" data-target="#editTemplate" data-popup="tooltip" title="Edit"></a>
                                                                                </li>
                                                                                <li class="dropdown">
                                                                                    <a href="/api/writer/deleteTemplate/<?php echo $value->id?>" title="Remove"><i class="glyphicon glyphicon-remove"></i></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel-body">
                                                                        <p><?php echo $value->text?>.</p>
                                                                    </div>
                                                                </div>
                                                                <?php endforeach?>

                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /a legend -->

                                        </div>
                                    </div>

                                    <div class="tab-pane" id="colored-tab4">
                                        <div class="col-md-12">

                                            <!-- Advanced legend -->
                                            <form class="form-horizontal" action="#">
                                                <div class="panel panel-flat">
                                                    <div class="panel-body">
                                                        <h3>Notifications</h3>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Specify which notifications to Recieve</label>
                                                                    <div class="col-lg-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="control-success" checked="checked"> Success checkbox
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label"></label>
                                                                    <div class="col-lg-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="control-success" checked="checked"> Success checkbox
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label"></label>
                                                                    <div class="col-lg-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="control-success" checked="checked"> Success checkbox
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label"></label>
                                                                    <div class="col-lg-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="control-success" checked="checked"> Success checkbox
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label"></label>
                                                                    <div class="col-lg-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="control-success" checked="checked"> Success checkbox
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                        <h3>Settings</h3>
                                                        <fieldset>
                                                            <div class="collapse in" id="demo1">
                                                                <div class="form-group">
                                                                    <label class="col-lg-3 control-label">Recieve Notification of new Orders</label>
                                                                    <div class="col-lg-9">
                                                                        <div class="checkbox">
                                                                            <label>
                                                                                <input type="checkbox" class="control-success" checked="checked"> Success checkbox
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </fieldset>
                                                        <div class="text-right">
                                                            <button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- /a legend -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /settings modal -->
            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

    @include('dashboard.writer.footer')

    <script>
        $('.addQualification').on('click', function() {

            //	alert($('#type_id').val());
            var Data = new Object();
            Data.intro_short = $('#intro_short').val();
            Data.intro_long = $('#intro_long').val();
            Data.subject_id = $('#subject_id').val();
            Data.education = $('#education').val();
            Data.graduated = $('#graduated').val();
            Data.specialized = $('#specialized').val();
            Data.paper_type = $('#paper_type').val();
            Data.language = $('#language').val();
            Data._token = $('#token').val();

            $.ajax({
                url: '/api/writer/addQualification',
                data: Data,
                type: 'post',
                success: function(response) {

                    alert('successfull');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);

                }

            });

        });
    </script>

    <script>

      var file = '';
        var fileName = '';

        function readURL(input) {
            if (input.files && input.files[0]) {
                fileName = input.files[0].name;
                console.log(input.files[0].name);
                var reader = new FileReader();
                reader.onload = function(e) {
                    file = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('.addPersonal').on('click', function() {

            //	alert($('#type_id').val());
            var Data = new Object();
            Data.file = file;
            Data.fileName = fileName;
            Data.name = $('#name').val();
            Data.dob = $('.dob').val();
            Data.country = $('#country').val();
            Data.city = $('#city').val();
            Data.address = $('#address').val();
            Data.oldPassword = $('#oldPassword').val();
            Data.newPassword = $('#newPassword').val();
            Data.timezone = $('#timezone').val();
            Data._token = $('#token').val();
            if(!$('#name').val()){
                alert('enter name')
            }
            else if($('#newPassword').val() != $('#newPasswordRepeat').val()){
                alert('new password is not same as confirm password')
            }
            else{
                $.ajax({
                url: '/api/writer/addPersonal',
                data: Data,
                type: 'post',
                success: function(response) {

                    
                    if (response == 'success') {
                        alert('successfull ! Plaese Login again to see the timezone changes');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                    }
                    else{
                        alert(response);
                    }

                }

            });
            }

        });
    </script>


        <script>
        $('.createTemplate').on('click', function() {

            //	alert($('#type_id').val());
            var Data = new Object();
            Data.name = $('#templateName').val();
            Data.text = $('#templateText').val();
            Data._token = $('#token').val();

            $.ajax({
                url: '/api/writer/createTemplate',
                data: Data,
                type: 'post',
                success: function(response) {

                    alert('successfull');
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);

                }

            });

        });
    </script>
    <script>
            var data;
         var id;
$('.getTemplate').on('click',function(){
    id = $(this).data("id");
        var url = '/api/writer/getTemplate/'+id;

     $.ajax({
         url: url,
         success: function(response){
              data = response;
              $('#editTemplateName').val(data.name);
                $('#editTemplateText').val(data.text);
        
         }
            });
});
$('.updateTemplate').on('click', function() {

//	alert($('#type_id').val());
var Data = new Object();
Data.name = $('#editTemplateName').val();
Data.text = $('#editTemplateText').val();
Data._token = $('#token').val();

$.ajax({
    url: '/api/writer/updateTemplate/'+id,
    data: Data,
    type: 'post',
    success: function(response) {

        alert('successfull');
        setTimeout(() => {
            window.location.reload();
        }, 2000);

    }

});

});
    </script>

</body>

</html>