<section class="hero-banner asyncImage" data-src="<?php echo base_url('images/hero-banner.png');?>" style="background-image:url(<?php echo base_url('images/hero-banner-min.png');?>);">
	<div class="container py-5">
		<div class="row">
			<div class="col-12">
				<div class="hero-text mb-5">
					<h1>The Largest Online Market Place in Sri Lanka</h1>
					<p class="my-3">Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more in Sri Lanka!</p>
				</div>
				<?php echo $wildcard; ?>
			</div>
		</div>
	</div>
</section>

<section class="top-categories mt-5">
	<div class="container">
		<div class="row">
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/electronics'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-electronics"></i>
						</div>
						<div class="category-text">
							<h5>Electronics</h5>
							<p>(500)</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/vehicles'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-vehicles"></i>
						</div>
						<div class="category-text">
							<h5>Vehicles</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/property'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-property"></i>
						</div>
						<div class="category-text">
							<h5>Property</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>

			</div>
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/fashion-health-beauty'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-fashion-health-beauty"></i>
						</div>
						<div class="category-text">
							<h5>Fashion, Health & Beauty</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>

			</div>
		</div>

		<div class="row mt-3">
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/home-garden'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-home-garden"></i>
						</div>
						<div class="category-text">
							<h5>Home & Garden</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>

			</div>
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/business-industry'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-business-industry"></i>
						</div>
						<div class="category-text">
							<h5>Business & Industry</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>

			</div>
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/animals'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-animals"></i>
						</div>
						<div class="category-text">
							<h5>Animals</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>

			</div>
			<div class="col-6 col-lg-3">
				<a href="<?php echo base_url('ads/srilanka/top-deals'); ?>">
					<div class="card top-category-card">
						<div class="category-image">
							<i class="sprite sprite-top-deal"></i>
						</div>
						<div class="category-text">
							<h5>Services</h5>
							<p>5 Ads</p>
						</div>
					</div>
				</a>

			</div>
		</div>


	</div>
</section>

<!--  -->
<section class="mt-5">
	<div class="container">
		<div class="card">
			<div class="card-body">
				<div class="d-flex flex-column flex-md-row align-items-center justify-content-center">
					<img src="<?php echo base_url('images/megaphone.png'); ?>" class="img-fluid mb-3 mb-md-0 mx-0 mx-md-4" alt="Promote your ad">
					<p class="text-center mb-3 mb-md-0 mx-0 mx-md-4">Do you want to sell your ad fast? Then click the Promote now button to get started</p>
					<a href="#" class="btn btn-primary mx-0 mx-md-4 px-4">Promote Now</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php echo $category_modal; ?>

<?php echo $location_modal; ?>
<!-- /. of Category Modal -->
<script>
(() => {
  'use strict';
  // Page is loaded
  const objects = document.getElementsByClassName('asyncImage');
  Array.from(objects).map((item) => {
    // Start loading image
    const img = new Image();
    img.src = item.dataset.src;
    // Once image is loaded replace the src of the HTML element
    img.onload = () => {
      item.classList.remove('asyncImage');
      return item.nodeName === 'IMG' ? 
        item.src = item.dataset.src :        
        item.style.backgroundImage = `url(${item.dataset.src})`;
    };
  });
})();
</script>