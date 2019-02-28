<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb mt-5">
			<li class="breadcrumb-item">
				<a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">
				Location
			</li>
		</ol>


		<div class="row">
			<div class="col-4">
                <?php $attr = array('id'=>'formAddLocation', 'method'=>'post'); ?>
				<?php echo form_open('admin/location/add', $attr); ?>
				<input type="hidden" id="locationId" name="parent" value="">
				<div class="form-group">
					<label for="Type">Location type</label>
					<select class="form-control" id="locationType">
						<option value="0">Parent Location</option>
						<option value="1">Sub Location</option>
					</select>

				</div>
				<div class="form-group">
					<label for="Parent">Parent Location</label>
					<select class="form-control" id="pLocation">

					</select>
				</div>
				<div class="form-group">
					<label for="location">Location</label>
					<input type="text" class="form-control" id="" name="name" placeholder="ex: Maharagama">

				</div>
				<button type="submit" class="btn btn-primary-alt" id="addLoc">Submit</button>
				<?php echo form_close(); ?>
			</div>
			<div class="col-8">
				<div class="grid-nav">
					<div class="input-group">
						<span class="mr-2">Show</span>
						<select id="rowCount" style="width:3rem;">
							<option selected="selected">10</option>
							<option>15</option>
							<option>25</option>
							<option>50</option>
						</select>
					</div>

					<a href="#" class="text-primary ml-3" data-action="reload"><span><i class="fa fa-refresh fa-fw" aria-hidden="true"></i></span>Refresh</a>
				</div>
				
				<div id="dataTableLocation"></div>
			</div>
		</div>
	</div>
</div>
