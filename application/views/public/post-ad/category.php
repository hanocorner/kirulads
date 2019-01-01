<div class="container">
    <div id="spinner"></div>
	<div id="loadCategories"></div>
</div>

<!-- Sub Category Modal -->
<div class="modal category-modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<img src="<?php echo base_url('assets/public/dist/images/category/electronics.png'); ?>" alt="">
					<div>
						<h5 class="modal-title" id="exampleModalLabel">Electronics Category</h5>
						<p class="text-muted">Select an option</p>
					</div>
				</div>

				<a data-dismiss="modal" aria-label="Close">
					<img src="<?php echo base_url('assets/public/dist/images/error.png'); ?>" alt="">
				</a>
			</div>
			<div id="modalSpinner"></div>
			<div class="modal-body">
				
				<div id="loadSubCategories"></div>
			</div>

		</div>
	</div>
</div>
<!-- /. of Sub Category Modal -->
