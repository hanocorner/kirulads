<style>
body {
    background-color: #ececec80;
}
</style>
<div class="container">
	<div class="card card-login mx-auto mt-5">
		<div class="card-body">
            <h3>Forgot your password?</h3>
            <br/>
            <p>Don't worry. Resetting your password is easy, Just tell us the email address you registered with kirulads.lk</p>

			<!-- Alert box -->
			<div id="messageBox"></div>
			<!-- /. Alert box -->

			<?php echo form_open();?>
			<div class="form-group mt-3">
				<input class="form-control" id="email" type="mail" name="username" autocomplete="off" placeholder="Email address">
			</div>
			
			<button type="submit" class="btn btn-primary-alt mt-3" id='login'>Send</button>

			<?php echo form_close();?>
		</div>
	</div>
</div>
