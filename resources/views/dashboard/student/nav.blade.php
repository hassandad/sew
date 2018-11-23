<!-- Second navbar -->
<div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
			<ul class="nav navbar-nav navbar-nav-material">
				<?php if ( Request::segment(3) == 'myOrder') : ?>
				<li><a href="/dashboard/student/placeOrder">Place an Order</a></li>
                <li class="active"><a href="/dashboard/student/myOrder">My Orders</a></li>
                <li><a href="/dashboard/student/writerRating">Writer Rating</a></li>
				<li><a href="/dashboard/student/balance">Balance</a></li>
				<!-- <li><a href="/dashboard/student/message">Messages</a></li> -->
				<?php elseif ( Request::segment(3) == 'writerRating') : ?>
				<li><a href="/dashboard/student/placeOrder">Place an Order</a></li>
                <li><a href="/dashboard/student/myOrder">My Orders</a></li>
                <li class="active"><a href="/dashboard/student/writerRating">Writer Rating</a></li>
				<li><a href="/dashboard/student/balance">Balance</a></li>
				<!-- <li><a href="/dashboard/student/message">Messages</a></li> -->
				<?php elseif ( Request::segment(3) == 'balance') : ?>
				<li><a href="/dashboard/student/placeOrder">Place an Order</a></li>
                <li><a href="/dashboard/student/myOrder">My Orders</a></li>
                <li><a href="/dashboard/student/writerRating">Writer Rating</a></li>
				<li class="active"><a href="/dashboard/student/balance">Balance</a></li>
				<!-- <li><a href="/dashboard/student/message">Messages</a></li>
				<?php elseif ( Request::segment(3) == 'message') : ?>
				<li><a href="/dashboard/student/placeOrder">Place an Order</a></li>
                <li><a href="/dashboard/student/myOrder">My Orders</a></li>
                <li><a href="/dashboard/student/writerRating">Writer Rating</a></li>
				<li><a href="/dashboard/student/balance">Balance</a></li>
				<li class="active"><a href="/dashboard/student/message">Messages</a></li> -->
				<?php elseif ( Request::segment(3) == 'placeOrder') : ?>
				<li  class="active"><a href="/dashboard/student/placeOrder">Place an Order</a></li>
                <li><a href="/dashboard/student/myOrder">My Orders</a></li>
                <li><a href="/dashboard/student/writerRating">Writer Rating</a></li>
				<li><a href="/dashboard/student/balance">Balance</a></li>
				<!-- <li><a href="/dashboard/student/message">Messages</a></li> -->
				<?php else : ?>	
				<li><a href="/dashboard/student/placeOrder">Place an Order</a></li>
                <li><a href="/dashboard/student/myOrder">My Orders</a></li>
                <li><a href="/dashboard/student/writerRating">Writer Rating</a></li>
				<li><a href="/dashboard/student/balance">Balance</a></li>
				<!-- <li><a href="/dashboard/student/message">Messages</a></li>	 -->
				<?php endif?>
							
			</ul>
		</div>
	</div>
	<!-- /second navbar -->