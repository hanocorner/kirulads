<style>
body {
    background-color: #ececec80;
}
</style>
<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-body">
			<h3>Create a new account</h3>
			<!-- Alert box -->
			<div id="messageBox"></div>
			<!-- /. Alert box -->

			<?php echo form_open();?>
			<div class="form-group mt-4">
				<input class="form-control" id="fullName" type="text" name="fullname" autocomplete="off" placeholder="Full Name">

            </div>
            <div class="form-group mt-4">
				<input class="form-control" id="email" type="mail" name="email" autocomplete="off" placeholder="Email address">

            </div>
            <div class="form-group mt-4">
				<input class="form-control" id="number" type="text" name="number" autocomplete="off" placeholder="Number">

			</div>
			<div class="form-group mt-4">
				<input class="form-control" id="password" type="password" name="password" autocomplete="off" placeholder="Password">
			</div>
			
			<button type="submit" class="btn btn-primary-alt mt-3" id='login'>Register</button>
			
			<?php echo form_close();?>
		</div>
			<div class="card-footer">
				<p>
					Have an account?
					<a href="<?php echo base_url('user/login'); ?>">Then log in</a>
				</p>
			</div>
	</div>
</div>
