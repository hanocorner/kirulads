<div class="container flex-length mt-5">
	<!-- Alert box -->
	<div id="messageBox" class="mb-3"></div>
	<!-- /. Alert box -->

	<div class="card post-ad-card">
		<div class="card-body">
			<h2>Sell an item or service</h2>

			<div class="d-flex flex-row align-items-center justify-content-between section-select mt-5">
				<div>
					<p>Category</p>
					<div class="d-flex flex-row">
						<h6><?php echo $category->category; ?></h6>
						<i class="fa fa-long-arrow-right mt-1 mx-2"></i>
						<p class="text-muted"><?php echo $category->subcategory; ?></p>
					</div>
				</div>
				<a href="<?php echo base_url('post-ad/category'); ?>">Change</a>
			</div>

			<div class="d-flex flex-row align-items-center justify-content-between section-select mt-3">
				<div>
					<p>Location</p>
					<div class="d-flex flex-row">
						<h6><?php echo $location->location; ?></h6>
						<i class="fa fa-long-arrow-right mt-1 mx-2"></i>
						<p class="text-muted"><?php echo $location->sublocation; ?></p>
					</div>
				</div>
				<a href="<?php echo base_url('post-ad/category/'.$categoryid.'/location'); ?>">Change</a>
			</div>

			<?php $attr = array('id'=>'formSubmitAd', 'class'=>'mt-4', 'method'=>'post'); ?>
			<?php echo form_open_multipart('public/post-ad/handler/submit-ad', $attr);?>
			<input type="hidden" name="category" id="catID" value="<?php echo $categoryid; ?>">
			<input type="hidden" name="location" id="locID" value="<?php echo $locationid; ?>">

			<h5>Ad Information</h5>
			<div class="form-row">
				<div class="form-group col">
					<input type="text" placeholder="Title" class="form-control form-control-sm mt-3" name="title">
				</div>
			</div>

			Condition
			<div class="form-row">
				<div class="form-group col">
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="condition">
						<label class="form-check-label" for="gridCheck">New</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="condition">
						<label class="form-check-label" for="gridCheck">Used</label>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="exampleFormControlTextarea1">Description</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="description"></textarea>
				</div>
			</div>

			<div class="form-row align-items-center mt-3">
				<div class="form-group col-sm-3 col-md-2 col-lg-2">
					<input type="text" placeholder="Price (Rs)" class="form-control form-control-sm mt-3" name="price">
				</div>

				<div class="form-group col mb-0">
					<div class="form-group form-check mb-0 ml-3">
						<input type="checkbox" class="form-check-input" name="negotiable">
						<label class="form-check-label" for="exampleCheck1">Negotiable</label>
					</div>
				</div>
			</div>

			<h5 class="mt-3 mb-0">Add Image</h5>
			<div class="d-flex flex-row flex-wrap mb-4">
				<div class="my-ads-image">
					<div class="image">
						<img src="<?php echo base_url('assets/public/dist/images/no-image.png') ?>" class="img-fluid" alt="" id="imageAd"
						 width="200px" heigh="150px">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<input type="file" class="inputfile" id="myAdImg" name="adimg">
							<label for="add-image">Add Image</label>
						</div>
						<button type="button" class="btn btn-del-img btn-outline-danger" id="removeImg">Remove</button>
					</div>
					<!-- <small>Main Image</small> -->
				</div>
			</div>

			<div class="contact-data mt-5 mb-2">
				<h5 class="mb-3">Contact Details</h5>

				<div class="d-flex flex-column">
					<h6>Name</h6>
					<p><?php echo $userinfo->fullname; ?></p>
				</div>

				<div class="d-flex flex-column">
					<h6>Number</h6>
					<p><?php echo $userinfo->phone_number; ?></p>
				</div>

				<div class="d-flex flex-column">
					<h6>Email</h6>
					<p><?php echo $userinfo->email; ?></p>
				</div>
			</div>

			<button type="submit" class="btn btn-primary-alt mt-3" id='publishAd'>Post Ad</button>

			<?php echo form_close();?>
		</div>

	</div>
</div>
