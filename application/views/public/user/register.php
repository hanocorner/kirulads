<style>
	body {
    background-color: #ececec80;
}
</style>

<div class="container">
	<div class="card card-login mx-auto">

		<div class="card-body">
			<h3>Create a new account</h3>

			<!-- Alert box -->
			<div id="messageBox"></div>
			<!-- /. Alert box -->

			<?php $attr = array('id'=>'formRegister', 'method'=>'post'); ?>
			<?php echo form_open('public/user/register/create-user', $attr);?>
			<div class="form-group mt-4">
				<input class="form-control" id="fullName" type="text" name="fullname" autocomplete="off" placeholder="Full Name">

			</div>
			<div class="form-group mt-4">
				<input class="form-control" type="email" name="usermail" autocomplete="off" placeholder="Email address">
				<small id="emailExist" class="form-text text-danger"></small>
			</div>
			<div class="form-group mt-4">
				<input class="form-control" type="text" name="number" autocomplete="off" placeholder="Number">

			</div>
			<div class="form-group mt-4">
				<input class="form-control" type="password" name="password" autocomplete="off" placeholder="Password">
			</div>

			<button type="submit" class="btn btn-primary-alt mt-3" id='register'>Register</button>

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
