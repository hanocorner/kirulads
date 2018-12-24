<style>
	html,
	body {
		min-height:100%;
		background-color: #ececec80;
	}

</style>
<div class="container mt-5">
	<div class="card post-ad-card">
		<div class="card-body">
			<h2>Sell an item or service</h2>

			<?php $attr = array('id'=>'post', 'class'=>'mt-4', 'method'=>'post'); ?>
			<?php echo form_open('public/post-ad/', $attr);?>

			<div class="form-row">
				<div class="form-group col-5">
					<select class="form-control form-control-sm">
						<option>Select a location</option>
					</select>
				</div>
			</div>

			<h5>Ad Information</h5>
			<div class="form-row">
				<div class="form-group col-5">
					<input type="text" placeholder="Title" class="form-control form-control-sm mt-3" name="title">
				</div>
			</div>

			Condition
			<div class="form-row">
				<div class="form-group col-5">
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
				<div class="form-group col-5">
					<label for="exampleFormControlTextarea1">Description</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
				</div>
            </div>
            
            <div class="form-row">
				<div class="form-group col-5">
					<label for="exampleFormControlTextarea1">Description</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
				</div>
			</div>

			<?php echo form_close();?>
		</div>

	</div>
</div>
