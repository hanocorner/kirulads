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
								<?php echo $results->category; ?>
							</p>
							<i class="fa fa-long-arrow-right mt-1 mx-2"></i>
							<p class="text-muted">
								<?php echo $results->subcategory; ?>
							</p>
						</div>
					</div>
					<a href="<?php echo base_url('post-ad/category/'); ?>">Change</a>
				</div>
			</div>
			<div class="w-100"></div>

			<div class="col-12 col-md-8 my-2 my-md-0">
				<div class="d-flex flex-row align-items-center justify-content-between section-select mt-3">
					<div>
						<p class="text-dark font-weight-bold">Location</p>
						<div class="d-flex flex-row">
							<p class="text-muted">
								<?php echo $results->location; ?>
							</p>
							<i class="fa fa-long-arrow-right mt-1 mx-2"></i>
							<p class="text-muted">
								<?php echo $results->sublocation; ?>
							</p>
						</div>
					</div>
					<a href="<?php echo base_url('post-ad/category/'.$this->uri->segment(4).'/location'); ?>">Change</a>
				</div>
			</div>
		</div>

		<div class="row my-4">
			<div class="col-12 col-md-8 my-3 my-md-0">
				<h4>Add photos (5 for free)</h4>

				<?php $attr = array('id'=>'formSubmitAdImg', 'class'=>'mt-1', 'method'=>'post'); ?>
				<?php echo form_open_multipart('image', $attr);?>
                <?php $image_url = 'images/uploads/'.$results->path_string.'/thumb/'; ?>                
				<input type="hidden" name="path_string" value="<?php echo $results->path_string; ?>">
                
				<div class="ad-image mb-3" id="adImage" data-image="<?php echo $results->main_image; ?>" data-id="<?php echo $results->path_string; ?>">
					<div class="image">
						<img src="<?php echo base_url($image_url.$results->main_image);?>" class="img-fluid" alt="" id="imageAd">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<div class="form-check mb-2">
								<input class="form-check-input" type="radio" name="mainImage" id="mainImage" data-image="' + response.image_name + '" checked="checked">
								<label class="form-check-label text-muted" for="exampleRadios1">Main Image</label>
							</div>
							<button type="button" data-image="<?php echo $results->main_image; ?>" class="btn btn-sm btn-del-img btn-outline-danger"
							 id="removeImg"><i class="fa fa-minus-circle fa-fw"></i> Remove</button>
						</div>
					</div>
				</div>

                <?php if($results->sub_images != '' || $results->sub_images != null): ?>
						<?php $img_array = explode(',', $results->sub_images); ?>
						<?php foreach ($img_array as $image): ?>
                        <div class="ad-image mb-3" id="adImage" data-image="<?php echo $results->sub_images; ?>" data-id="<?php echo $results->path_string; ?>">
					<div class="image">
						<img src="<?php echo base_url($image_url.$results->sub_images);?>" class="img-fluid" alt="" id="imageAd">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<div class="form-check mb-2">
								<input class="form-check-input" type="radio" name="mainImage" id="mainImage" data-image="<?php echo $results->sub_images; ?>" >
								<label class="form-check-label text-muted" for="">Main Image</label>
							</div>
							<button type="button" data-image="<?php echo $results->sub_images; ?>" class="btn btn-sm btn-del-img btn-outline-danger"
							 id="removeImg"><i class="fa fa-minus-circle fa-fw"></i> Remove</button>
						</div>
					</div>
				</div>
                        <?php endforeach; ?>
						<?php endif; ?>

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

				<?php $attr = array('id'=>'formUpdateAdDetail', 'class'=>'mt-1 needs-validation', 'method'=>'post', 'novalidate'=>'""'); ?>
				<?php echo form_open('public/post-ad/handler/update-ad', $attr);?>
				<input type="hidden" name="category" id="catID" value="<?php echo $this->uri->segment(4); ?>">
                <input type="hidden" name="location" id="locID" value="<?php echo $this->uri->segment(6); ?>">
                <input type="hidden" name="adid" id="adiID" value="<?php echo $results->adid;?>">

				<div class="form-row my-3">
					<div class="form-group col">
						<input type="text" placeholder="Title" class="form-control" name="title" id="titleName" required value="<?php echo $results->title;?>">
					</div>
				</div>

				<label class="form-check-label" for="exampleCheck1">Condition</label>
				<?php if($results->item_condition == 0):?>
				<div class="form-row">
					<div class="form-group col">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="condition" id="condiRadio" checked="checked">
							<label class="form-check-label" for="gridCheck">New</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="condition" id="condiRadio">
							<label class="form-check-label" for="gridCheck">Used</label>
						</div>
					</div>
				</div>
				<?php else:?>
				<div class="form-row">
					<div class="form-group col">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="condition" id="condiRadio">
							<label class="form-check-label" for="gridCheck">New</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="condition" id="condiRadio" checked="checked">
							<label class="form-check-label" for="gridCheck">Used</label>
						</div>
					</div>
				</div>
				<?php endif; ?>

				<div class="form-row">
					<div class="form-group col">
						<label for="exampleFormControlTextarea1">Description</label>
						<textarea class="form-control" id="countableArea" rows="5" name="description" required>
                            <?php echo $results->description;?>
                        </textarea>
					</div>
				</div>

				<div class="form-row align-items-center mt-3">
					<div class="form-group col-6 col-md-3">
						<input type="text" placeholder="Price (Rs)" class="form-control form-control-sm mt-3" name="price" id="priceField"
						 required value="<?php echo $results->price;?>">
					</div>

					<div class="form-group col-6 col-md-3 mb-0">
						<div class="form-group form-check mb-0 ml-0 ml-md-3">
							<?php if($results->negotiable == 'on'):?>
							<input type="checkbox" class="form-check-input" name="negotiable" checked="checked">
							<?php else:?>
							<input type="checkbox" class="form-check-input" name="negotiable">
							<?php endif; ?>
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
								<?php echo ucfirst($results->fullname); ?>
							</p>
						</div>
						<div class="d-flex flex-column">
							<h6 class="text-primary">Number</h6>
							<p>
                                <?php echo $results->phone_number; ?>
							</p>
						</div>

						<div class="d-flex flex-column">
							<h6 class="text-primary">Email</h6>
							<p>
                            <?php echo ucfirst($results->fullname); ?>
							</p>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-primary-alt" id='updateAdBtn'>Update Ad</button>

				<?php echo form_close();?>
			</div>
		</div>
	</div>
</section>
