<section class="mt-3">
	<div class="container bg-ad-post">
		<div class="row my-2">
			<div class="col-12 col-md-8">
				<h3>Sell an item or service</h3>
			</div>
		</div>

		<div class="row mt-2 mb-4">
			<div class="col-12 col-md-8 my-2 my-md-0">
				<div class="d-flex flex-row align-items-center justify-content-between section-select" data-toggle="tooltip"
				 data-placement="right" title="Tooltip on top">
					<div>
						<p class="text-dark font-weight-bold">Category</p>
						<div class="d-flex flex-row">
							<p class="text-muted">
								<?php echo $category->category; ?>
							</p>
							<i class="fa fa-long-arrow-right mt-1 mx-2"></i>
							<p class="text-muted">
								<?php echo $category->subcategory; ?>
							</p>
						</div>
					</div>
					<a href="<?php echo base_url('post-ad/category'); ?>">Change</a>
				</div>
			</div>
			<div class="w-100"></div>

			<div class="col-12 col-md-8 my-2 my-md-0">
				<div class="d-flex flex-row align-items-center justify-content-between section-select mt-3">
					<div>
						<p class="text-dark font-weight-bold">Location</p>
						<div class="d-flex flex-row">
							<p class="text-muted">
								<?php echo $location->location; ?>
							</p>
							<i class="fa fa-long-arrow-right mt-1 mx-2"></i>
							<p class="text-muted">
								<?php echo $location->sublocation; ?>
							</p>
						</div>
					</div>
					<a href="<?php echo base_url('post-ad/category/'.$categoryid.'/location'); ?>">Change</a>
				</div>
			</div>
		</div>

		<div class="row my-4">
			<div class="col-12 col-md-8 my-3 my-md-0">
				<h4>Add photos (5 for free)</h4>

				<?php $attr = array('id'=>'formSubmitAdImg', 'class'=>'mt-1', 'method'=>'post'); ?>
				<?php echo form_open_multipart('image', $attr);?>
				<input type="hidden" name="path_string" value="<?php echo $path_string; ?>">

				<div id="adDivImg"></div>

				<div class="ad-image">
					<div class="image">
						<img src="<?php echo base_url('images/noimage.png'); ?>" class="img-fluid" alt="No image" id="imageAd">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<input type="file" class="inputfile" id="myAdImg" name="adimg">
							<label for="add-image" id="btnLabelImg">Add a photo</label>

						</div>
					</div>
				</div>
				<div id="imgAlert"></div>
				<?php echo form_close();?>
			</div>
		</div>

		<!-- Alert Box -->
		<div class="row my-1">
			<div class="col-12 col-md-8">
				<div id="messageBox" class="mb-3"></div>
			</div>
		</div>
		<!-- /. Alert Box -->

		<div class="row my-4">
			<div class="col-12 col-md-8">
				<h4>Fill in the details</h4>

				<?php $attr = array('id'=>'formSubmitAdDetail', 'class'=>'mt-1 needs-validation', 'method'=>'post', 'novalidate'=>'""'); ?>
				<?php echo form_open('public/post-ad/handler/submit-ad', $attr);?>
				<input type="hidden" name="category" id="catID" value="<?php echo $categoryid; ?>">
				<input type="hidden" name="location" id="locID" value="<?php echo $locationid; ?>">

				<div class="form-row my-3">
					<div class="form-group col">
						<input type="text" placeholder="Title" class="form-control" name="title" id="titleName" required>
					</div>
				</div>

				<label class="form-check-label" for="exampleCheck1">Condition</label>
				<div class="form-row">
					<div class="form-group col">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="condition" id="condiRadio">
							<label class="form-check-label" for="gridCheck">New</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="condition" id="condiRadio">
							<label class="form-check-label" for="gridCheck">Used</label>
						</div>
					</div>
				</div>

				<div class="form-row">
					<div class="form-group col">
						<label for="exampleFormControlTextarea1">Description</label>
						<textarea class="form-control" id="countableArea" rows="5" name="description" required></textarea>
					</div>
				</div>

				<div class="form-row align-items-center mt-3">
					<div class="form-group col-6 col-md-3">
						<input type="text" placeholder="Price (Rs)" class="form-control form-control-sm mt-3" name="price" id="priceField"
						 required>
					</div>

					<div class="form-group col-6 col-md-3 mb-0">
						<div class="form-group form-check mb-0 ml-0 ml-md-3">
							<input type="checkbox" class="form-check-input" name="negotiable">
							<label class="form-check-label" for="exampleCheck1">Negotiable</label>
						</div>
					</div>
				</div>

				<div class="form-row my-4">
					<div class="col-12 col-md-8">
						<h5 class="mb-3">Contact Details</h5>
						<div class="d-flex flex-column">
							<h6 class="text-primary">Name</h6>
							<p>
								<?php echo $userinfo->fullname; ?>
							</p>
						</div>
						<div class="d-flex flex-column">
							<h6 class="text-primary">Number</h6>
							<p>
								<?php echo $userinfo->phone_number; ?>
							</p>
						</div>

						<div class="d-flex flex-column">
							<h6 class="text-primary">Email</h6>
							<p>
								<?php echo $userinfo->email; ?>
							</p>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary-alt" id='publishAd'>Post Ad</button>

				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>
