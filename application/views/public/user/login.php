<style>
	html,body {
		display:flex;
		flex-direction: column;
		height: 100%;
  		background-color: #ececec80;
	}
	.flex-length {
		flex:1;
	}
</style>

<div class="container flex-length">
	<div class="card card-login mx-auto">
		<div class="card-body">
			<h3>Please login to post your ad</h3>

			<!-- Alert box -->
			<div id="messageBox"></div>
			<!-- /. Alert box -->

			<?php $attr = array('id'=>'formLogin', 'method'=>'post'); ?>
			<?php echo form_open('public/user/login/authenticate', $attr);?>
			<div class="form-group mt-4">
				<input class="form-control" id="email" type="mail" name="mail" autocomplete="off" placeholder="Email address">
			</div>
			<div class="form-group mt-4">
				<input class="form-control" id="password" type="password" name="password" autocomplete="off" placeholder="Password">
			</div>
			<button type="submit" class="btn btn-primary-alt mt-3" id='login'>Login</button>

			<?php echo form_close();?>
		</div>
		<div class="card-footer">
			<a class="" href="#">Forgot your pasword?</a><br />
			<p class="mt-3">
				Don't have an account?
				<a href="<?php echo base_url('user/register'); ?>">Create a new account</a>
			</p>
		</div>
	</div>
</div>
