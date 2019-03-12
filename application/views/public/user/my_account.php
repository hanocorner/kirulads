<?php if(empty($results)): ?>
<div class="container flex-length mt-5">
	<div class="no-ads mx-auto mt-5">
		<img class="mt-3" src="<?Php echo base_url('images/new.png');?>" alt="no-ads">
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
						<p>
							<?php echo ucfirst($user_data[0]->fullname[0]); ?>
						</p>
					</div>
					<div>
						<h5 class="mb-0">
							<?php echo $user_data[0]->fullname; ?>
						</h5>
						<p class="text-muted mb-0">
							<?php echo $user_data[0]->email; ?><span class="text-success"><i class="fa fa-check-circle fa-fw"></i></span></p>
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
				<!-- <p class="text-muted">
					<?php //echo $ad_count[0]->total; ?> out of 5 Ads</p> -->
			</div>

			<?php foreach ($results as $result): ?>
			<?php if( (int) $result['status'] != 3): ?>
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
							<p class="mb-0 text-muted">
								<small>
									<?php echo $result['sublocation']; ?>,
									<?php echo $result['subcategory']; ?>
								</small>
							</p>
						</div>
						<div class="my-ad-category">
							<p class="mb-0 font-weight-bold text-dark">Rs:
								<?php echo $result['price']; ?>
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
							<?php $url = 'post-ad/details/category/'.$result['category_id'].'/location/'.$result['location_id'].'/edit/'.$result['slug']; ?>
							<a href="<?php echo base_url($url); ?>" class="btn btn-primary-alt">Edit</a>
							<a href="<?php echo base_url('ad/delete/'.$result['slug']); ?>" class="btn btn-outline-danger">Delete</a>
						</div>
					</div>
				</div>

				<div class="row my-2">
					<div class="col-12">
						<?php if( (int) $result['status'] == 2): ?>
						<div class="notify-box">
							<div class="error d-flex align-items-center">
								<div>
									<?php echo $result['Comment']; ?>
									</div>

									</div>
								</div>

								<?php endif; ?>

							</div>
						</div>
					</div>
					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
