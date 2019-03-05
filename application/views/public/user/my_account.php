<?php if(empty($results)): ?>
<div class="container flex-length mt-5">
	<div class="no-ads mx-auto mt-5">
		<img class="mt-3" src="../assets/images/new.png" alt="no-ads">
		<h2 class="text-center mt-3">You don't have any ads yet.</h2>
		<h5 class="text-center mt-3">Click the post your ad now button to post your ad.</h5>
		<div class="d-flex justify-content-center">
			<a href="<?Php echo base_url('post-ad/category');?>" class="btn btn-primary-alt mt-4">Post your ad now</a>
		</div>

	</div>
</div>
<?php else: ?>
<div class="container bg-ad-post my-3">
	<div class="row">
		<div class="col-12 py-4 px-3">
			<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
				<div class="d-flex align-items-center">
					<div class="name-circle">
						<p>D</p>
					</div>
					<div>
						<h5 class="mb-0">Hansaka Perera</h5>
						<p class="text-muted mb-0">ownwwork101@gmail.com <span class="text-success"><i class="fa fa-check-circle fa-fw"></i></span></p>
					</div>
				</div>

				<a href="<?php echo base_url('user/account/settings');?>" class="btn btn-dark mt-2 mt-md-0">Edit</a>
			</div>
		</div>
	</div>
</div>
<div class="container bg-ad-post">
	<div class="row">
		<div class="col-12 py-4 px-4">
			<div class="d-flex justify-content-between align-items-center">
				<h4>My Ads</h4>
				<p class="text-muted">3 out of 5 Ads</p>
			</div>

			<?php foreach ($results as $result): ?>
			<div class="my-ad">
				<div class="row align-items-center">
					<div class="col-12 col-md-8 order-md-2">
						<h5>
							<?php echo $result['title']; ?> <span class="badge badge-pill badge-warning">Pending</span>
						</h5>
						<!-- <div class="d-flex align-items-center my-1">
							<?php if( (int) $result['status'] == 0): ?>
							<p class="text-muted mb-0">Status:</p>&nbsp; <span class="badge badge-pill badge-warning">Pending</span>
							<?php endif; ?>
							<?php if( (int) $result['status'] == 1): ?>
							<p class="text-muted mb-0">Status:</p>&nbsp; <span class="badge badge-pill badge-success">Active</span>
							<?php endif; ?>
							<?php if( (int) $result['status'] == 2): ?>
							<p class="text-muted mb-0">Status:</p>&nbsp; <span class="badge badge-pill badge-danger">Misleading</span>
							<?php endif; ?>
						</div> -->

						<div class="my-ad-category">
							<p class="mb-0">Rs: 60000</p>
						</div>

						<div class="my-ad-category">
							<p class="mb-0">
								<?php echo $result['category']; ?> &rarr;
								<?php echo $result['subcategory']; ?>
							</p>
						</div>
						<div class="my-ad-category">
							<p class="mb-0">
								<?php echo $result['category']; ?> &rarr;
								<?php echo $result['subcategory']; ?>
							</p>
						</div>
					</div>
					<div class="col-12 col-md-2 order-md-1 my-2 my-md-0">
						<div class="my-ad-img">
							<img src="<?php echo base_url('images/uploads/'.$result['path_string'].'/'.'thumb/'.$result['main_image'].''); ?>"
							 alt="My ad Main image" class="img-fluid">
						</div>
					</div>
					<div class="col-12 col-md-2 order-md-3">
						<div class="my-ad-btn">
							<a href="#" class="btn btn-primary-alt">Edit</a>
							<a href="#" class="btn btn-outline-danger">Delete</a>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-12">
						<!-- <div class="alert alert-danger" role="alert">
  					This is a danger alert—check it out!
				</div> -->
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?>
