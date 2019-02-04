<!-- Banner -->
<section class="banner my-3">
	<div class="container">
		<div class="row">
			<!-- <img src="<?php echo base_url('assets/images/banner.png'); ?>" alt="" class="img-fluid"> -->
		</div>
	</div>
</section>
<!-- /. Banner -->

<!-- sort-ad -->
<section class="sort">
	<div class="container all-ads">
		<div class="card wild-card">
			<div class="row">
				<div class="col-6 col-lg-3">
					<button type="button" data-action="location" class="btn btn-primary-alt wild-card-btn"><i class="fa fa-map-marker fa-fw"></i>
						Location</button>
				</div>

				<div class="col-6 col-lg-3">
					<button type="button" data-action="category" class="btn btn-primary-alt wild-card-btn"><i class="fa fa-sliders fa-fw"></i>
						Category</button>
				</div>

				<div class="col-12 col-lg-6">
					<form method="get" action="<?php echo base_url('ads'); ?>">
						<div class="form-row">

							<div class="col-8">
								<input type="text" name="query" class="form-control" id="" placeholder="What are you looking for...">
							</div>

							<div class="col-4">
								<button type="submit" class="btn btn-primary-alt wild-card-btn"><i class="fa fa-search fa-fw"></i> Search</button>
							</div>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>

<!-- All Ads Section -->
<section class="all-ads-section mt-1">
	<div class="container all-ads">
		<div class="row">
			<div class="col-3 border-right d-none d-sm-block d-md-block">
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
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> All of Sri Lanka</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Colombo</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kandy</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Galle</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ampara</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Anuradhapura</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Badulla</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Batticaloa</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Gampaha</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Hambantota</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Jaffna</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kalutara</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kegalle</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kilinochchi</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kurunegala</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mannar</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matale</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matara</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Moneragala</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mullativu</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Nuwara Eliya</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Polonnaruwa</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Puttalam</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ratnapura</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Trincomalee</a></li>
							<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Vavuniya</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="col-12 col-md-7">
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
											<?php echo $result['location'].' <i class="fa fa-long-arrow-right"></i> '.$result['sublocation'].', '.$result['subcategory']; ?></small></p>

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

			<div class="col-2 pl-0 d-none d-sm-block d-md-block">
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
				<a href="javascript:void(0)" data-dismiss="modal" aria-label="Close">
					<img src="<?php echo base_url('assets/images/error.png'); ?>" alt="Error-Image" class="img-fluid">
				</a>
			</div>
			<div class="modal-body">
			<div class="container flex-length mt-5">
	<h5 class="text-center mb-4">Select a category</h5>
	<div class="row my-3">
		<div class="col">
			<div class="category-card" data-action="category" data-id="101">
				<p class="text-center mb-1"><i class="fa fa-car fa-fw"></i></p>
				<p class="text-center mb-0">Vehicles</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="100">
				<p class="text-center mb-1"><i class="fa fa-desktop fa-fw"></i></p>
				<p class="text-center mb-0">Electronics</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="102">
				<p class="text-center mb-1"><i class="fa fa-home fa-fw"></i></p>
				<p class="text-center mb-0">Property</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="104">
				<p class="text-center mb-1"><i class="fa fa-heartbeat fa-fw"></i></p>
				<p class="text-center mb-0">Fashion, Health & Beauty</p>
			</div>
		</div>
	</div>

	<div class="row my-3">
		<div class="col">
			<div class="category-card" data-action="category" data-id="105">
				<p class="text-center mb-1"><i class="fa fa-futbol-o fa-fw"></i></p>
				<p class="text-center mb-0">Hobby, Sport & Kids</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="107">
				<p class="text-center mb-1"><i class="fa fa-briefcase fa-fw"></i></p>
				<p class="text-center mb-0">Business & Industry</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="103">
				<p class="text-center mb-1"><i class="fa fa-sun-o fa-fw"></i></p>
				<p class="text-center mb-0">Home & Garden</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="110">
				<p class="text-center mb-1"><i class="fa fa-snapchat-ghost fa-fw"></i></p>
				<p class="text-center mb-0">Animals</p>
			</div>
		</div>
	</div>

	<div class="row my-3">
		<div class="col">
			<div class="category-card" data-action="category" data-id="109">
				<p class="text-center mb-1"><i class="fa fa-graduation-cap fa-fw"></i></p>
				<p class="text-center mb-0">Education</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="111">
				<p class="text-center mb-1"><i class="fa fa-cutlery fa-fw"></i></p>
				<p class="text-center mb-0">Food & Agriculture</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="108">
				<p class="text-center mb-1"><i class="fa fa fa-wrench fa-fw"></i></p>
				<p class="text-center mb-0">Services</p>
			</div>
		</div>
		<div class="col">
			<div class="category-card" data-action="category" data-id="112">
				<p class="text-center mb-1"><i class="fa fa fa-archive fa-fw"></i></p>
				<p class="text-center mb-0">Other</p>
			</div>
		</div>
	</div>
</div>
			</div>

		</div>
	</div>
</div>
<!-- /. of Category Modal -->

<!-- Location Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fa fa-map-marker fa-fw"></i> Select your city</h5>
				<a href="javascript:void(0)" data-dismiss="modal" aria-label="Close">
					<img src="<?php echo base_url('assets/images/error.png'); ?>" alt="Error-Image" class="img-fluid">
				</a>
			</div>
			<div class="modal-body">
				<div class="all-ad-category">
					<ul>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> All of Sri Lanka</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Colombo</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kandy</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Galle</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ampara</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Anuradhapura</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Badulla</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Batticaloa</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Gampaha</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Hambantota</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Jaffna</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kalutara</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kegalle</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kilinochchi</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Kurunegala</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mannar</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matale</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Matara</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Moneragala</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Mullativu</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Nuwara Eliya</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Polonnaruwa</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Puttalam</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Ratnapura</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Trincomalee</a></li>
						<li><a href="#"><span><i class="fa fa-map-marker fa-fw"></i></span> Vavuniya</a></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- /. of Category Modal -->
