<?php if(empty($results)): ?>
<div class="container flex-length mt-5">
	<div class="no-ads mx-auto mt-5">
        <img class="mt-3" src="../assets/public/dist/images/new.png" alt="no-ads">
        <h2 class="text-center mt-3">You don't have any ads yet.</h2>
        <h5 class="text-center mt-3">Click the post your ad now button to post your ad.</h5>
        <div class="d-flex justify-content-center">
            <a href="<?Php echo base_url('post-ad/category');?>" class="btn btn-primary-alt mt-4">Post your ad now</a>
        </div>
        
    </div>
</div>
<?php else: ?>
<div class="container flex-length mt-5">
	<div class="card">
		<div class="card-body">
			<div class="d-flex flex-row justify-content-between align-items-center my-4">
				<h2>My Ads</h2>
				<p class="text-muted">3 out of 5 Ads</p>
			</div>
			
			<?php foreach ($results as $result): ?>
			<div class="my-ad">
				<div class="my-ad-image">
                    <img src="<?php echo base_url('assets/public/dist/images/property.jpg'); ?>" alt="My ad Main image" class="img-fluid" width="200px">
                </div>
				<div class="my-ad-info">
					<h3><?php echo $result['title']; ?></h3>
					
					<div class="my-ad-category">
						<h5><?php echo $result['category']; ?></h5>
						<i class="fa fa-long-arrow-right"></i>
						<p><?php echo $result['subcategory']; ?></p>
					</div>
					
                    <div class="d-flex align-items-center mr-4 mt-3">
						<?php if( (int) $result['status'] == 1): ?>
						<p class="text-muted mb-0">Status:</p>&nbsp; <span class="badge badge-pill badge-warning">Pending</span>
						<?php endif; ?>
					</div>
				</div>

				<div class="my-ad-btn">
					<a href="#" class="btn btn-primary-alt">Edit</a>
					<a href="#" class="btn btn-danger">Delete</a>
				</div>
			</div>
			<?php endforeach; ?>
            
		</div>
	</div>
</div>
<?php endif; ?>