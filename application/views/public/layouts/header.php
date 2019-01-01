<header>
	<nav class="navbar navbar-expand-lg navbar-light navbar-color">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">
				<img class="main_logo" src="<?php echo base_url('assets/public/dist/images/kirulads-logo.png')?>" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="nav navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">All Ads</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo base_url(); ?>">Categories</a>
					</li>
	
					<?php
					if ($this->session->has_userdata('logged_in') || $this->session->logged_in == TRUE):
					?>
					<li class="nav-item">
						<div class="dropdown">
							<a class="navbtn navbtn-secondry dropdown-toggle" href="<?php echo base_url('user/login'); ?>" data-toggle="dropdown"
							 aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-user fa-fw" aria-hidden="true"></i>My Account
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo base_url('user/myAccount'); ?>"><i class="fa fa-bullhorn fa-fw"></i>&nbsp; My Ads</a>
								<a class="dropdown-item" href="<?php echo base_url('user/account/settings'); ?>"><i class="fa fa-cog fa-fw"></i>&nbsp; Settings</a>
								<a class="dropdown-item" href="<?php echo base_url('public/user/account/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Logout</a>
								
							</div>
						</div>
					</li>
					<?php else: ?>
					<li class="nav-item">
						<a class="navbtn navbtn-secondry" href="<?php echo base_url('user/login'); ?>">
						<i class="fa fa-lock fa-fw"></i> Login
						</a>
					</li>
					<?php endif; ?>
					<li class="nav-item active">
						<a class="navbtn navbtn-primary" href="<?php echo base_url('post-ad/category'); ?>">Post your ad</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
