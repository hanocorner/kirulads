<div class="container my-5">
	<div class="row justify-content-center">
		<div class="col-4 bg-ad-post py-3">
			<h4>Delete Ad</h4>

			<p>Are you sure you want to delete this ad?</p>

			<div class="input-group mb-3">
				<select class="custom-select" id="">
					<option selected>Select reason</option>
					<option value="101">Sold on site</option>
					<option value="102">Other</option>
				</select>
            </div>
			<script>
				var slug = '<?php echo $this->uri->segment(3); ?>';
			</script>
            <div class="d-flex justify-content-end mt-4 mb-2">
            <button type="button" class="btn btn-danger mr-2" onclick="delete_ad(slug);">Yes, delete my ad</button>
            <button type="button" class="btn btn-light">Cancel</button>
            </div>
		</div>
	</div>
</div>
