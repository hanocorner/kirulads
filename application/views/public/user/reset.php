<style>
body {
    background-color: #ececec80;
}
</style>
<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-body">
            <h3>Reset your password?</h3>

			<!-- Alert box -->
			<div id="messageBox"></div>
			<!-- /. Alert box -->

			<?php echo form_open();?>
			<div class="form-group mt-4">
				<input class="form-control" id="password" type="password" name="password" autocomplete="off" placeholder="Password">
			</div>
            <div class="form-group mt-4">
				<input class="form-control" id="rPassword" type="password" name="password" autocomplete="off" placeholder="Retype Password">
			</div>
			
			<button type="submit" class="btn btn-primary-alt mt-3" id='login'>Reset Password</button>

			<?php echo form_close();?>
		</div>
	</div>
</div>
