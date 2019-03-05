<div class="container bg-ad-post mt-5">
	<div class="row py-3">
		<div class="col-12 col-md-7">
			<div class="ad-header">
				<h3 class="mb-1" title="<?php echo $results->title; ?>">
					<?php echo ucfirst($results->title); ?>
				</h3>
				<div class="d-flex align-items-center extras">
					<p class="text-muted mr-3 mb-1">For sale by <span class="text-primary">
							<?php echo $results->fullname; ?></span>
						<?php echo $results->date; ?>
						<?php echo $results->sublocation; ?>,
						<?php echo $results->location; ?>
					</p>
				</div>
			</div>
			<hr class="mt-0">
			<div class="ad-media">
				<div class="flexslider">
					<ul class="slides">
						<?php $path_str = $results->path_string; ?>
						<?php $main_img = $path_str.'/'.$results->main_image;  ?>
						<?php $thumb = $path_str.'/'.'thumb'.'/'.$results->main_image; ?>
						<li data-thumb="<?php echo base_url('images/uploads/'.$thumb); ?>">
							<img src="<?php echo base_url('images/uploads/'.$main_img); ?>" class="img-fluid" />
						</li>
						<?php if($results->sub_images != '' || $results->sub_images != null): ?>
						<?php $img_array = explode(',', $results->sub_images); ?>
						<?php foreach ($img_array as $image): ?>
						<li data-thumb="<?php echo base_url('images/uploads/'.$path_str.'/'.'thumb/'.$image); ?>">
							<img src="<?php echo base_url('images/uploads/'.$path_str.'/'.$image); ?>" class="img-fluid" />
						</li>
						<?php endforeach; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-5">
			<div class="row">
				<div class="col-12 py-2">
					<div class="d-flex align-items-center">
						<div class="name-circle">
							<?php $first = $results->fullname; ?>
							<p class="mb-0"><?php echo ucfirst($first[0]);?></p>
						</div>
						<div class="user-name">
							<h5 class="mb-0">
								<?php echo $results->fullname; ?>
							</h5>
							<p class="text-muted mb-0">Verified user <span class="text-success"><i class="fa fa-check-circle fa-fw"></i></span>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="d-flex align-items-center my-3">
						<span class="mr-3 text-primary"><i class="fa fa-map-marker fa-fw fa-lg"></i></span>
						<div class="location">
							<small class="text-muted">Location</small>
							<p class="mb-0 font-weight-bold">
								<?php echo $results->sublocation; ?>
							</p>
						</div>
					</div>
				</div>

				<div class="col-6">
					<div class="d-flex align-items-center my-3">
						<span class="mr-3 text-primary"><i class="fa fa-clock-o fa-fw fa-lg"></i></span>
						<div class="time">
							<small class="text-muted">Ad updated</small>
							<p class="mb-0 font-weight-bold">
								<?php echo $results->date; ?>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<button type="button" class="btn btn-primary-alt" data-number="<?php echo $results->phone_number; ?>">
						<i class="fa fa-mobile fa-fw"></i>
						<span>Click to show number</span>
					</button>
				</div>
				<div class="col-6">
					<button type="button" class="btn btn-outline-danger" data-id="<?php echo $results->adid; ?>">
						<i class="fa fa-exclamation-triangle"></i>
						<span>Report this ad</span>
					</button>
				</div>
			</div>

			<div class="row">
				<div class="col-6">
					<div class="price">
						<p>Rs: <span>
								<?php echo $results->price;?></span></p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="google-ad">
						<img src="<?php echo base_url('assets/images/g-ad.jpg'); ?>" alt="Google ad" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row py-3">
		<div class="col-12 col-md-7">
			<div class="specs">
				<h5 class="text-dark fo mb-0">Condition</h5>
				<p class="text-muted mb-0">
					<?php if($results->item_condition == 0): ?>
					New
					<?php else: ?>
					Used
					<?php endif; ?>
				</p>
				<hr>
			</div>
			<div>
				<h5>Description</h5>
				<p class="text-muted mb-0">
					<?php echo $results->description; ?>
				</p>
			</div>
		</div>

	</div>
</div>
