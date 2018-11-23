<!-- Second navbar -->
<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material">
				<?php if ( Request::segment(3) == 'myOrder') : ?>
				<li><a href="/dashboard/writer/assignment">Availble Assignment</a></li>
                <li class="active"><a href="/dashboard/writer/myOrder">My Orders</a></li>
				<li><a href="/dashboard/writer/balance">Balance</a></li>
				<li><a href="/dashboard/writer/setting">Settings</a></li>
				<!-- <li><a href="/dashboard/writer/message">Messages</a></li> -->
				<?php elseif ( Request::segment(3) == 'assignment') : ?>
				<li class="active"><a href="/dashboard/writer/assignment">Availbel Assignment</a></li>
                <li><a href="/dashboard/writer/myOrder">My Orders</a></li>
				<li><a href="/dashboard/writer/balance">Balance</a></li>
				<li><a href="/dashboard/writer/setting">Settings</a></li>
				<!-- <li><a href="/dashboard/writer/message">Messages</a></li> -->
				<?php elseif ( Request::segment(3) == 'balance') : ?>
				<li><a href="/dashboard/writer/assignment">Availbel Assignment</a></li>
                <li><a href="/dashboard/writer/myOrder">My Orders</a></li>
				<li class="active"><a href="/dashboard/writer/balance">Balance</a></li>
				<li><a href="/dashboard/writer/setting">Settings</a></li>
				<!-- <li><a href="/dashboard/writer/message">Messages</a></li> -->
				<?php elseif ( Request::segment(3) == 'setting') : ?>
				<li><a href="/dashboard/writer/assignment">Availbel Assignment</a></li>
                <li><a href="/dashboard/writer/myOrder">My Orders</a></li>
				<li><a href="/dashboard/writer/balance">Balance</a></li>
				<li class="active"><a href="/dashboard/writer/setting">Settings</a></li>
				<!-- <li><a href="/dashboard/writer/message">Messages</a></li>
				<?php elseif ( Request::segment(3) == 'message') : ?>
				<li><a href="/dashboard/writer/assignment">Availbel Assignment</a></li>
                <li><a href="/dashboard/writer/myOrder">My Orders</a></li>
				<li><a href="/dashboard/writer/balance">Balance</a></li>
				<li><a href="/dashboard/writer/setting">Settings</a></li>
				<li class="active"><a href="/dashboard/writer/message">Messages</a></li> -->
				<?php else : ?>	
				<li><a href="/dashboard/writer/assignment">Availble Assignment</a></li>
                <li><a href="/dashboard/writer/myOrder">My Orders</a></li>
				<li><a href="/dashboard/writer/balance">Balance</a></li>
				<li><a href="/dashboard/writer/setting">Settings</a></li>
				<!-- <li><a href="/dashboard/writer/message">Messages</a></li> -->
				<?php endif?>
							
			</ul>
		</div>
	</div>
	<!-- /second navbar -->