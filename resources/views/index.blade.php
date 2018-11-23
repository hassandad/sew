<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Subject Expert Writers</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Bootstrap 3 template for corporate business" />
        <!-- css -->
        <link href="/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />
        <link href="/css/cubeportfolio.min.css" rel="stylesheet" />
        <link href="/css/style.css" rel="stylesheet" />

        <!-- Theme skin -->
        <link id="t-colors" href="/skins/default.css" rel="stylesheet" />

        <!-- boxed bg -->
        <link id="bodybg" href="/bodybg/bg1.css" rel="stylesheet" type="text/css" />

        <!-- =======================================================
            Theme Name: Sailor
            Theme URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
            Author: BootstrapMade
            Author URL: https://bootstrapmade.com
        ======================================================= -->

    </head>
    <body>



        <div id="wrapper">
            <!-- start header -->
            <header>	
                <div class="navbar navbar-default navbar-static-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/"><img src="/img/logo.png" alt="" width="199" height="52" /></a>
                        </div>
                        <div class="navbar-collapse collapse ">
                            <ul class="nav navbar-nav">
                                <?php if (session('showUser')): ?>
                                    <div style="display: flex;align-items: center;justify-content: center;padding: 35px;">
                                        Welcome, <?php echo session('user')->username ?> 
                                        <a style="margin-left: 5px;" href='/logout'><button  class="btn">Logout</button></a>

                                        <?php if (session('user')->role == 1): ?>
                                            <a style="margin-left: 5px;" href='/dashboard/student/myOrder'>
                                                <button  class="btn">Dashboard</button></a>

                                        <?php elseif (session('user')->role == 2): ?>
                                            <a style="margin-left: 5px;" href='/dashboard/writer/myOrder'>
                                                <button  class="btn">Dashboard</button></a>

                                        <?php endif ?></div>

                                <?php else: ?>
                                    <li id="nav-login"></li>
                                <?php endif ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!-- end header -->
            <section id="featured" class="bg">
                <!-- start slider -->


                <!-- start slider -->
                <div class="col-lg-12 slidhead">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Slider -->
                            <div id="main-slider" class="main-slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img src="/img/slides/flexslider/1.jpg" alt="" />
                                        <div class="flex-caption">
                                            <h3>ACADEMIC WRITING WORKSPACE WORK DIRECTLY WITH EXPERTS</h3> 
                                            <a href="#" class="btn btn-theme btn-order">PLACE ORDER</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- end slider -->
                        </div>
                    </div>
                </div>	


            </section>
            <section id="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2>Why Should You<span class="highlight">Choose</span>Us?</h2>					
                            </div>
                        </div>		
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/highq.png"/>
                                            </div>
                                            <h4 class="chhead">HIGH QUALITY</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/lowprice.png"/>
                                            </div>
                                            <h4 class="chhead">LOW PRICES</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/plagiarism.png"/>
                                            </div>
                                            <h4 class="chhead">NO PLAGIARISM GUARANTEE</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-md-3 col-lg-3">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/no-int.png"/>
                                            </div>
                                            <h4 class="chhead">NO INTERMEDIARIES</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>					
                            </div>
                        </div>
                    </div>
                </div>

                <!-- parallax  -->
                <div id="parallax1" class="parallax text-light text-center marginbot50" data-stellar-background-ratio="0.5">	
                    <div class="container">
                        <div class="row appear stats">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="align-center color-white txt-shadow">
                                    <div class="icon">
                                        <img src="/img/writer-icon.png"/>
                                    </div>
                                    <strong id="counter-coffee" class="number">128</strong><br />
                                    <span class="text">Writers</span>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="align-center color-white txt-shadow">
                                    <div class="icon">
                                        <img src="/img/student.png"/>
                                    </div>
                                    <strong id="counter-music" class="number">345</strong><br />
                                    <span class="text">Students</span>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="align-center color-white txt-shadow">
                                    <div class="icon">
                                        <img src="/img/assign.png"/>
                                    </div>
                                    <strong id="counter-clock" class="number">1255</strong><br />
                                    <span class="text">Assignments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>		
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/moneyback.png"/>
                                            </div>
                                            <h4 class="chheads">MONEY BACK GUARANTEE</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4 featuresdiv">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/security.png"/>
                                            </div>
                                            <h4 class="chheads">PRIVACY AND SECURITY</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="box">
                                        <div class="aligncenter">								
                                            <div class="icon">
                                                <img src="/img/plagiarisms.png"/>
                                            </div>
                                            <h4 class="chheads">PLAGIARISM FREE</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placea</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- parallax  -->
                <div>	
                    <div>
                        <div>
                            <div class="container">
                                <div class="">
                                    <div class="col-lg-12">
                                        <div class="text-center">
                                            <h2 style="margin-bottom: 0px;">How it<span class="highlight">Works</span></h2>					
                                        </div>
                                    </div>		
                                </div>
                            </div>           		
                            <img src="/img/steps.png" style="width: 100%; margin-bottom: 0px;">
                            <div>
                                <div class="col-lg-6 text-center"><a style="width: 282px;margin-bottom: 25px;background: #6bb30d;color: #ffffff;border: 3px solid #247ce8;border-top: 0px;" href="#" class="btn btn-theme btn-order">PLACE ORDER</a></div>
                                <div class="col-lg-6 text-center"><a style="width: 282px;margin-bottom: 25px;background: #5e9c0c;color: #ffffff;border: 3px solid #247ce8;border-top: 0px;" href="#" class="btn btn-theme btn-order">BECOME A WRITER</a></div>
                            </div>
                        </div>

                    </div>
                </div>		
                <div class="container">
                    <div class="">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <h2 style="margin-bottom: 0px;">&nbsp</h2>					
                            </div>
                        </div>		
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-6 col-lg-6">
                                    <h2 class="text-center" style="margin-bottom: 15px;">Who<span class="highlight">We Are?</span></h2>	
                                    <p><strong>Meliore inciderint qui ne. Suas cotidieque vel ut lobortis reformidans duo</strong></p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae odit iste exercitationem praesentium deleniti nostrum laborum rem id nihil tempora. Adipisci ea commodi unde nam placeat cupiditate quasi a ducimus rem consequuntur ex eligendi minima voluptatem assumenda voluptas quidem sit maiores odio velit voluptate
                                    </p>
                                    <p>
                                        Mel explicari adipiscing consectetuer no, no mel apeirian scripserit repudiandae, ad assum mundi scribentur eam. Graecis offendit phaedrum eu his, eius ferri quidam eos ad, quis delenit vel ei. Alia modus facete te eos, eu tation appellantur per
                                    </p>
                                </div>
                                <div class="col-sm-6 col-lg-6">
                                    <h2 class="text-center" style="margin-bottom: 15px;">Our<span class="highlight">Progress</span></h2>	
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            40% Complete (success)
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            20% Complete
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            60% Complete (warning)
                                        </div>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            80% Complete
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <h2 class="text-center" style="margin-bottom: 0px;">Student's<span class="highlight">Reviews</span></h2>	
                                    <div class="testimonialslide clearfix flexslider">
                                        <ul class="slides">
                                            <li><blockquote>
                                                    Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri
                                                </blockquote>
                                                <h4>Daniel Dan <span>&#8213; MA System</span></h4> 
                                            </li>
                                            <li><blockquote>
                                                    Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri 
                                                </blockquote>
                                                <h4>Mark Wellbeck <span>&#8213; AC Software </span></h4>
                                            </li>	
                                        </ul>
                                    </div>					
                                </div>	

                                <div class="col-sm-6 col-md-6">
                                    <h2 class="text-center" style="margin-bottom: 0px;">Writer's<span class="highlight">Reviews</span></h2>	
                                    <div class="testimonialslide clearfix flexslider">
                                        <ul class="slides">
                                            <li><blockquote>
                                                    Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri
                                                </blockquote>
                                                <h4>Daniel Dan <span>&#8213; MA System</span></h4> 
                                            </li>
                                            <li><blockquote>
                                                    Usu ei porro deleniti similique, per no consetetur necessitatibus. Ut sed augue docendi alienum, ex oblique scaevola inciderint pri, unum movet cu cum. Et cum impedit epicuri 
                                                </blockquote>
                                                <h4>Mark Wellbeck <span>&#8213; AC Software </span></h4>
                                            </li>	
                                        </ul>
                                    </div>					
                                </div>					
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container help-tabs">
                    <div class="row">
                        <h2 class="text-center" style="margin-bottom: 0px;">Helpful<span class="highlight">links</span></h2>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#one" data-toggle="tab"><i class="icon-briefcase"></i> Essay Service</a></li>
                            <li><a href="#two" data-toggle="tab">Writing Service</a></li>
                            <li><a href="#tshree" data-toggle="tab">Research Paper Service</a></li>
                            <li><a href="#three" data-toggle="tab">Dissertation Service</a></li>
                            <li><a href="#four" data-toggle="tab">Coursework Service</a></li>
                            <li><a href="#five" data-toggle="tab">Case Study Service</a></li>
                            <li><a href="#six" data-toggle="tab">Thesis Service</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="one">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">500 Word</a></li>
                                        <li><a href="#" class="help-links">1000 Words</a></li>
                                        <li><a href="#" class="help-links">Analytical</a></li>
                                        <li><a href="#" class="help-links">APA</a></li>
                                        <li><a href="#" class="help-links">APA Paper</a></li>
                                        <li><a href="#" class="help-links">Creative</a></li>
                                        <li><a href="#" class="help-links">Editing</a></li>
                                        <li><a href="#" class="help-links">Proofreading</a></li>
                                        <li><a href="#" class="help-links">Formatting</a></li>
                                        <li><a href="#" class="help-links">Literary</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">MLA</a></li>
                                        <li><a href="#" class="help-links">Narrative</a></li>
                                        <li><a href="#" class="help-links">Descriptive</a></li>									
                                        <li><a href="#" class="help-links">Profile</a></li>
                                        <li><a href="#" class="help-links">Informative</a></li>
                                        <li><a href="#" class="help-links">Opinion</a></li>
                                        <li><a href="#" class="help-links">Reflective</a></li>
                                        <li><a href="#" class="help-links">Definition</a></li>
                                        <li><a href="#" class="help-links">Rhetorical Analysis</a></li>
                                        <li><a href="#" class="help-links">Introduction</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">College</a></li>
                                        <li><a href="#" class="help-links">Generic</a></li>
                                        <li><a href="#" class="help-links">Short</a></li>
                                        <li><a href="#" class="help-links">Compare and Contrast</a></li>
                                        <li><a href="#" class="help-links">Critical</a></li>
                                        <li><a href="#" class="help-links">Personal</a></li>									
                                        <li><a href="#" class="help-links">Persuasive</a></li>
                                        <li><a href="#" class="help-links">Writing Synthesis</a></li>
                                        <li><a href="#" class="help-links">Argumentative</a></li>
                                        <li><a href="#" class="help-links">Expository</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">College Application</a></li>
                                        <li><a href="#" class="help-links">Essay Help</a></li>
                                        <li><a href="#" class="help-links">Writing Service</a></li>
                                        <li><a href="#" class="help-links">Write my Essay</a></li>
                                        <li><a href="#" class="help-links">Writing an Essay</a></li>
                                        <li><a href="#" class="help-links">Scholarship</a></li>
                                        <li><a href="#" class="help-links">Synthesis</a></li>
                                        <li><a href="#" class="help-links">IELTS Homework</a></li>
                                    </ul>
                                </div>																								
                            </div>
                            <div class="tab-pane" id="two">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Best Resume</a></li>
                                        <li><a href="#" class="help-links">Write my Paper</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">College Paper</a></li>									
                                        <li><a href="#" class="help-links">Paper Writing Service</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Typing Assignments</a></li>
                                        <li><a href="#" class="help-links">Do my Assignment</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Do my Essay</a></li>
                                        <li><a href="#" class="help-links">Writing Assignments</a></li>
                                    </ul>
                                </div>																														
                            </div>
                            <div class="tab-pane" id="tshree">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Custom Paper</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Research Proposal</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Research Summary</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Writing a Research Paper</a></li>
                                    </ul>
                                </div>	
                            </div>
                            <div class="tab-pane" id="three">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Dissertation Abstracts</a></li>
                                        <li><a href="#" class="help-links">Dissertation Conclusion</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Dissertation Editing Services</a></li>
                                        <li><a href="#" class="help-links">Dissertation Introduction</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Dissertation Methodology</a></li>
                                        <li><a href="#" class="help-links">Dissertation Writing Services</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Dissertation Help</a></li>
                                    </ul>
                                </div>
                            </div>							
                            <div class="tab-pane" id="four">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Coursework Definition</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Coursework Examples</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Courseworks</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">How to Write a Coursework</a></li>
                                    </ul>
                                </div>	
                            </div>	
                            <div class="tab-pane" id="five">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Case Study Analysis</a></li>
                                        <li><a href="#" class="help-links">Case Study Definition</a></li>
                                        <li><a href="#" class="help-links">Case Study Examples</a></li>						
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Case Study Format</a></li>										
                                        <li><a href="#" class="help-links">Case Study Interview</a></li>
                                        <li><a href="#" class="help-links">Case Study Method</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Case Study Research</a></li>
                                        <li><a href="#" class="help-links">Case Study Template</a></li>									
                                        <li><a href="#" class="help-links">Case Study Topics</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Case Study</a></li>
                                        <li><a href="#" class="help-links">Sample Case Study</a></li>
                                        <li><a href="#" class="help-links">Schizophrenia</a></li>								
                                    </ul>
                                </div>																									
                            </div>
                            <div class="tab-pane" id="six">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">How to Make a Thesis</a></li>
                                        <li><a href="#" class="help-links">How to Start a Thesis</a></li>
                                        <li><a href="#" class="help-links">Thesis Generator</a></li>
                                        <li><a href="#" class="help-links">Thesis Conclusion</a></li>						
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Thesis Methodology</a></li>										
                                        <li><a href="#" class="help-links">What is a Thesis</a></li>
                                        <li><a href="#" class="help-links">Thesis Definition</a></li>
                                        <li><a href="#" class="help-links">Thesis Format</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Thesis Help</a></li>
                                        <li><a href="#" class="help-links">Thesis Proposal</a></li>									
                                        <li><a href="#" class="help-links">Thesis Theme</a></li>
                                        <li><a href="#" class="help-links">Thesis Topics</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Writing a Thesis</a></li>						
                                    </ul>
                                </div>
                            </div>
                        </div>		
                    </div>
                </div>	
                <div class="container help-tabs">
                    <div class="row">
                        <ul class="nav nav-tabs">
                            <li><a href="#seven" data-toggle="tab">By Citation Style</a></li>
                            <li><a href="#eight" data-toggle="tab">Additional Services</a></li>
                            <li><a href="#nine" data-toggle="tab">By Subject</a></li>
                            <li><a href="#ten" data-toggle="tab">Homework Help</a></li>
                            <li><a href="#eleven" data-toggle="tab">Essay Topics</a></li>
                            <li><a href="#twelve" data-toggle="tab">CV</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="seven">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">MLA Paper</a></li>
                                        <li><a href="#" class="help-links">ASA paper</a></li>						
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">CMS paper</a></li>						
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">CSE paper</a></li>						
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Turabian paper</a></li>						
                                    </ul>
                                </div>																								
                            </div>
                            <div class="tab-pane" id="eight">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Book Report</a></li>
                                        <li><a href="#" class="help-links">Book Reviews</a></li>									
                                        <li><a href="#" class="help-links">Business Plan</a></li>
                                        <li><a href="#" class="help-links">Cover Letter</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Creative Writing</a></li>
                                        <li><a href="#" class="help-links">Grant Proposal</a></li>									
                                        <li><a href="#" class="help-links">Critique an Article</a></li>
                                        <li><a href="#" class="help-links">Reaction Paper</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Write a Speech</a></li>
                                        <li><a href="#" class="help-links">Lab Report</a></li>									
                                        <li><a href="#" class="help-links">Peer Reviewed Articles</a></li>
                                        <li><a href="#" class="help-links">Personal Statement</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Powerpoint Presentation</a></li>
                                        <li><a href="#" class="help-links">Term Paper</a></li>									
                                        <li><a href="#" class="help-links">Capstone Project</a></li>
                                        <li><a href="#" class="help-links">Annotated Bibliography</a></li>									
                                    </ul>
                                </div>																								
                            </div>
                            <div class="tab-pane" id="nine">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Accounting Paper</a></li>
                                        <li><a href="#" class="help-links">Anthropology Paper</a></li>
                                        <li><a href="#" class="help-links">Archaeology Papers</a></li>
                                        <li><a href="#" class="help-links">Art History Paper</a></li>
                                        <li><a href="#" class="help-links">Aviation Papers</a></li>
                                        <li><a href="#" class="help-links">Biology Paper</a></li>
                                        <li><a href="#" class="help-links">Botany Papers</a></li>
                                        <li><a href="#" class="help-links">Business Paper</a></li>
                                        <li><a href="#" class="help-links">Chemistry Paper</a></li>
                                        <li><a href="#" class="help-links">Civics Papers</a></li>									
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Communications Papers</a></li>
                                        <li><a href="#" class="help-links">Criminal Justice Papers</a></li>
                                        <li><a href="#" class="help-links">Criminology Papers</a></li>
                                        <li><a href="#" class="help-links">Economics Paper</a></li>
                                        <li><a href="#" class="help-links">Education Paper</a></li>
                                        <li><a href="#" class="help-links">Engineering Paper</a></li>
                                        <li><a href="#" class="help-links">English Paper</a></li>
                                        <li><a href="#" class="help-links">Geography Paper</a></li>
                                        <li><a href="#" class="help-links">Geology Papers</a></li>
                                        <li><a href="#" class="help-links">Health Papers</a></li>					
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">History Paper</a></li>
                                        <li><a href="#" class="help-links">Philosophy Paper</a></li>
                                        <li><a href="#" class="help-links">Humanities Paper</a></li>
                                        <li><a href="#" class="help-links">Journalism Papers</a></li>
                                        <li><a href="#" class="help-links">Nursing Papers</a></li>
                                        <li><a href="#" class="help-links">Physics Papers</a></li>
                                        <li><a href="#" class="help-links">Politics Papers</a></li>
                                        <li><a href="#" class="help-links">Psychology Paper</a></li>
                                        <li><a href="#" class="help-links">Religious Studies</a></li>
                                        <li><a href="#" class="help-links">Science Paper</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Social Studies Papers</a></li>
                                        <li><a href="#" class="help-links">Environmental Science Papers</a></li>
                                        <li><a href="#" class="help-links">Urban Studies Papers</a></li>
                                        <li><a href="#" class="help-links">Cognitive Science Papers</a></li>
                                        <li><a href="#" class="help-links">Computer Science Papers</a></li>
                                        <li><a href="#" class="help-links">Sociology Paper</a></li>
                                        <li><a href="#" class="help-links">Marketing Paper</a></li>
                                        <li><a href="#" class="help-links">Drama Papers</a></li>
                                    </ul>
                                </div>	
                            </div>
                            <div class="tab-pane" id="ten">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Homework Help</a></li>
                                    </ul>
                                </div>	
                            </div>
                            <div class="tab-pane" id="eleven">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Essay Topics</a></li>
                                    </ul>
                                </div>	
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Narrative Essay Topics</a></li>
                                    </ul>
                                </div>									
                            </div>
                            <div class="tab-pane" id="twelve">
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">CV Format</a></li>
                                        <li><a href="#" class="help-links">CV Layout</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">CV Letter</a></li>
                                        <li><a href="#" class="help-links">CV Resume</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">Sample CV</a></li>
                                        <li><a href="#" class="help-links">CV Cover Letter</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3">
                                    <ul>
                                        <li><a href="#" class="help-links">CV Design</a></li>
                                        <li><a href="#" class="help-links">CV Example</a></li>
                                    </ul>
                                </div>																								
                            </div>
                        </div>						
                    </div>			
                </div>
        </div>				
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>Main</h4>
                        <ul class="link-list">
                            <li><a href="#">Place an order</a></li>
                            <li><a href="#">Authors Rating</a></li>
                            <li><a href="#">Latest orders</a></li>
                            <li><a href="#">Rules</a></li>
                            <li><a href="#">Privacy Policy</a></li>						
                            <li><a href="#">Affiliate program</a></li>
                            <li><a href="#">Become a writer</a></li>
                            <li><a href="#">Reviews</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>Students</h4>
                        <ul class="link-list">
                            <li><a href="#">MLA Essay</a></li>
                            <li><a href="#">College Essays</a></li>
                            <li><a href="#">Essay Help</a></li>
                            <li><a href="#">Essay Writing Service</a></li>
                            <li><a href="#">Write my Essay</a></li>
                            <li><a href="#">Paper Writing Service</a></li>
                            <li><a href="#">Write my Paper</a></li>
                            <li><a href="#">Accounting Paper</a></li>  
                            <li><a href="#">Business Paper</a></li>                                        
                        </ul>
                    </div>

                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>&nbsp</h4>
                        <ul class="link-list">
                            <li><a href="#">Engineering Paper</a></li>
                            <li><a href="#">Homework Help</a></li>
                            <li><a href="#">Essay Topics</a></li>
                            <li><a href="#">How to start an essay</a></li>
                            <li><a href="#">Business plan</a></li>
                            <li><a href="#">Argumentative essay topics</a></li>
                            <li><a href="#">Persuasive essay topics</a></li>
                            <li><a href="#">Compare and contrast essay topics</a></li>
                            <li><a href="#">Narrative essay topics</a></li>                        
                        </ul>
                    </div>

                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="widget">
                        <h4>&nbsp</h4>
                        <ul class="link-list">					
                            <li><a href="#">Definition essay topics</a></li>
                            <li><a href="#">Informative essay topics</a></li>
                            <li><a href="#">Persuasive essay topics</a></li>
                            <li><a href="#">Argumentative essay topics</a></li>
                            <li><a href="#">Expository essay topics</a></li>
                        </ul>
                    </div>				
                </div>
            </div>
        </div>
        <div id="sub-footer">
            <div class="container">
                <div>
                    <div class="col-lg-8">
                        <div class="copyright">
                            <p>&copy; Subject Expert Writers - All Right Reserved <span><i class="fa fa-phone"></i> 0300-123-4567</span><span><i class="fa fa-envelope"></i> support@subjectexpertwriters.com</span></p>
                        </div>
                    </div>

                    <!-- clients -->
                    <div class="container">
                        <div class="col-lg-4" style="float: right;">

                            <div class="col-md-3 client">
                                <img alt="logo" src="/img/clients/logo1a.png" class="img-responsive" />
                            </div>											

                            <div class="col-md-3 client">
                                <img alt="logo" src="/img/clients/logo2a.png" class="img-responsive" />
                            </div>											

                            <div class="col-md-3 client">
                                <img alt="logo" src="/img/clients/logo3a.png" class="img-responsive" />
                            </div>											

                            <div class="col-md-3 client">
                                <img alt="logo" src="/img/clients/logo4a.png" class="img-responsive" />
                            </div>									
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.min.js"></script>
<script src="/js/modernizr.custom.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/plugins/flexslider/jquery.flexslider-min.js"></script>
<script src="/plugins/flexslider/flexslider.config.js"></script>
<script src="/js/jquery.appear.js"></script>
<script src="/js/stellar.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/uisearch.js"></script>
<script src="/js/jquery.cubeportfolio.min.js"></script>
<script src="/js/google-code-prettify/prettify.js"></script>
<script src="/js/animate.js"></script>
<script src="/js/custom.js"></script>
<script src='/dist/navLogin.js'></script>


</body>
</html>