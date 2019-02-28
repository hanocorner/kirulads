<div class="mt-2"></div>
<?php echo $wildcard; ?>
<!-- All Ads Section -->
<section class="all-ads-section mt-1">
	<div class="container">
		<div class="row">
			<div class="col-3 border-right d-none d-sm-block d-md-block all-ads">
				<div class="pl-3 mt-2">
					<p class="text-muted mb-1"><small>Sort results by date:</small></p>
					<div class="input-group mb-3">
						<select class="form-control form-control-sm" id="sortDate">
							<?php if($this->input->get('sortdate') == 'desc'): ?>
							<option value="desc">Newest on top</option>
							<option value="asc">Oldest on top</option>
							<?php elseif($this->input->get('sortdate') == 'asc'): ?>
							<option value="asc">Oldest on top</option>
							<option value="desc">Newest on top</option>
							<?php else: ?>
							<option>Sort by date</option>
							<option value="desc">Newest on top</option>
							<option value="asc">Oldest on top</option>
							<?php endif; ?>
						</select>
					</div>
				</div>

				<div class="pl-3 mt-3">
					<p class="text-muted mb-1"><small>Sort results by price:</small></p>
					<div class="input-group mb-3">
						<select class="form-control form-control-sm" id="sortPrice">
							<?php if($this->input->get('sortprice') == 'desc'): ?>
							<option value="desc">Highest price</option>
							<option value="asc">Lowest price</option>
							<?php elseif($this->input->get('sortprice') == 'asc'): ?>
							<option value="asc">Lowest price</option>
							<option value="desc">Highest price</option>
							<?php else: ?>
							<option>Sort by price</option>
							<option value="asc">Lowest price</option>
							<option value="desc">Highest price</option>
							<?php endif; ?>
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

			<div class="col-12 col-md-7 border-right all-ads">
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

			<div class="col-2 d-none d-sm-block d-md-block all-ads">
				<img src="<?php echo base_url('assets/images/skyscraper.jpg'); ?>" alt="" class="img-fluid d-block mx-auto my-3">
			</div>
		</div>
	</div>
</section>
<!-- /. All Ads Section -->

<?php echo $category_modal; ?>

<?php echo $location_modal; ?>