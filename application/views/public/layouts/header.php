<header>
	<nav class="navbar navbar-expand-lg navbar-light navbar-color">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">
				<picture>
					<source media="(min-width: 465px)" srcset="<?php echo base_url('images/kirulads-logo.png')?>">
					<img src="<?php echo base_url('images/mob-logo.png')?>" alt="Kirulads Logo" class="main_logo">
				</picture>
				
			</a>

			<div class="justify-content-end">
				<ul class="navbar-nav">
					<li class="nav-item mx-2">
						<a class="nav-link" href="<?php echo base_url('ads'); ?>">All Ads</a>
					</li>

					<?php if ($this->session->has_userdata('logged_in') || $this->session->logged_in == TRUE): ?>
					<li class="nav-item mx-2">
						<a class="nav-link mobile-only blue" href="<?php echo base_url('user/myAccount'); ?>">
							<i class="fa fa-user-circle fa-lg" aria-hidden="true"></i>
						</a>
					</li>
					<li class="nav-item dropdown desktop-only">
						<a class="nav-link blue dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
						 aria-haspopup="true" aria-expanded="false">
							<i class="fa fa-user fa-fw " aria-hidden="true"></i>My Account
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo base_url('user/myAccount'); ?>"><i class="fa fa-bullhorn fa-fw"></i>&nbsp;
								My Ads</a>
							<a class="dropdown-item" href="<?php echo base_url('user/account/settings'); ?>"><i class="fa fa-cog fa-fw"></i>&nbsp;
								Settings</a>
							<a class="dropdown-item" href="<?php echo base_url('public/user/account/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp;
								Logout</a>
						</div>
					</li>
					<?php else: ?>
					<li class="nav-item mx-2 mx-md-3 desktop-only">
						<a class="nav-link blue" href="<?php echo base_url('user/login'); ?>">
							<i class="fa fa-lock fa-fw"></i> Login
						</a>
					</li>
					<li class="nav-item mx-2 mx-md-3 mobile-only">
						<a class="nav-link blue" href="<?php echo base_url('user/login'); ?>">
							<i class="fa fa-lock fa-fw"></i>
						</a>
					</li>
					<?php endif; ?>
					<li class="nav-item ml-2 ml-md-3 my-auto">
						<a class="navbtn navbtn-primary" href="<?php echo base_url('post-ad/category'); ?>">Post Free Ad</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
