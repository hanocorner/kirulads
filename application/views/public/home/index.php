<section class="hero-banner" style="background-image:url(<?php echo base_url('assets/images/hero-banner.png');?>);">
	<div class="container">
		<h1>The Largest Online Market Place in Sri Lanka</h1>
		<div class="card wild-card">
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

<section class="top-categories">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-3 col-lg-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/electronics.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Electronics</h5>
						<p>5 Ads</p>
					</div>
				</div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/vehicles.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Vehicles</h5>
						<p>5 Ads</p>
					</div>
				</div>
            </div>
            <div class="col-sm-6 col-md-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/property.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Property</h5>
						<p>5 Ads</p>
					</div>
				</div>
            </div>
            <div class="col-sm-6 col-md-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/fashion-health-beauty.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Fashion, Health & Beauty</h5>
						<p>5 Ads</p>
					</div>
				</div>
			</div>
        </div>
        
        <div class="row mt-4">
			<div class="col-md-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/home-garden.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Home & Garden</h5>
						<p>5 Ads</p>
					</div>
				</div>
            </div>
            <div class="col-md-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/business-industry.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Business & Industry</h5>
						<p>5 Ads</p>
					</div>
				</div>
            </div>
            <div class="col-md-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/animals.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Animals</h5>
						<p>5 Ads</p>
					</div>
				</div>
            </div>
            <div class="col-md-3">
				<div class="card top-category-card">
					<div class="category-image">
						<img src="<?php echo base_url('assets/images/category/services.png') ?>" alt="">
					</div>
					<div class="category-text">
						<h5>Top Deals</h5>
						<p>5 Ads</p>
					</div>
				</div>
			</div>
		</div>


	</div>
</section>

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