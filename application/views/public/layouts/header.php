<header>
	<nav class="navbar navbar-expand-lg navbar-light navbar-color">
		<div class="container">
			<a class="navbar-brand" href="<?php echo base_url(); ?>">
				<img class="main_logo" src="<?php echo base_url('assets/images/kirulads-logo.png')?>" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=""
			 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

				
				<a class="nav-link" href="<?php echo base_url('ads'); ?>">All Ads</a>
				<?php
					if ($this->session->has_userdata('logged_in') || $this->session->logged_in == TRUE):
					?>
				<a class="navbtn navbtn-secondry" href="<?php echo base_url('user/login'); ?>">
							<i class="fa fa-lock fa-fw"></i> Login
						</a>
						<?php else: ?>
				<div class="dropdown">
					<a class="navbtn navbtn-secondry dropdown-toggle" href="<?php echo base_url('user/login'); ?>" data-toggle="dropdown"
					 aria-haspopup="true" aria-expanded="false">
						<i class="fa fa-user fa-fw" aria-hidden="true"></i>My Account
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="<?php echo base_url('user/myAccount'); ?>"><i class="fa fa-bullhorn fa-fw"></i>&nbsp;
							My Ads</a>
						<a class="dropdown-item" href="<?php echo base_url('user/account/settings'); ?>"><i class="fa fa-cog fa-fw"></i>&nbsp;
							Settings</a>
						<a class="dropdown-item" href="<?php echo base_url('public/user/account/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>&nbsp;
							Logout</a>
					</div>
				</div>
				<?php endif; ?>
				<a class="btn btn-primary-alt" href="<?php echo base_url('post-ad/category'); ?>">Post your ad</a>
			</div>
		</div>
	</nav>
</header>
