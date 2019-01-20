<div class="container mt-5">
	<div class="row">
		<div class="col-md-8">
			<div class="card detail-ad-card">
				<div class="card-body">
					<h1><?php echo $results->title; ?></h1>
					<div class="d-flex flex-row mt-2">
						<p class="text-muted">For sale by <a href="#" class="text-primary"><?php echo $results->fullname; ?></a></p>
						<p class="text-muted ml-2"><?php echo $results->date; ?></p>, 
						<p class="text-muted ml-2"><?php echo $results->sublocation; ?>, <?php echo $results->location; ?></p>						
					</div>
					<div class="detail-image">
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

					<div class="detail-text my-4">
						<div class="d-flex flex-row mb-4">
							<div class="price">Rs.<?php echo $results->price; ?></div>
							<div class="specs ml-3">
								<p class="text-dark mb-0">Condition:</p>
								<p class="text-muted mb-0"><?php echo $results->item_condition; ?></p>
							</div>
						</div>

						<h5>Description</h5>
						<p class="text-muted mb-0">
							<?php echo $results->description; ?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card">
				<div class="card-body detail-user-data">
					<div class="d-flex flex-row flex-wrap align-items-center justify-content-between mb-5">
						<h5><?php echo $results->fullname; ?></h5>
						<div class="verifed">
							<p><i class="fa fa-certificate fa-fw"></i> Verified user</p>
						</div>
						<button type="button" class="btn btn-primary-alt mt-4" data-number="<?php echo $results->phone_number; ?>">
							<i class="fa fa-volume-control-phone fa-fw"></i>
							Click to show number
						</button>
					</div>
					<img src="<?php echo base_url('assets/images/g-ad.jpg'); ?>" alt="Google ad" class="img-fluid">
					<hr />
					<p class="font-weight-bold">Share this ad</p>
					
					<div class="d-flex flex-row border-top border-bottom py-2 px-2">
						<small class="mx-2"><i class="fa fa-facebook-official"></i></small>
						<small class="mx-2"><i class="fa fa-facebook-official"></i></small>
						<small class="mx-2"><i class="fa fa-facebook-official"></i></small>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
