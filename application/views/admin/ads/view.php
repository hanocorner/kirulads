<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb mt-5">
			<li class="breadcrumb-item">
				<a href="<?php echo base_url('admin/ads/all');?>">All Ads</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">
				<?php echo $results[0]->title; ?>
			</li>
		</ol>
		<section class="view mb-4">
			<div class="ad-view">
				<h5>Images</h5>
				<div class="images">

					<div class="perfundo mr-3">
						<a class="perfundo__link" href="#perfundo-img3">
							<?php $img_sm = $results[0]->path_string.'/thumb'.'/'.$results[0]->main_image; ?>
							<img src="<?php echo base_url('images/uploads/'.$img_sm);?>" alt="Demo image">
						</a>
						<div id="perfundo-img3" class="perfundo__overlay fadeIn">
							<figure class="perfundo__content perfundo__figure">
								<img src="<?php echo base_url('images/uploads/'.$img_sm);?>" alt="Demo image">
								<?php $img_lg = $results[0]->path_string.'/'.$results[0]->main_image; ?>
								<div class="perfundo__image" style="width: 800px; padding-top: 66.25%; background-image: url(<?php echo base_url('images/uploads/'.$img_lg);?>);"></div>
							</figure>
							<a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
							<a class="perfundo__prev perfundo__control" href="#perfundo-img2">Prev</a>
						</div>
					</div>
					<?php if($results[0]->sub_images != '' || $results[0]->sub_images != null): ?>
					<?php $img_array = explode(',', $results[0]->sub_images); ?>
					<?php foreach ($img_array as $image): ?>
					<div class="perfundo">
						<a class="perfundo__link" href="#perfundo-img2">
							<img src="<?php echo base_url('images/uploads/'.$results[0]->path_string.'/thumb'.'/'.$image);?>" alt="Demo image">
						</a>
						<div id="perfundo-img2" class="perfundo__overlay fadeIn">
							<figure class="perfundo__content perfundo__figure">
								<img src="<?php echo base_url('images/uploads/'.$results[0]->path_string.'/thumb'.'/'.$image);?>" alt="Demo image">
								<div class="perfundo__image" style="width: 800px; padding-top: 66.25%; background-image: url(<?php echo base_url('images/uploads/'.$results[0]->path_string.'/'.$image);?>);"></div>
							</figure>
							<a href="#perfundo-untarget" class="perfundo__close perfundo__control">Close</a>
							<a class="perfundo__next perfundo__control" href="#perfundo-img3">Next</a>
							<a class="perfundo__prev perfundo__control" href="#perfundo-img1">Prev</a>
						</div>
                    </div>
                    <?php endforeach; ?>
					<?php endif; ?>
				</div>

				<div class="content">
					<h5>Title</h5>
					<p>
						<?php echo $results[0]->title; ?>
					</p>
					<h5>Status</h5>
					<?php  $status = (int) $results[0]->status; ?>
					<?php if($status == 0): ?>
					<p><span class="badge badge-warning">Pending</span></p>
					<?php elseif($status == 1): ?>
					<p><span class="badge badge-success">Approved</span></p>
					<?php elseif($status == 2): ?>
					<p><span class="badge badge-danger">Problematic</span></p>
					<?php elseif($status == 3): ?>
					<p><span class="badge badge-primary">Sold on site</span></p>
					<?php endif;?>
					<h5>Url</h5>
					<p>
						<?php echo $results[0]->slug; ?>
					</p>
					<h5>Date</h5>
					<p>
						<?php echo $results[0]->date; ?>
					</p>
					<h5>Price</h5>
					<p class="text-danger">Rs.
						<?php echo $results[0]->price; ?>
					</p>
					<h5>Item Condition</h5>
					<?php  $condition = (int) $results[0]->item_condition; ?>
					<?php if($condition == 0): ?>
					<p>Used</p>
					<?php elseif($condition == 1): ?>
					<p>New</p>
					<?php endif;?>
					<h5>Location</h5>
					<p>
						<?php echo $results[0]->location; ?>,
						<?php echo $results[0]->sublocation; ?>
					</p>
					<h5>Category</h5>
					<p>
						<?php echo $results[0]->category; ?>,
						<?php echo $results[0]->subcategory; ?>
					</p>
					<h5>Description</h5>
					<p>
						<?php echo $results[0]->description; ?>
					</p>
					<h5>Customer Name</h5>
					<p>
						<?php echo $results[0]->fullname; ?>
					</p>
					<h5>Customer Email</h5>
					<p>
						<?php echo $results[0]->email; ?>
					</p>
					<h5>Customer Number</h5>
					<p>
						<?php echo $results[0]->phone_number; ?>
					</p>
				</div>

				<div class="buttons">
					<button type="button" class="btn btn-success" id="approveBtn" data-id="<?php echo $this->uri->segment(4); ?>"><i
						 class="fa fa-check" aria-hidden="true"></i> Approve</button>
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-ban"
						 aria-hidden="true"></i> Reject</button>
					<button type="button" class="btn btn-light" onclick="window.close();"><i class="fa fa-arrow-left" aria-hidden="true"></i>
						Go Back</button>
				</div>
			</div>
		</section>
	</div><!-- /. of container fluid -->
</div><!-- /. of container wrapper -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Your Comment</h5>
			</div>
			<div class="modal-body">
				<!-- Alert box -->
				<div id="messageBox"></div>
				<!-- /. Alert box -->

				<?php $attr = array('id'=>'formAdReject', 'method'=>'post'); ?>
				<?php echo form_open('admin/dashboard/ads/add-rejection-comment', $attr);?>
				<div class="form-group">
					<label for="comment">Comment<sup class="text-danger">*</sup></label>
					<textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
					<input type="hidden" name="id" value="<?php echo $this->uri->segment(4); ?>">
				</div>
				<?php echo form_close();?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary-alt" id="rComment">Submit</button>
			</div>
		</div>
	</div>
</div>
