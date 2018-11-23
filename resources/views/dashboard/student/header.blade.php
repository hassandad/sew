<div class="navbar navbar-inverse bg-indigo">
<!-- <div class="navbar-header ">
	<a class="navbar-brand pull-left" href="/"><img src="/writer/assets/images/logo3.png" style=width:120px  alt=""></a>

	<ul class="nav navbar-nav pull-right visible-xs-block">
		<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
	</ul>
</div> -->

<div class="navbar-collapse collapse" id="navbar-mobile">
<a  class="pull-left" href="/"><img src="/writer/assets/images/logo3.png" style="width:120px;margin-left: 20px;"  alt=""></a>
	<div id="content"></div>

	<a href="/dashboard/student/placeOrder"><p class="navbar-text" style="margin: 0; padding: 6px;"><button type="button"  style="font-size:12px" class="btn searchaa btn-raised legitRipple btn-rounded">Place an Order</button></p></a>
   

	<ul class="nav navbar-nav navbar-right" style="margin-right:  20px;">
		<li>
			<a style="text-transform:uppercase" data-toggle="dropdown">
				<i class="icon-wallet" style="font-size:25px"></i>
				$10.00
			</a>

		</li>
		<li>
			<a style="text-transform:uppercase" href="/dashboard/student/writerRating">
				Expert Writers
			</a>

		</li>
		<li>
			<a style="text-transform:uppercase" data-toggle="dropdown">
				<i class="icon-help" style="font-size:25px"></i>
				Help
			</a>

		</li>

		<li class="dropdown dropdown-user">
			<a class="dropdown-toggle" data-toggle="dropdown">
			<?php if(\Illuminate\Support\Facades\Session::get('image')):?>
				<img style="height:20px" src="/profile/<?php echo \Illuminate\Support\Facades\Session::get('image') ?>" alt="">
			<?php else:?>
				<img src="/user.png" alt="">
			<?php endif?>
				<span><?php echo \Illuminate\Support\Facades\Session::get('user')->username ?></span>
				<i class="caret"></i>
			</a>

			<ul class="dropdown-menu dropdown-menu-right">
				<li><a style="text-transform:uppercase" href="/dashboard/student/profile"><i class="icon-user-plus"></i> My profile</a></li>
				<li><a style="text-transform:uppercase" href="/dashboard/student/balance"><i class="icon-coins"></i> My balance</a></li>
				<li class="divider"></li>
			<li><a style="text-transform:uppercase" href="/logout"><i class="icon-switch2"></i> Logout</a></li>
			</ul>
		</li>
	</ul>
</div>

<script src='/dist/studentHeaderContent.js'></script>
</div>
