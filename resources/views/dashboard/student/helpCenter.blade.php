<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Help Center</title>

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

    <script type="text/javascript" src="/writer/assets/js/core/app.js"></script>
    <script type="text/javascript" src="/writer/assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->
    <!-- /theme JS files -->
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        
        th,
        td {
            padding: 5px;
            text-align: left;
        }
    </style>
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
                    <!-- Content area -->
                    <div class="content">

                        <!-- Detached sidebar -->
                        <div class="sidebar-detached col-md-3">
                            <div class="sidebar sidebar-default sidebar-separate" style="width:100%;padding-right:0px;">
                                <div class="sidebar-content">

                                    <!-- Topics -->
                                    <div class="sidebar-category">
                                        <div class="category-title">
                                            <h2>Help</h2>
                                            <ul class="icons-list">
                                            </ul>
                                        </div>

                                        <div class="category-content">
                                            <ul class="media-list">
                                                <a id="about">
                                                    <li class="media">
                                                        <div class="media-left">
                                                            <span class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-certificate"></i></span>
                                                        </div>

                                                        <div class="media-body">
                                                            <span class="text-semibold">About</span>
                                                        </div>
                                                    </li>
                                                </a>
                                                <br>
                                                <a id="policy">
                                                    <li class="media">
                                                        <div class="media-left">
                                                            <span class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-file-text"></i></span>
                                                        </div>

                                                        <div class="media-body">
                                                            <span class="text-semibold">Policy</span>
                                                        </div>
                                                    </li>
                                                </a>
                                                <br>
                                                <a id="privacyPolicy">
                                                    <li class="media">
                                                        <div class="media-left">
                                                            <span class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-shield-check"></i></span>
                                                        </div>

                                                        <div class="media-body">
                                                            <span class="text-semibold">Privacy Policy</span>
                                                        </div>
                                                    </li>
                                                </a>
                                                <br>
                                                <a id="userAgreement">
                                                    <li class="media">
                                                        <div class="media-left">
                                                            <span class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-file-check2"></i></span>
                                                        </div>

                                                        <div class="media-body">
                                                            <span class="text-semibold">User Agreemnet</span>
                                                        </div>
                                                    </li>
                                                </a>
                                                <br>
                                                <a id="penalties">
                                                    <li class="media">
                                                        <div class="media-left">
                                                            <span class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-user-plus"></i></span>
                                                        </div>

                                                        <div class="media-body">
                                                            <span class="text-semibold">Penalties</span>
                                                        </div>
                                                    </li>
                                                </a>
                                                <br>
                                                <a id="faq">
                                                    <li class="media">
                                                        <div class="media-left">
                                                            <span class="btn border-info text-info btn-flat btn-rounded btn-icon btn-sm"><i class="icon-question4"></i></span>
                                                        </div>

                                                        <div class="media-body">
                                                            <span class="text-semibold">FAQ</span>
                                                        </div>
                                                    </li>
                                                </a>

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

                                <div class="panel panel-bordered" id="aboutText">
                                    <div class="panel-heading bg-indigo-400 ">
                                        <h1 class="panel-title">About Our Project</h1>
                                        <div class="heading-elements">

                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-md-10">
                                            <p><b>Subject Expert Writers</b> is an online academic exchange platform for those who need Term Papers, Essays, Thesis Papers, Dissertations, and other academic works. You can search for assignments yourself. Students and Writers can communicate directly, without intermediaries.</p>
                                            <p>Every day we have thousands of new orders in all academic disciplines and sciences. All the work on <b>Subject Expert Writers</b> happens online: users can discuss the specifics of their assignment in their personal chat. This substantially helps to lower the cost of the assignment.</p>
                                            <p>The basic principle of <b>Subject Expert Writers</b> is to provide the highest quality of work in the shortest amount of time, and with minimal costs. We provide 20-day warranty for students to check and review their works. Only after the assignment is accepted by the Student, the Writer will be able to collect payment. In addition to the Student checking the quality of the assignment, the assignment is also tested for originality in anti-plagiarism software.</p>
                                            <p>We offer fast and simple solutions when making payments or withdrawing funds. We use payment systems such as: PayPal, Payoneer etc. This is done for your convenience and for the safety of your funds.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-bordered" id="policyText">
                                    <div class="panel-heading bg-indigo-400 ">
                                        <h1 class="panel-title">Policy</h1>
                                        <div class="heading-elements">

                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <h1>Rules</h1>
                                            <p>Work in our system is simple and convenient. All you need to do is to follow a few rules:</p>
                                            <p><b>1</b>. When filling out the questionnaire, the Writer must indicate only true and reliable information. If the contact information is incorrect or untrue, the profile will be blocked.</p>
                                            <p><b>2</b>. Communication between Writers and Students may only happen on the pages of <b>Subject Expert Writers</b>. Do not exchange contact information (e-mail address, Skype id, phone numbers, etc.). If there are any such attempts of contact information being transferred, the administration will block the user's account.</p>
                                            <p><b>3</b>. Student can download the finished work on the website on in the section "My Orders" or on the order page.</p>
                                            <p><b>4</b>. In carrying out an order, a Writer must comply with the time limits and provide the assignment in accordance with the Student's instructions. Students and Writers are able to chat on the assignment pages for one month after the assignment has been closed.</p>
                                            <p><b>6</b>. In situations, where the Writer has made a financial or reputational damage, the Students may place these Writers in their blacklists. This is possible when the Writer has repeatedly violated rules, or the Student's instructions and/or the rules administered by the Service Administration; broke the assignment deadlines, and refused to make correction (within 3 days); or provided assignments with high plagiarism rate. If a Writer has systematically violated the rules and provided substandard work, the Administration has the rights to reset the rating of the Writer, or block their account.</p>
                                            <p><b>7</b>. The Writers are strictly forbidden to use exceptionally internet-portals as their source of work to substitute other literature. It is also forbidden to use any services offering academic services and/or completed assignments. E-books and company websites can constitute no more than 30% of all sources in the assignment.</p>
                                            <p><b>8</b>. Payments (withdrawal of funds from a personal account) are processed by the Administration manually on weekdays during working hours. After payment fees are transferred, the transfer of copyright for the work is also conducted. This prohibits the Writer to claim or publicize authorship of the assignment.</p>
                                            <p><b>9</b>. The final version of the assignment should be uploaded in the format requested by the Student, following all the instructions and the requirements of the Student.</p>
                                            <p><b>10</b>. If the Student has requested a refund for the work of inappropriate quality, our Service undertakes the privileges to provide the Writer with the requirements. In case, if the situation cannot be resolved by mutual agreement, the service may involve independent experts to measure the quality of the assignment performed by the Writer (the dispute of a situation can take up to 5 working days).</p>
                                            <p>A 100% refund for the Student is made in the following cases:</p>
                                            <p style="margin-left:30px"> - The Writer does not upload the final version of the assignment before the deadline.
                                                <p style="margin-left:30px"> - There are technical means of plagiarism deception (for example, the use of synonymizing or invisible characters).</p>
                                                <p style="margin-left:30px"> - The work has not been carried out for the correct topic set by the Student (if such is stated, then the Student is required to give an explanation and give specific examples).</p>
                                                <p>A partial refund (up to 90%) is given to the Student if a Writer uploads the assignment, but refuses to provide requested corrections (the Student must explain, what percentage of work has not been completed by the Writer).
                                                    <p>
                                                        <p>After consideration of the complaint and making a decision on a refund to the Student, Administration shall refund the money to Student within 10 working days.</p>
                                                        <p>The Administration has a right to decline a Student’s request for a refund if he or she didn’t request any corrections, before demanding a refund. If the Writer is consistently online, and is ready to make corrections, the Student must send the work for adjustments at least once.</p>
                                                        <p><b>11</b>. The Administration is the final seller and appears responsible for a refund to the customer.</p>
                                                        <p><b>12</b>. If there are any disputes about the quality of the assignment, all payments will be suspended until the dispute is resolved.</p>
                                                        <p><b>13</b>. The Service has the right to use punitive sanctions on the Writers if they violate deadlines, have inconsistencies in the completed assignment, or not following the instructions provided by the Student.</p>
                                                        <p><b>14</b>. The Writer must confirm the start of work on the assignment within a specific period of time, or the assignment will be returned to the auction. In this case, the Writer's rating will be reduced. Users may only pay for the assignments using the options provided by http://<b>Subject Expert Writers</b>.com. Do not conduct an exchange of payments outside the site (online wallets, bank cards, mobile phones, etc.). The identification of such attempts to exchange contacts, will force the administration to block users&rsquo; accounts and disclaim any warranty obligations on orders.</p>
                                                        <p>By working on <b>Subject Expert Writers</b>, you hereby confirm that you are familiar with the rules of the Service.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-bordered" id="privacyPolicyText">
                                    <div class="panel-heading bg-indigo-400 ">
                                        <h1 class="panel-title">Privacy Policy</h1>
                                        <div class="heading-elements">

                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <p><b>Subject Expert Writers</b> (“Site”) has always been committed to maintaining the accuracy, confidentiality, and security of your personal and corporate information.</p>
                                            <p>Site does not sell, share or distribute Customer Information to any third party organization.</p>
                                            <p><b> 1. Information we may collect from you as you browse our website</b></p>
                                            <p>Once our website is opened by you in a browser on a device, the following information begins to be automatically obtained:</p>
                                            <p style="margin-left:30px">1. Your name, address, e-mail address and phone number(s).</p>
                                            <p style="margin-left:30px">2. Your credit or debit card number and expiry date.</p>
                                            <p style="margin-left:30px">3. Details of orders you place through the Site and of the fulfillment of your orders.</p>
                                            <p style="margin-left:30px">4. Records of correspondence (including any further information we may request from you) when you contact us to request information, report a problem, or provide feedback on our services.</p>
                                            <p style="margin-left:30px">5. Standard information automatically collected by our web server including your IP address. Further details are set out in paragraph 5 below.</p>
                                            <p style="margin-left:30px">6. Details of your visits to our site, including access time.</p>
                                            <p>As is true of most websites, we gather certain information automatically and store it in log files. This information may include Internet protocol (IP) addresses, cookies, browser type, Internet service provider (ISP), referring/exit pages, operating system, date/time stamp, and/or clickstream data. We link this automatically collected data to other information we collect about you</p>
                                            <p>Customer information used only for the purpose for which it was collected unless the customer has otherwise consented, or when it is required or permitted by law.</p>
                                            <p>Customer information will be maintained in as accurate, complete and up-to-date form as is necessary to fulfill the purposes for which it is to be used.</p>
                                            <p>Site is responsible for maintaining and protecting customer information under its control.</p>
                                            <p><b> 2. How we use your information</b></p>
                                            <p>We never sell, rent or share any of your Information (except anonymous aggregate information) with any third party. We only use the Information you provide as follows:</p>
                                            <p style="margin-left:30px">1. to provide you with the services that you wish to use;</p>
                                            <p style="margin-left:30px">2. for internal record keeping, billing, accounting and market research purposes;</p>
                                            <p style="margin-left:30px">3. to respond to any queries, complaints or requests for further information;</p>
                                            <p style="margin-left:30px">4. to improve the content of our Site;</p>
                                            <p style="margin-left:30px">5. to customize the content and/or layout of page on our Site;</p>
                                            <p style="margin-left:30px">6. to notify you about important functionality changes and alterations to the Site (including changes to this Privacy Policy and/or the Terms of Use), and to provide you with information about our services.</p>
                                            <p>If you are an existing customer, we will only contact you by electronic means (e-mail or SMS) with information about goods and services similar to those which were the subject of a previous sale to you.</p>
                                            <p>Except as set out above we will not sell, distribute or disclose your Information without your consent, unless required or permitted to do so by law such as to comply with a subpoena, or similar legal process or when we believe in good faith that disclosure is necessary to protect our rights, protect your safety or the safety of others, investigate fraud, or respond to a government request.</p>
                                            <p><b>3. User Access and Choice</b></p>
                                            <p>If your personal information changes, or if you no longer desire our service, you may correct, update, amend, delete/remove or deactivate it by contacting our Customer Support by email or phone at the contacts listed on our Contact Us page.</p>
                                            <p>We will retain your information for as long as your account is active or as needed to provide you services. We will retain and use your information as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements.</p>
                                            <p><b>4. Changes to Privacy Policy & Future developments.</b></p>
                                            <p>We continually improve and update our website to enhance your experience. As a result, our policies continue to evolve. As we implement new technology and provide new services, we update our Privacy Policy accordingly. We encourage you to refer to this page on an ongoing basis for our most current policy and practices.</p>
                                            <p>From time to time, we may use your information for new, unanticipated uses not previously disclosed in our privacy policy. If our information practices change at any time in the future, we will post the policy changes on this page. If we make any material changes we will notify you by means of a notice on this Site prior to the change becoming effective.</p>
                                            <p>If you are concerned about how your information is used, you must check this page from time to time. We only use data collected from the time of the policy change onwards, for any new purposes put into place.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-bordered" id="userAgreementText">
                                    <div class="panel-heading bg-indigo-400 ">
                                        <h1 class="panel-title">User Agreement</h1>
                                        <div class="heading-elements">

                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <p>These Terms and Conditions ("Agreement") are a legally binding agreement between the user ("Customer" or "Writer", both “Users”) of the <b>Subject Expert Writers</b> Services described herein and EDUTEC LIMITED, a Malta company, registered number C 69533, with its principal office at Angelica Court No 4, Giuseppe Cali Street, Ta Xbiex, XBX 1425, Malta ("<b>Subject Expert Writers</b>", "Web platform").</p>
                                            <p>Please make sure you fully understand the contents of this Agreement. If you have any doubts about any of your rights and obligations resulting from your acceptance of this Agreement, please consult us or obtain legal support.</p>
                                            <p>BY PLACING AN ASSIGNMENT ON THIS WEB PLATFORM THE WRITER OR THE CUSTOMER ACKNOWLEDGE HAVING READ, UNDERSTOOD, AGREED TO ALL THESE TERMS AND CONDITIONS AND AGREE TO BE LEGALLY BOUND BY THESE TERMS AND CONDITIONS.</p>
                                            <p><b>In this Agreement:</b></p>
                                            <p><b>“Writer”</b> means an individual registered on the web platform <b>Subject Expert Writers</b> with the account classified as the “Writer” for receiving the Orders from the Customer.</p>
                                            <p>“<b>Customer”</b> means an individual registered on the web platform <b>Subject Expert Writers</b> with the account classified as the “Customer” for receiving the Assignments from the Writers.</p>
                                            <p><b>“Credit”</b> means the funds available for use in the user’s account.</p>
                                            <p><b>“Bonus credit”</b> means the funds added to Customer’s account by <b>Subject Expert Writers</b> without any charges. Web platform <b>Subject Expert Writers</b> may grant Bonus credit to a Customer at its sole discretion.</p>
                                            <p>“<b>Subject Expert Writers</b>” or <b>“web platform”</b> means the web platform located at the address </b>https://sew.com/.</b>
                                            </p>
                                            <p><b>“Commission”</b> means the fee <b>Subject Expert Writers</b> charges for the Services. The services include but are not limited to ensuring security of the transactions, technical maintenance of the file servers and web platform, and customer support. <b>Subject Expert Writers</b> charges the following commission fees:</p>
                                            <p><b>“Service fee”</b>, which means a commission fee paid by a Customer, calculated as follows:</p>
                                            <p>for Writer's offers up to $14.99 - 40% commission;</p>
                                            <p>For Writer's offers between $15 to $29.99 - 35% commission;</p>
                                            <p>For Writer's offers between $30 to $49.99 - 32% commission;</p>
                                            <p>For Writer’s offers of $50 and above - 28% commission;</p>
                                            <p><b>“Writer's commission”</b>, which is paid by the Writer, and the amount of which is based on the Writer's semi-annual income, recalculated at the beginning of each month.</p>
                                            <p>With semi-annual income below 1000 USD – 26%;</p>
                                            <p>With semi-annual income between 1000 USD and 3000 USD – 24%</p>
                                            <p>With semi-annual income between 3000 USD to 5000 USD- 22%;</p>
                                            <p>With semi-annual income between 5000 to 7000 USD - 20%;</p>
                                            <p>With semi-annual income between 7000 to 15000 USD - 18%;</p>
                                            <p>With semi-annual income between 15000 to 30000 USD - 16%;</p>
                                            <p>With semi-annual income above 30000 USD – 14%;
                                                <p/>
                                                <p><b>“Transaction fee”</b> means a payment to a payment institution. Transaction fee is charged by <b>Subject Expert Writers</b> for withdrawal of funds through that payment institution, in accordance with the section 6 of this Agreement.</p>
                                                <p><b>“Assignment”</b> means the product of the intellectual work published or provided by a Writer through <b>Subject Expert Writers</b>.</p>
                                                <p><b>“Copyright”</b> means the legal right for use and distribution of an Assignment, which is transferred from a Writer to a Customer at the stage, where the Customer with intent of commercial or private usage accepts the Assignment. A Customer accepts and does not deny a Writer’s authorship, and the Writer’s right to use their name in the document</p>
                                                <p><b>“Services”</b> means the marketing services provided by <b>Subject Expert Writers</b> for users to organize their interaction on the web platform for the purposes of ordering Assignments on various thematic orientations (articles, materials, illustrations, written opinions, etc.), and providing online consulting on a given topic on the web platform.</p>
                                                <p><b>1. TERMS OF USE</b></p>
                                                <p>1.1 <b>Subject Expert Writers</b> provides Services for custom writing and reports, to be used for research and study assistance purposes only. Under no circumstances, the Assignments are to be plagiarized by submitting it as your own work.</p>
                                                <p>1.2 The following is prohibited on the web platform:</p>
                                                <p>1.2.1 The use of profanity, insults, spreading malware, discrimination of all types, insulting religious beliefs, the publication of materials that violate the rights of others (including plagiarism), and any other actions that are contrary to the laws of the United States and/or the Republic of Malta;</p>
                                                <p>1.2.2 The exchange of contact information between any users (including e-mail, skype id, telephone numbers, etc.) for communication outside the web platform.</p>
                                                <p>1.3 During registration, a Writer or a Customer must provide genuine accurate and complete information, as well as maintain this information up to date. If a user provides false information during registration on the web platform, and/or <b>Subject Expert Writers</b> has reasonable grounds to believe that the information given or provided by the Writer or the Customer is false, inaccurate, or incomplete, <b>Subject Expert Writers</b> has the discretion to refuse the Writer or the Customer in registration on the web platform; block; and/or remove such account.</p>
                                                <p>1.4 <b>Subject Expert Writers</b> has a right, at any time, in its sole discretion, to request a Writer or a Customer to provide confirmation of their personal information (for example, documents confirming identity of the user), specified by the Writer or the Customer during registration on the web platform. <b>Subject Expert Writers</b> has the right to have access to any information placed on the web platform, including any conversation and data in user account. <b>Subject Expert Writers</b> has а right to block or delete an account if the Writer or the Customer does not provide the requested information and/or supporting documents within 7 calendar days from <b>Subject Expert Writers</b>’s request.</p>
                                                <p>1.5 To access an account, a Writer or a Customer must enter the email address, and the password selected during registration on the web platform.</p>
                                                <p>1.6 Writers and Customers agree to protect the confidentiality of information used to access their account. Writers and Customers also agree to immediately notify <b>Subject Expert Writers</b> of unauthorized (carried out by a third party without consent) access to the account, using their email address and password, and/or of any other breach of (suspected of violating) confidentiality of the email address and password.</p>
                                                <p>1.7 <b>Subject Expert Writers</b> may, at its discretion and without giving a reason, block or delete the Writer’s or the Customer’s Account.</p>
                                                <p>1.8 А user agrees and acknowledges that the web platform is not a party to any agreements, arrangements and contractual relationships that may arise between users of the web platform; a user does not enter into an employment relationship with the web platform and is not an employee of <b>Subject Expert Writers</b>.</p>
                                                <p>1.9 Copyright for the Assignment is transferred from a Writer to a Customer when the status of an Assignment changes to 'Completed'. If the status of an Assignment changes to 'Completed' as a result of a full refund issued to a Customer, no transfer of copyright occurs.</p>
                                                <p><b>2 ASSIGNMENTS AND DELIVERY POLICY</b></p>
                                                <p>2.1 As a part of the Service, a Writer is obligated to fulfill the instructions specified by the Client. Instructions, which have been communicated to a Writer in the chat, take priority over the instructions posted in the "Instructions" section on the Assignment page; while the "Instructions" section takes priority over the instructions initially specified in the Assignment parameters (Description tab).</p>
                                                <p>2.2 The quality of the Assignment, provided by a Writer, must meet the requirements specified in the Assignment as well as the basic requirements for the Assignments communicated on the Rules page on <b>Subject Expert Writers</b> as set forth herein https://<b>Subject Expert Writers</b>.com/info/rules/.</p>
                                                <p>2.3 The Writer may not include information and materials, into the Assignment, from third-party sources, without adding a reference to the source of such information or materials. E-books and websites on the Internet, used as reference information and source materials must not constitute more than 30%, unless otherwise requested by the Customer.</p>
                                                <p>2.4 Assignments are delivered to a Customer as a link sent to their email in an automated message. A Customer must be logged into their <b>Subject Expert Writers</b> account in order to use the link. Delivery time is based on the deadline set by the Customer, with the minimum being within 12 hours. The clock for delivery starts at the time the Assignment is successfully accepted and paid.</p>
                                                <p>2.5 A Customer's instructions for the Assignment must be clear and precise. If such instructions are unclear and the Customer does not add the necessary instructions within required timeframe, such Assignment cannot be completed. In this case, a full refund will be issued in favor of a Customer upon their request, without any penalties for the Writer.</p>
                                                <p>2.6 Any revisions requested for an Assignment that is under warranty period must fall within the initial instructions for the Assignment. Any substantial changes to the initial instructions will be considered editing. Editing is an additional service – in this case a Writer may decline to carry out a revision, or offer their editing services for additional charges.</p>
                                                <p>2.7 The minimum possible deadline for any Assignment is 12 hours.</p>
                                                <p><b>3 PAYMENTS ON <b>Subject Expert Writers</b></b>
                                                </p>
                                                <p>3.1 The Customer will agree to make a payment for the Assignment (hereinafter referred to as Payment) in the amount agreed with the Writer. The total price for the Assignment, which includes the service fee, is communicated to a Customer after choosing a Writer, and before submitting a payment on <b>Subject Expert Writers</b>.
                                                    <p>
                                                        <p>3.2 The Customer can make a payment through the following payment institutions on the web platform: VISA or MasterCard,and PayPal.</p>
                                                        <p>3.3 The Customer transfers 100% of the amount due for the Assignments (the net price including the Service Fee) at the stage of hiring a Writer. Payment from <b>Subject Expert Writers</b> to a Writer shall be made within twenty (20) calendar days after the submission of a final paper by the Writer, in the absence of complaints, or revisions. In such cases when a Customer requests a refund less than 3 days before the warranty period for their Assignment expires, the warranty period may be extended to more than 20 days, upon the Customer's request.</p>
                                                        <p>3.4 The Customer and the Writer may not disclose payment information to other users. The Customer shall not make payments in any amount related to the preparation and completion of Assignment to the Writer, directly or indirectly, in any way other than through the methods provided by the web platform. <b>Subject Expert Writers</b> reserves a right to block or delete user's account, if that user has been attempting or intended to pay for such services outside <b>Subject Expert Writers</b>.</p>
                                                        <p>3.5 Bonus credit granted to any Customer do not have a real monetary equivalent outside the web platform, and thus, may only be used for purchasing Assignments on <b>Subject Expert Writers</b>. Withdrawal of the bonus credit to accounts outside <b>Subject Expert Writers</b> is prohibited. In case of a refund, the bonus credit will not be returned.</p>
                                                        <p>3.6 Bonus credit may only be used to pay for up to 50% of the combined total price of a single Assignment when hiring a Writer.</p>
                                                        <p>3.7 At the stage of payment for an Assignment, bonus credit is used automatically, thus requiring no additional actions from the User.</p>
                                                        <p><b>4 COMPLAINTS TO QUALITY OF ASSIGNMENTS</b></p>
                                                        <p>4.1 In case of Customer’s reasonable remarks and complaints about the quality of Assignment, the Customer shall be entitled to request necessary adjustments in the Assignment, to be conducted by the Writer, within a stated warranty period of twenty (20) calendar days after submission of the Assignment. If a User requests a revision for an Assignment, the status of that Assignment is changed to “In Revision”.</p>
                                                        <p>4.2 If necessary, a Customer may request corrections for an Assignment during the last days of the warranty period. In this case, the warranty period may be extended for up to 5 days. This process may be repeated any number of times if necessary.</p>
                                                        <p>4.3 A Writer has between 1 and 3 days to make any amendments or corrections to the Assignment while it’s in Revision. If a Customer is not satisfied with the product of the Writer’s revision, they may request additional revisions.</p>
                                                        <p>4.4. A Refund is an inherent part of the warranty Service. In order to request a refund for the Assignment, in cases such as violation of a deadline, inability of the Writer to communicate properly, or unsatisfactory quality of the Assignment at the end, the Customer must send a written complaint with a description of their problem, using the form located on the order page for an Assignment with ‘Under Warranty’ status.</p>
                                                        <p>4.5 In cases where a Customer accepts and completes the Assignment before the end of the warranty period, both a Writer and <b>Subject Expert Writers</b> are relieved of the warranty obligations. Thus, as soon as the status of an Assignment changes to ‘Completed’, the Writer has a right to decline carrying out a revision for the Assignment requested by the Customer.</p>
                                                        <p>4.6 A Writer, who uploads an Assignment on the web platform, confirms that they own copyright for uploaded Assignment, and are fully liable in case of copyright violation by third parties. An exclusive right to the Assignment, for which the Customer has paid remuneration, shall be transferred to the Customer as soon as the Assignment status changes to ‘Completed’.</p>
                                                        <p><b>5 ASSIGNMENT REFUND POLICY</b></p>
                                                        <p>5.1 The Customer’s claims for refund due to unsatisfactory quality of the Assignment are to be resolved through mutual agreement between the Customer and <b>Subject Expert Writers</b>. If it is impossible to resolve a dispute through negotiations, <b>Subject Expert Writers</b> has the right in its sole discretion to engage independent experts to assess the quality of the Assignment. The deadline for consideration of disputed situation should not exceed 5 business days.</p>
                                                        <p>5.2 Customer may request a refund if the Assignment has significant grammar or spelling errors, or clearly covers a different subject from the Assignment ordered in the initial instructions and description. Otherwise, all sales are final.</p>
                                                        <p>5.3 <b>Subject Expert Writers</b> reserves the right to refuse in Services to anyone suspected of misusing web platform, or participating in academic fraud, and reserves the right to cancel any Assignment at its own discretion under this policy.</p>
                                                        <p>5.4 <b>Subject Expert Writers</b> reserves the right to cancel an Assignment with any status, including completed Assignments, if there is enough evidence that the Assignment had been completed as a result of a fraudulent transaction. In such cases, all the funds acquired by users may be put on hold until requested by the genuine cardholder.</p>
                                                        <p>5.5 <b>Subject Expert Writers</b> issues a 100% refund to a Customer in the following cases:</p>
                                                        <p>5.5.1 a Writer does not upload the final version of the Assignment before the deadline, while the Customer does not accept the delayed paper. In cases when Customer accepts the delay by stating so in the conversation, by requesting a revision, or by admitting they have used the paper, the assignment is considered delayed and may be subject to a partial refund.></p>
                                                        <p>5.5.2 the Assignment is plagiarized, or contains signs of usage of technical means to bypass similarity detection software, including but not limited to usage of invisible characters and word spinning. A paper is classified as plagiarized, if it is possible to clearly identify a source or multiple sources used by a Writer, and these sources have not been cited properly.</p>
                                                        <p>5.5.3 the Assignment covers a topic that is completely different from the topic requested by the Customer.</p>
                                                        <p>5.5.4 quality of the Assignment is extremely poor, the Assignment contains high amount of errors, which makes that Assignment not revisable. Whether the quality of an Assignment is high enough for to be considered revisable, is determined by <b>Subject Expert Writers</b>.</p>
                                                        <p>5.5.5 a writer uploads the final paper that does not satisfy the initial instructions provided by the Customer to a major extent.</p>
                                                        <p>If <b>Subject Expert Writers</b> issues a 100% refund for an Assignment to a Customer, <b>Subject Expert Writers</b> also reimburses the Service fee.</p>
                                                        <p>5.6 <b>Subject Expert Writers</b> may issue a partial refund, split in any percentage between a Customer and a Writer if the Writer did upload the Assignment to the web platform, but did not act upon making corrections in the accordance with the Customer’s requirements. A partial refund may also be issued if a Writer uploads a paper of satisfactory quality, fulfilling all the critical instructions, but the paper contains minor errors and inconsistencies that can be properly corrected. <b>Subject Expert Writers</b> reserves a right to decline a refund to Customer, if that Customer had not previously requested a revision for this Assignment.</p>
                                                        <p>If <b>Subject Expert Writers</b> issues a partial refund for an Assignment to a Customer, the Service fee is not reimbursed</p>
                                                        <p>5.7 In all cases described in this Agreement, <b>Subject Expert Writers</b> issues refunds to a Customer’s account on the web platform.</p>
                                                        <p><b>6 SERVISE FEE REFUND POLICY</b></p>
                                                        <p>We provide paid Services. Users may discontinue their use of any Services at any time in accordance with this Agreement. The date and time of any cancelation of Services shall be the date and time on which a user stops using our Services. The Fees for the Services may not be refundable in whole or in part as they were provided by <b>Subject Expert Writers</b> to a user.
                                                            <p>
                                                                <p><b>7 DEPOSIT/WITHDRAWAL OF FUNDS, TRANSACTION FEE</b></p>
                                                                <p>7.1 Users on <b>Subject Expert Writers</b> may transfer credit from their <b>Subject Expert Writers</b> account to their personal bank account or debit/credit card using the payment methods provided on web platform. Such transfers are called Withdrawals. Users shouldn’t apply for the chargeback in order to withdraw credit from their <b>Subject Expert Writers</b> account to their personal account or debit/credit card.</p>
                                                                <p>7.2 A user withdrawing funds using one of the payment methods provided by <b>Subject Expert Writers</b> pays a transaction fee. The total amount of transaction fee is communicated directly to user on the withdrawal page, next to their chosen method for withdrawal, before withdrawal request is submitted.</p>
                                                                <p>7.3 A Customer may transfer funds into its <b>Subject Expert Writers</b> account for further usage on the Platform. In order to withdraw this credit, they may only use the methods provided by <b>Subject Expert Writers</b>.</p>
                                                                <p><b>8 INTELLECTUAL PROPERTY</b></p>
                                                                <p>8.1 An exclusive right to all intellectual property posted on the web platform (including the text, logo, images, code, sounds and videos) belongs to <b>Subject Expert Writers</b>.</p>
                                                                <p>8.2 Any Assignment completed and uploaded by a Writer on the web platform is an object of intellectual property. <b>Subject Expert Writers</b> shall not be entitled to use the Assignment hosted by the Writer, including the information and/or other materials for commercial purposes, or to transfer it to third parties outside the web platform.</p>
                                                                <p>8.3 The Writer and the Customer undertake not to download, not to publish, not to store, not to provide access to, or otherwise distribute the information and/or materials that violate rights of any third party. <b>Subject Expert Writers</b> does not take any responsibility for any violations of rights of third persons, caused by publication by user on the site of the Assignment of or other materials that violate rights of third persons.</p>
                                                                <p>8.4 Use of the web platform content is possible only within the framework functionality, the proposed Assignment or otherwise service the site. No elements of its services may be used, otherwise without the prior permission <b>Subject Expert Writers</b> or copyright holder.</p>
                                                                <p><b>9 DISCLAMER.</b></p>
                                                                <p>Except where prohibited by law, the Services and the web platform are provided “as-is” and “as available” and we expressly disclaim any warranties and conditions of any kind, whether express or implied, including the warranties or conditions of merchantability, fitness for a particular purpose, title, quiet enjoyment, accuracy, or non-infringement. We make no warranty that the Services or the web platform (a) will meet your requirements; (b) will be available on an uninterrupted, timely, secure, or error-free basis; or (c) will be accurate, reliable, free of viruses or other harmful code, complete, legal, or safe. We further make no warranties or representations regarding the accuracy or completeness of the content that was uploaded to the <b>Subject Expert Writers</b> by user as well as the quality of any product, services, information, and other materials, obtained by using the Web platform’ Services.
                                                                    <p>
                                                                        <p>Any information and/or materials (including downloadable, instructions, requirements and guidance, etc.), access to which the Writer and the Customer have by using the Web platform’s Services, the Writer and the Customer can use at their own risk and of their own responsibility for the possible consequences of the use of such information and/or materials.
                                                                            <p>
                                                                                <p><b>10 LIMITATION OF LIABILITY</b></p>
                                                                                <p>In no event shall <b>Subject Expert Writers</b>, its officers, directors, employees, or agents, be liable to you or to any third party for any direct, indirect, incidental, special, punitive, or consequential damages whatsoever arising from or related to either this Agreement, or use of the Services or the web platform. Our liability to you for any damages arising from or related to this Agreement, will at all times be limited to the greater of amount, as was deposited by the Customer in the web platform’s account (if any). The existence of more than one claim will not enlarge this limit. The foregoing limitation of liability shall apply to the fullest extent permitted by law in the applicable jurisdiction.</p>
                                                                                <p><b>11 FINAL PROVISIONS</b></p>
                                                                                <p>11.1 <b>Subject Expert Writers</b> has the right at any time without notification to the Writer or to the Customer to change the terms of this Agreement. The new wording of the Agreement shall be publish on the web platform.</p>
                                                                                <p>11.2 The Writer and the Customer are responsible for any risk resulted with the new wording of the agreement; when the Writer or the Customer continue to use the service after changes in the conditions of this Agreement is deemed with new wording. The new revised agreement shall enter into force from the date it was published on the web platform, as specified above.</p>
                                                                                <p>11.3 In the case of disagreement with any changes, as amended by <b>Subject Expert Writers</b> in the provisions of the present Agreement, the Writer or the Customer will be required to discontinue the use of the web platform.</p>
                                                                                <p>11.4 In the event of disputes arising in connection with the execution of this Agreement, <b>Subject Expert Writers</b> and the Writer or the Customer agree to make all efforts for the settlement of such disputes through negotiations. If they cannot resolve their differences through negotiation, they are to be settled in accordance with the legislation of the Republic of Malta.</p>
                                                                                <p><b>12 MISCELLANEOUS</b></p>
                                                                                <p>12.1 Languages. This Agreement is in the English language, which prevails over any translations of it to other languages, made by us and provided to you for your convenience, as applicable. The Service is designed in the English language and its translations into other languages may contain inaccuracies for which we shall not bear any responsibility; we suggest using the English version and resorting to versions in other languages only for references and at your own risk. You also agree to have all communications with us in English.</p>
                                                                                <p>12.2 No Waiver. No failure or delay by a party to exercise any right or remedy provided under this Agreement or by law shall constitute a waiver of that (or any other) right or remedy, nor preclude or restrict its further exercise. No single or partial exercise of such right or remedy shall preclude or restrict the further exercise of that (or any other) right or remedy; and will not be construed as a waiver of any subsequent breach or default under the same or any other provision of this Agreement.</p>
                                                                                <p>12.3 Other Jurisdictions. We make no representations that the Services or the web platform are appropriate or available for use in all locations. Those who access or use the Services or the web platform from jurisdictions prohibiting such use, do so at their own volition and are responsible for compliance with local law.</p>
                                                                                <p><b> 13 CONTACTS</b></p>
                                                                                <p>We are always available to be reached by phone at +1(855)407-77-28, or by e-mail at support@<b>Subject Expert Writers</b>.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-bordered" id="penaltiesText">
                                    <div class="panel-heading bg-indigo-400 ">
                                        <h1 class="panel-title">Penalties</h1>
                                        <div class="heading-elements">

                                        </div>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-md-12">
                                            <p><b>Subject Expert Writers</b> employs a system of penalties for Clients breaking the rules of conduct provided in the User Agreement.</p>
                                            <p>A Client’s account may be banned. Client may also be issued a warning.</p>
                                            <p>A warning is a notification sent to a user by email or on <b>Subject Expert Writers</b>, which informs the user that their certain actions may be violating the rules of conduct. A warning usually informs the user that a repeated violation may lead to a ban from <b>Subject Expert Writers</b>.</p>
                                            <p>A banned account completely blocks the client’s access to it. The Administration may choose to ban a client’s account due to violations of <b>Subject Expert Writers</b>’s strictest rules. An account may be banned temporarily, or permanently, depending on the violation.</p>
                                            <p>Clients using <b>Subject Expert Writers</b> will be penalized for the following violations:</p>
                                            <table>
                                                <tr>
                                                    <th>Violation</th>
                                                    <th>#of Voilation</th>
                                                    <th>Penalty Days</th>
                                                </tr>
                                                <tr>
                                                    <td>Organizing or participating in any kind of cyber-attacks on the website</td>
                                                    <td>1</td>
                                                    <td>Ban, Permanent</td>
                                                </tr>
                                                <tr>
                                                    <td>Creating a new <b>Subject Expert Writers</b> account in order to circumvent a ban or restriction placed on another <b>Subject Expert Writers</b> account</td>
                                                    <td>1</td>
                                                    <td>Ban, Permanent</td>
                                                </tr>
                                                <tr>
                                                    <td>Sharing contacts, attempting to share contacts, or accepting contact information from a writer</td>
                                                    <td>1</td>
                                                    <td>Warning</td>
                                                </tr>
                                                <tr>
                                                    <td>Sharing contacts, attempting to share contacts, or accepting contact information from a writer</td>
                                                    <td>2</td>
                                                    <td>Ban, Permanent</td>
                                                </tr>
                                                <tr>
                                                    <td>Creating and dummy orders* violating the rules of conduct, spamming and advertising</td>
                                                    <td>1</td>
                                                    <td>Ban, Permanent</td>
                                                </tr>
                                            </table>
                                            <br>
                                            <br>
                                            <p>*A dummy order is an order that is created to bypass the systems implemented on <b>Subject Expert Writers</b> in order to get unjustified benefits. This may include but not exclusive to orders created to increasing rating, posting fake reviews, or monetary withdrawals.</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="faqText">
                                    <div class="panel panel-bordered panel-collapsed">
                                        <div class="panel-heading bg-indigo-400 ">
                                            <h1 class="panel-title">For Students</h1>
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
                                            <div class="col-md-12">
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">Why Should You Use Our Services ?</h4>
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
                                                            <b>Subject Expert Writers</b> is an online exchange service, NOT an agency! Writers and Students work together directly, without having to deal with intermediaries. This allows for lesser assignment costs. Chat directly on our website – solve any issues with your Student of Writer right away!
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How to place an order ?</h4>
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
                                                            If a Student hasn’t signed up on our website yet, he or she can place an order and register simultaneously by clicking the following link: https://<b>Subject Expert Writers</b>.com/order/ When placing an order, it is necessary to provide the title, citation format, and the discipline. If you cannot find your Discipline in our list – choose the most similar one. Make sure you give instructions for your assignment, and attach all necessary files to it (for example any material handed out by your professor). Give a Due Date deadline for the assignment (the day is completed on 11:59PM UTC/GMT -3 Moscow). If the order is urgent and requires to be completed within a few hours – input the exact time of completion. You can specify your budget - the amount you’re willing to spend on the assignment, and then wait for offers from our Writers. You can attach any types of files limited by size of 15mb. If there are any problems with file attachments, you can upload them in an archive.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do i make payments ?</h4>
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
                                                            In order to make a payment, you have to deposit funds into your virtual <b>Subject Expert Writers</b> Wallet (to your account). You can accomplish this using different payment methods, including bank cards, electronic money, PayPal, Webmoney, etc.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do i choose a writer ?</h4>
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
                                                            After you have placed your order, you can choose a Writer based on their rating or their offered price. You must click “Choose Writer”, once pressed – you’ll have to pay for your order.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">Deadlines ? </h4>
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
                                                            The Due Date of an assignment is specified by the Student during the order placement. It is also possible to make an urgent order (completion in the near 24 hour period).
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How much does it cost ?</h4>
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
                                                            Because there are no intermediaries, costs for assignments are minimal. To get your prices for an assignment directly from the writers you have to place an order to the Auction and wait for Bids from our Writers.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">Gurantee</h4>
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
                                                            Guarantee of funds: When you add funds onto your account on <b>Subject Expert Writers</b>, you will have those funds available at all times. Funds are secured by E-Money and Platron. If you need your funds to be returned to you, you can do it easily in your account in the Withdraw section.

                                                            <b>Subject Expert Writers</b> guarantees the safety of your funds when paying for assignments. Payments are made as 100% immediately. When the payment transfer has been made (when you chose your Writer) the funds are put on Hold. Writer receives his earned money only after he uploads the assignment, which meets full requirements of the Student and the 20-day Warranty has expired. If the Writer does not complete his work, the money will be returned to the Student, and he may chose a different Writer for the completion of the assignment. Guarantee of quality: The quality of an assignment is measured with text originality in anti-plagiarism systems, as well as in accordance with the instructions of the Student (completed by following directions of the assignment and by the due date). If the assignment is completed with errors or inaccuracies, the Student may send it in for a free revision to the Writer. If the problem hadn’t been solved, the Student may request a full or partial refund.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">Do i have to pay the full price in advance ? </h4>
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
                                                            You may pay for your order in two installments. How to use: Pay 60% of your order when hiring a writer Your writer starts working Your writer finishes their work You pay the remaining 40% + 10% for the installment option You download the finished assignment This option is available to users with paid orders of at least $50 worth combined. You can only use this option for orders costing between $20 and $400. This option costs 10% of your order total. You may download the finished paper only after you complete your second payment. You can turn this option on and off in your balance page.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-bordered">
                                        <div class="panel-heading bg-indigo-400 ">
                                            <h1 class="panel-title">For Writers</h1>
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
                                            <div class="col-md-12">
                                                <p>Learn how to take orders on <b>Subject Expert Writers</b> by clicking here</p>
                                                <p>Pros of working with <b>Subject Expert Writers</b>:</p>
                                                <p>Online Academic Exchange Platform <b>Subject Expert Writers</b> allows you to work with Students directly, without overpaying intermediaries. You can set the prices for your work yourself. Your rating will rise as you complete more assignments, and as long as the quality of your works is good, your income will increase as well!</p>
                                                <br>
                                                <br>
                                                <h4><b>1. Registration and Accreditation</b></h4>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">I want to work as a writer ?</h4>
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
                                                            Firstly, you must complete the registration. Secondly, fill the profile section with your personal information. A request for accreditation will be formed, and you'll have to wait until the Administration approves your request. Then you'll be granted full access to our order database.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">Which country are you based in ?</h4>
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
                                                            We are not an agency – we only do the platform maintenance so that Students and Writers can reliably communicate. You don’t need to visit our office because all work is conducted online.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I register and pass the accreditation ?</h4>
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
                                                            Register here: https://<b>Subject Expert Writers</b>.com/register/ We require high qualifications from our writers. This also means that all your personal details must be authentic: your name, telephone number, degree level, and your date of birth. To gain access to order database and placing bids, after your register, you must pass the accreditation. It's a small test which confirms that you are familiar with rules of conduct on <b>Subject Expert Writers</b>. If you have any questions – you can contact our Service Support. After you pass the test, don’t forget to fill out your qualifications in your Profile and Settings sections.
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <h4><b>2. Working on an order</b></h4>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I search for orders ?</h4>
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
                                                            To search an order you need to enter title keywords and specify the discipline and type of paper. Tick the option “Without Bids” to view all the orders that currently have no bids. Filter by price and deadline to narrow down the search results:

                                                            <p style="margin-left:30px">Click on the price to narrow down the search results based on Student's budget</p>

                                                            <p style="margin-left:30px">Click on the deadline to narrow down the search results based on Student's specified due date.</p>

                                                            <p style="margin-left:30px">When filtering by cost or deadline, the orders will be sorted chronologically starting with the orders with the closest deadlines. In this case, the orders displayed first will have a set budget, and those below them will not have a budget set by the Student &ndash, which means that the price is negotiable</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I get more information about the orders ?</h4>
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
                                                            All Information regarding orders will be sent to your email 3 times a day (9 AM, 3 PM and 9 PM, +3GMT). We'll send you a list of new orders based on the information in your profile (disciplines and paper types). You can change the subscription options in your profile settings. You can see the complete list of orders by clicking the Assignment Search button.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I upload a completed assignment ?</h4>
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
                                                            You need to click the 'Attach File' button, located in your comments section, below the assignment specification.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I abandon an order ?</h4>
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
                                                            To abandon an order, send an email to {|%s} with your assignment ID, and your reasons for abandoning the assignment.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I make a bid ?</h4>
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
                                                            Go to an order you are interested in and click on Place a Bid button located on the assignment page. Enter the price you're willing to work for and any comments in corresponding fields.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I hide my bid ?</h4>
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
                                                            The bids are hidden automatically from all other Writers and are visible only to Students.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I leave comments ?</h4>
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

                                                            To leave comments, you must first place your bid. After you have placed a bid, you can leave comments for the Student below the assignment info.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">When do I receive payment for a completed assignment ?</h4>
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
                                                            The Student makes pays for an assignment when choosing a Writer. The money will be put on Hold, on their account balance until the final version of the assignment is uploaded. After it has been uploaded, the 20-day warranty begins. During the warranty period, the Student can make requests for corrections, and the Writer is obligated to correct and improve the assignment. A Student's request for correction must still be within the assignment specifications. After 20-day warranty period, the withheld funds will be transferred to the Writer's account.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I withdraw funds ?</h4>
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
                                                            You can withdraw your funds using one of the following methods: Paypal, Payoneer, or a direct transfer onto your bank card. You can choose your method when you make your first withdrawal request.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How long does it take to withdraw funds?</h4>
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
                                                            Requests for withdrawals are processed after 3 working days have passed since the filling of the requests. After approval, the requests are filed to the payment system of your choice to finalize the transaction.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How much is the commission ?</h4>
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
                                                            We have a regressive commission on <b>Subject Expert Writers</b>: the more money you've earned in 6 months, the better commission rates you're going to have. Your commission is calculated from your semi-annual income:

                                                            <p>0−300: 12% commission;</p>
                                                            <p>300−1000, 10% commission;</p>
                                                            <p>1000−3000, 8% commission;</p>
                                                            <p>3000−7000, 6% commission;</p>
                                                            <p>7000−15000, 4% commission;</p>
                                                            <p>above $15000 - 2% commission.</p>
                                                            Remember: when you enter a bid - you enter the amount you're going to receive after the commission is deducted.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How does rating work ?</h4>
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
                                                            On <b>Subject Expert Writers</b>, writers are ranked by clients on a 5 point scale. An average value is a decimal number and is used to form a rating. A rating of a writer indicates an objective evaluation of their performance, and include such factors as time the orders take, the amount of time it takes for the writer to respond to the clients, number of refunds issued for their orders, and reviews given by clients. Each writer’s rating is recalculated daily and takes the last 150 completed orders into account.
                                                            <br> The following factors affect a writer’s rating positively:

                                                            <p style="margin-left:30px">Positive reviews by clients</p>
                                                            <p style="margin-left:30px">No delayed orders</p>
                                                            <p style="margin-left:30px">No refunds issued for the orders</p>
                                                            <p style="margin-left:30px">Confirmation of work halfway to deadline</p>
                                                            <p style="margin-left:30px">High percentage of confirmations when taking new orders</p>
                                                            A writer’s ratings and bids are the most important factors for the clients when deciding on their writer, so it’s very important for the writers to fulfill the orders in time and provide high-quality papers.
                                                            <br> If a writer has less than 5 completed orders, they’ll receive a “New Writer” tag. Their rating will be calculated and will become visible only when they complete 5 orders. In order to maintain the quality of our service, new writers have following restrictions:

                                                            <p style="margin-left:30px">they’re unable to upload files to the orders in auction, before starting their work on an assignment
                                                                <p style="margin-left:30px">they can’t work on more than 4 orders at the same time
                                                                    <p style="margin-left:30px">restricted access to the forums
                                                                        <h4>Rating formulae</h4>
                                                                        <p>A writer’s rating is calculated using the following formula:</p>
                                                                        r= ∑ki=1αixiժi / ∑ki=1αiժi −∑nj+∑pmժժ
                                                                        <br>where
                                                                        <br>
                                                                        <p style="margin-left:30px">r is a writer’s general rating.</p>
                                                                        <p style="margin-left:30px">k is the number of latest orders used to calculate rating, set to 150 by default. If a writer has less than 150 orders, this value is equal to the number of completed orders.</p>
                                                                        <p style="margin-left:30px">is a user’s rating of the completed order </p>
                                                                        <p style="margin-left:30px">is a complexity coefficient of the order </p>
                                                                        <p style="margin-left:30px">ժ is a coefficient of time of an order . It’s used so that the newer orders would affect rating more than older orders. For the last 40 orders this value is equal to 1, then decreasing linearly to 0.5 for orders 41-100, finally linearly decreasing to 0.005 for orders 101-150.</p>
                                                                        <p style="margin-left:30px">is a set of additional negative factors decreasing a writer’s rating</p>
                                                                        <p style="margin-left:30px">is a set of additional positive factors increasing a writer’s rating</p>
                                                                        If the result doesn’t fall into a range between 1 and 5, it gets a value of 1 or 5, whichever is closer to the result.

                                                                        <p><b>Rating calculation for the order  ():</b></p>

                                                                        First, a base rating is calculated. There are two possibilities: A client rated a writer’s completed order. In this case, base rating equals the rating given by the client. Warranty period has expired, but the client didn’t rate a writer’s completed order. In this case, base rating equals (by default). Then, base rating may be modified by coefficients due to negative factors: Order completed after deadline: Writer didn’t confirm working on the order halfway to deadline: (there are two exception cases: if the writer didn’t confirm due to a valid reason, has taken the order back and carried it out; or if the writer has already uploaded the final paper and the order is completed) A refund has been issued for an order: A full refund (100%) to the client: A split between a client and a writer: gets a value between and , depending on what percentage has been refunded to a client The order is 100% credited to the writer:
                                                                        <br>
                                                                        <p><b>A complexity coefficient of the order  ():</b></p>
                                                                        A complexity coefficient indicates the complexity of a completed order and is tied to order price. To prevent any abuse of the rating system, all orders priced less than $5 will have a complexity coefficient close to zero. The coefficient will then increase up to 0.9 for orders costing up to $40. The orders priced more than $150 are considered very complex and their complexity coefficient equals 1.5.
                                                                        <br>
                                                                        <p><b>Additional factors that modify order complexity:</b></p>

                                                                        A user rating set by a client has more value than the rating set automatically (see rating calculation above). If the user rating for an order has been set automatically, for this order If a writer has completed an order marked as "premium", for this order Additional positive and negative factors ( and ):
                                                                        <br>
                                                                        <p><b>Additional positive and negative factors may be applied to a calculated rating if:</b></p>

                                                                        a writer often refuses to take new orders after bidding and being hired (more than 30%): minus 0.5; a writer confirms more than 95% of orders when hired: plus 0.1; refunds has been issued for more than 20% of orders completed by a writer: minus 0.4; a writer has more than 20% delayed orders: minus 0.4.
                                                                        <br>
                                                                        <p><b>Top Writers</b></p>
                                                                        On Top Writers page, the writers are separated by their field of specialization, based on general rating and the number of completed orders in a certain discipline or field. Each field has its separate top writers board. A writer’s position is calculated using the following formula: where - is a writer’s total rating - is a number of orders completed by the writer in a given discipline. A writer is positioned on the top writers board for a certain discipline, if they have completed orders in that discipline, or have set it as their field of specialization. Writers tagged as “new writers” can also appear on this board if they have completed orders in that disciplines. If a writer hasn’t indicated a certain discipline as their field of specialization and they have no completed orders in that discipline, this writer will not appear on the top writers board for that discipline.
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <h4><b>3. Problems</b></h4>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">A Student has left a poor review</h4>
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
                                                            You can petition a review in the Reviews section of your profile screen. If a review is false or offensive, the Administration may edit or delete it.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How long does it take for the Administration to process a petitioned review?</h4>
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
                                                            The petitions may be processed for up to five working days.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I make a complaint against a Student ?</h4>
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
                                                            Send your assignment ID and the description of your problem to {|%s}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">I am not satisfied with the result of a complaint</h4>
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
                                                            If you are not satisfied with a refund, to send an email to support@<b>Subject Expert Writers</b>.com and give legitimate reasons to why you do not agree.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How long does it take to process a complaint?</h4>
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
                                                            The Requests for refunds and recalculations are processed by the Administration in up to five working days depending on the complexity.
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <h4><b>4. Writer</b></h4>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How to take on an assignment from the auction?</h4>
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
                                                            You must place a Bid: open the assignment page and click 'Place a bid' button.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">How do I learn I have been chosen as the Writer for an assignment?</h4>
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
                                                            If you have been selected as a Writer, you will receive a notification by email. You will have to confirm that you're willing to start working and will complete the assignment within deadline. The order status will then change to 'In Progress'.
                                                            <p>
                                                                If you opt out of work or do not confirm it within 12 hour period, the assignment will automatically return to the auction.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="panel panel-info  panel-collapsed">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">What can I do to get more assignments ?</h4>
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
                                                            In order to get more orders and to become a successful Writer, you can take a few simple steps:

                                                            <p style="margin-left:30px">Please provide your portfolio. Fill your profile to ensure that the Student has information about your professionalism and qualifications.</p>
                                                            <p style="margin-left:30px">Improve your rating. Please remember that the rating is not only given on the basis of completed orders (earned money), but also on the basis of Student feedback, therefore, try to provide better papers in due time. This will help you build your reputation on <b>Subject Expert Writers</b></p>
                                                            <p style="margin-left:30px">Place more Bids. If customers tend not to immediately choose you, try lowering your prices;</p>
                                                            <p style="margin-left:30px">Please explain why you're the perfect Writer for the assignment. In addition to giving your price be sure to write a comment on why the Student should choose you.</p>
                                                            <p style="margin-left:30px">Work with enthusiasm, pay attention to details. Place all the instructions carefully and plan your writing together with a Student.</p>
                                                            <p style="margin-left:30px">Do the assignment efficiently and respond to the Student’s questions quickly. Do not ignore Students trying to contact you.</p>
                                                            <p style="margin-left:30px">Configure your automated notifications. You can set up automated newsletters in your profile. These newsletters will tell you about the new orders that suit your quialifications. The newsletters are delivered to your address three times a day.</p>
                                                            <p style="margin-left:30px">Perseverance will help you find a good assignment. Even if a Student didn’t choose you, don't give up - every day hundreds of different Students place new orders.</p>
                                                        </div>
                                                    </div>
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
        $(document).ready(function() {
            $("#policyText").hide();
            $("#privacyPolicyText").hide();
            $("#userAgreementText").hide();
            $("#penaltiesText").hide();
            $("#faqText").hide();
        });

        $('#about').on('click', function() {
            $("#aboutText").show();
            $("#policyText").hide();
            $("#privacyPolicyText").hide();
            $("#userAgreementText").hide();
            $("#penaltiesText").hide();
            $("#faqText").hide();
        });
        $('#policy').on('click', function() {
            $("#aboutText").hide();
            $("#policyText").show();
            $("#privacyPolicyText").hide();
            $("#userAgreementText").hide();
            $("#penaltiesText").hide();
            $("#faqText").hide();
        });
        $('#privacyPolicy').on('click', function() {
            $("#aboutText").hide();
            $("#policyText").hide();
            $("#privacyPolicyText").show();
            $("#userAgreementText").hide();
            $("#penaltiesText").hide();
            $("#faqText").hide();
        });
        $('#userAgreement').on('click', function() {
            $("#aboutText").hide();
            $("#policyText").hide();
            $("#privacyPolicyText").hide();
            $("#userAgreementText").show();
            $("#penaltiesText").hide();
            $("#faqText").hide();
        });
        $('#penalties').on('click', function() {
            $("#aboutText").hide();
            $("#policyText").hide();
            $("#privacyPolicyText").hide();
            $("#userAgreementText").hide();
            $("#penaltiesText").show();
            $("#faqText").hide();
        });
        $('#faq').on('click', function() {
            $("#aboutText").hide();
            $("#policyText").hide();
            $("#privacyPolicyText").hide();
            $("#userAgreementText").hide();
            $("#penaltiesText").hide();
            $("#faqText").show();
        });
    </script>

</body>

</html>