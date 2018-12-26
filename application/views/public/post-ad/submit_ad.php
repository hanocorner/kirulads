<div class="container flex-length mt-5">
	<div class="card post-ad-card">
		<div class="card-body">
			<h2>Sell an item or service</h2>

			<?php $attr = array('id'=>'post', 'class'=>'mt-4', 'method'=>'post'); ?>
			<?php echo form_open('public/post-ad/', $attr);?>

			<div class="form-row">
				<div class="form-group col">
					<select class="form-control form-control-sm">
						<option>Select a location</option>
					</select>
				</div>

				<div class="form-group col">
					<select class="form-control form-control-sm">
						<option>Select a location</option>
					</select>
				</div>
				
			</div>

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
						<input class="form-check-input" type="radio">
						<label class="form-check-label" for="gridCheck">Brand New</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio">
						<label class="form-check-label" for="gridCheck">Used</label>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col">
					<label for="exampleFormControlTextarea1">Description</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
				</div>
			</div>

			<div class="form-row align-items-center mt-3">
				<div class="input-group input-group-sm col">
					<input type="text" placeholder="Price" class="form-control" name="price" aria-describedby="basic-addon2">
					<div class="input-group-append">
						<span class="input-group-text" id="basic-addon2">LKR</span>
					</div>
				</div>

				<div class="form-group col mb-0">
					<div class="form-group form-check mb-0 ml-3">
						<input type="checkbox" class="form-check-input" name="negotiable">
						<label class="form-check-label" for="exampleCheck1">Negotiable</label>
					</div>
				</div>
			</div>

			<h6>Add Images</h6>
			<div class="d-flex flex-row flex-wrap my-4">
				<div class="my-ads-image">
					<div class="image">
						<img src="<?php echo base_url('assets/public/dist/images/no-image.png') ?>" class="img-fluid" alt="" id="imageAd" width="200px" heigh="150px">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<input type="file" class="inputfile" id="myAdImg" name="myadImg[]">
							<label for="add-image">Add Image</label>
						</div>
						<button type="button" class="btn btn-del-img btn-outline-danger" id="removeImg">Remove</button>
					</div>
					<!-- <small>Main Image</small> -->
				</div>

				<div class="my-ads-image">
					<div class="image">
						<img src="<?php echo base_url('assets/public/dist/images/no-image.png') ?>" class="img-fluid" alt="" id="imageAd1" width="200px" heigh="150px">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<input type="file" class="inputfile" id="myAdImg1" name="myadImg[]">
							<label for="add-image">Add Image</label>
						</div>
						<button type="button" class="btn btn-del-img btn-outline-danger" id="removeImg1">Remove</button>
					</div>
				</div>

				<div class="my-ads-image">
					<div class="image">
						<img src="<?php echo base_url('assets/public/dist/images/no-image.png') ?>" class="img-fluid" alt="" id="imageAd2" width="200px" heigh="150px">
					</div>
					<div class="img-controls">
						<div class="add-image">
							<input type="file" class="inputfile" id="myAdImg2" name="myadImg[]">
							<label for="add-image">Add Image</label>
						</div>
						<button type="button" class="btn btn-del-img btn-outline-danger" id="removeImg2">Remove</button>
					</div>
				</div>

			</div>



			<button type="submit" class="btn btn-primary-alt mt-3" id='publishAd'>Publish</button>

			<?php echo form_close();?>
		</div>

	</div>
</div>
