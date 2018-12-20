<style>
html,body {
	height: 100%;
  background-color: #ececec80;
}
</style>
<div class="container">
	<div class="card card-login mx-auto align-middle">
		<div class="card-body">
			<h3>Please login to post your ad</h3>
			<!-- Alert box -->
			<div id="messageBox"></div>
			<!-- /. Alert box -->

			<?php $attr = array('id'=>'formLogin', 'method'=>'post'); ?>
			<?php echo form_open('public/user/guard/authenticate', $attr);?>
			<div class="form-group mt-4">
				<input class="form-control" id="email" type="mail" name="mail" autocomplete="off" placeholder="Email address">

			</div>
			<div class="form-group mt-4">
				<input class="form-control" id="password" type="password" name="password" autocomplete="off" placeholder="Password">
			</div>
			<div class="form-check mt-4">
				<input type="checkbox" class="form-check-input" id="rememberMe">
				<label class="form-check-label" for="Remember-me">Remember Me</label>
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
