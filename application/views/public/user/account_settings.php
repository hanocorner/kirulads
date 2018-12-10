<style>
	body {
    background-color: #ececec80;
}
</style>
<div class="container acc-setting mt-5">
	<h2 class="pt-4">Account Settings</h2>
	<div class="row mt-5">
		<div class="col-md-6 border-right">
			<h4>Change details</h4>
			<br />
			<?php echo form_open();?>
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="number">Number</label>
				<input type="text" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="mail" class="form-control" id="" readonly>
			</div>
			<button type="submit" class="btn btn-primary-alt mt-3" id='update'>Update Details</button>

			<?php echo form_close();?>
		</div>
		<div class="col-md-6">
            <h4>Change password</h4>
            <br />
			<?php echo form_open();?>
			<div class="form-group">
				<label for="name">New Password</label>
				<input type="password" class="form-control" id="">
			</div>
			<div class="form-group">
				<label for="number">Confirm New Password</label>
				<input type="password" class="form-control" id="">
			</div>

			<button type="submit" class="btn btn-primary-alt my-3" id='update'>Change Password</button>

			<?php echo form_close();?>
		</div>
    </div>
    <div class="pt-4"></div>
</div>
