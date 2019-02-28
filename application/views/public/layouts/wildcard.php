<!-- Wildcard Component -->
<section>
	<div class="container">
		<div class="row">
			<div class="col wildcard">
				<div class="row">
					<div class="col-6 col-lg-3 order-3  order-lg-1">
						<button type="button" data-action="location" class="btn btn-primary-alt wildcard-btn"><i class="fa fa-map-marker fa-fw"></i>
							<?php if($this->uri->segment(2)): ?>
							<?php echo $this->uri->segment(2); ?>
							<?php else: ?>
							&nbsp;Location
							<?php endif; ?>
						</button>
					</div>

					<div class="col-6 col-lg-3 order-2 order-lg-2">
						<button type="button" data-action="category" class="btn btn-primary-alt wildcard-btn"><i class="fa fa-sliders fa-fw"></i>
							Category</button>
					</div>

					<div class="col-12 col-lg-6 order-1 order-lg-3 my-3 my-lg-0">
						<form method="get" action="<?php echo base_url('ads'); ?>">
							<div class="input-group">
								<input type="text" name="query" class="form-control" id="" aria-describedby="inputGroupFileAddon04" placeholder="What are you looking for...">
								<div class="input-group-append">
									<button class="btn btn-primary-alt" type="submit" id="inputGroupFileAddon04"><i class="fa fa-search fa-fw"></i></button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="mob-btn-primary mobile-only mt-2 mt-md-0">
			<a class="navbtn navbtn-primary w-100" href="<?php echo base_url('post-ad/category'); ?>">Post Free Ad</a>
		</div> -->
	</div>
</section>
