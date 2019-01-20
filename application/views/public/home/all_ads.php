<!-- Banner -->
<section class="banner my-3">
	<div class="container">
		<div class="row">
			<img src="<?php echo base_url('assets/images/banner.png'); ?>" alt="" class="img-fluid">
		</div>
	</div>
</section>
<!-- /. Banner -->

<!-- sort-ad -->
<section class="sort">
	<div class="container sort-ad">
		<div class="row">
			<form method="get" action="<?php echo current_url(); ?>">
				<div class="form-row align-items-center justify-content-center">
					<div class="col-auto location">
						<button type="button" data-action="location" class="btn btn-primary-alt wild-card-btn"><i class="fa fa-map-marker fa-fw"></i>
							Location</button>
					</div>
					<div class="col-auto category">
						<button type="button" data-action="category" class="btn btn-primary-alt wild-card-btn"><i class="fa fa-sliders fa-fw"></i>
							Category</button>
					</div>
					<div class="col-auto keywords">
						<input type="text" name="query" class="form-control" id="" placeholder="What are you looking for...">
					</div>

					<div class="col-auto">
						<button type="submit" class="btn btn-primary-alt wild-card-btn"><i class="fa fa-search fa-fw"></i> Search</button>
					</div>

				</div>
			</form>
		</div>
	</div>
</section>

<!-- All Ads Section -->
<section class="all-ads-section mt-1">
	<div class="container all-ads">
		<div class="row">
			<div class="col-3 border-right">
				<div class="pl-3 mt-2">
					<p class="text-muted mb-1"><small>Sort results by date:</small></p>
					<div class="input-group mb-3">
						<select class="form-control form-control-sm" id="sortDate">
							<option>Sort by date</option>
							<option value="desc">Newest on top</option>
							<option value="asc">Oldest on top</option>
						</select>
					</div>
				</div>

				<div class="pl-3 mt-3">
					<p class="text-muted mb-1"><small>Sort results by price:</small></p>
					<div class="input-group mb-3">
						<select class="form-control form-control-sm" id="sortPrice">
							<option>Sort by price</option>
							<option value="asc">Lowest price</option>
							<option value="desc">Highest price</option>
						</select>
					</div>
				</div>

				<div class="all-ad-category pl-3 mt-4">
					<p class="text-muted mb-1"><small>Categories:</small></p>
					<ul>
						<li><a href="#"><span><i class="fa fa-chevron-left fa-fw"></i></span> All Categories</a></li>
						<li><a href="#"><span><i class="fa fa-desktop fa-fw"></i></span> Electronics</a></li>
						<li><a href="#"><span><i class="fa fa-car fa-fw"></i></span> Vehicles</a></li>
						<li><a href="#"><span><i class="fa fa-home fa-fw"></i></span> Property</a></li>
						<li><a href="#"><span><i class="fa fa-heartbeat fa-fw"></i></span> Fashion, Health & Beauty</a></li>
						<li><a href="#"><span><i class="fa fa-futbol-o fa-fw"></i></span> Hobby, Sport & Kids</a></li>
						<li><a href="#"><span><i class="fa fa-briefcase fa-fw"></i></span> Business & Industry</a></li>
						<li><a href="#"><span><i class="fa fa-sun-o fa-fw"></i></span> Home & Garden</a></li>
						<li><a href="#"><span><i class="fa fa-snapchat-ghost fa-fw"></i></span> Animals</a></li>
						<li><a href="#"><span><i class="fa fa-graduation-cap fa-fw"></i></span> Education</a></li>
						<li><a href="#"><span><i class="fa fa-cutlery fa-fw"></i></span> Food & Agriculture</a></li>
						<li><a href="#"><span><i class="fa fa fa-wrench fa-fw"></i></span> Services</a></li>
						<li><a href="#"><span><i class="fa fa fa-archive fa-fw"></i></span> Other</a></li>
					</ul>
				</div>

				<div class="all-ad-location pl-3 mt-4">
					<p class="text-muted mb-1"><small>Locations:</small></p>
					<div class="all-ad-category">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> All of Sri Lanka</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Colombo</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kandy</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Galle</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ampara</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Anuradhapura</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Badulla</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Batticaloa</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Gampaha</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Hambantota</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Jaffna</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kalutara</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kegalle</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kilinochchi</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kurunegala</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mannar</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matale</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matara</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Moneragala</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mullativu</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Nuwara Eliya</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Polonnaruwa</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Puttalam</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ratnapura</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Trincomalee</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Vavuniya</a></li>
					</ul>
				</div>
				</div>

			</div>

			<div class="col-7">
				<div class="d-block mt-2 mb-3">
					<small class="font-weight-light text-muted mb-1">Location / Sub Category / All Ads</small><br>
					<small class="font-weight-bold text-dark">Showing
						<?php echo $result_count; ?> result(s)</small>
				</div>
				<div class="border-top">
					<?php if(empty($results)): ?>
					<p class="text-muted text-center">No results</p>
					<?php else:?>
					<?php foreach($results as $result): ?>
					<a href="<?php echo base_url('ad/'.$result['slug']); ?>" class="all-ad-data-link">
						<div class="d-flex flex-row align-items-stretch all-ad-data">
							<div class="meta-media">
								<?php $imgurl = $result['path_string'].'/'.'thumb/'.$result['main_image']; ?>
								<img src="<?php echo base_url('images/uploads/'.$imgurl); ?>" alt="" class="img-fluid" />
							</div>
							<div class="meta-data">
								<div class="meta-data-text ml-3">
									<p class="font-weight-bold mb-0 title">
										<?php echo $result['title']; ?>
									</p>
									<p class="text-muted mb-1"><small>
											<?php echo $result['location'].', '.$result['subcategory']; ?></small></p>

									<p class="text-dark font-weight-bold mb-0">Rs&nbsp;
										<?php echo $result['price']; ?>
									</p>
								</div>
								<div class="meta-data-date ml-3">
									<p class="text-muted mb-1 float-right"><small>
											<?php echo $result['date']; ?></small></p>
								</div>
							</div>
						</div>
					</a>
					<?php endforeach; ?>
					<?php endif; ?>
				</div>

				<div class="my-4">
					<nav aria-label="Page navigation example">
						<?php if(!is_null($links)):  ?>
						<?php echo $links; ?>
						<?php endif; ?>
					</nav>
				</div>
			</div>

			<div class="col-2 pl-0">
				<img src="<?php echo base_url('assets/images/skyscraper.jpg'); ?>" alt="" class="img-fluid d-block mx-auto my-3">
			</div>
		</div>
	</div>
</section>
<!-- /. All Ads Section -->

<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fa fa-sliders fa-fw"></i> Select Category</h5>

			</div>
			<div class="modal-body">
				<div class="all-ad-category">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="#"><span><i class="fa fa-sliders fa-fw"></i></span> All Categories</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-desktop fa-fw"></i></span> Electronics</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-car fa-fw"></i></span> Vehicles</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-home fa-fw"></i></span> Property</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-heartbeat fa-fw"></i></span> Fashion, Health &
								Beauty</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-futbol-o fa-fw"></i></span> Hobby, Sport & Kids</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-briefcase fa-fw"></i></span> Business & Industry</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-sun-o fa-fw"></i></span> Home & Garden</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-snapchat-ghost fa-fw"></i></span> Animals</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-graduation-cap fa-fw"></i></span> Education</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-cutlery fa-fw"></i></span> Food & Agriculture</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa fa-wrench fa-fw"></i></span> Services</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa fa-archive fa-fw"></i></span> Other</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /. of Category Modal -->

<!-- Location Modal -->
<div class="modal fade bd-example-modal-lg" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
 aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fa fa-map-marker fa-fw"></i> Select your city</h5>

			</div>
			<div class="modal-body">
				<div class="all-ad-category">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> All of Sri Lanka</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Colombo</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kandy</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Galle</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ampara</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Anuradhapura</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Badulla</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Batticaloa</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Gampaha</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Hambantota</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Jaffna</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kalutara</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kegalle</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kilinochchi</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kurunegala</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mannar</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matale</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matara</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Moneragala</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mullativu</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Nuwara Eliya</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Polonnaruwa</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Puttalam</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ratnapura</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Trincomalee</a></li>
						<li class="list-group-item"><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Vavuniya</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /. of Category Modal -->
