<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb mt-5">
			<li class="breadcrumb-item">
				<a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">
				Categories
			</li>
		</ol>


		<div class="row">
			<div class="col-4">
                <?php $attr = array('id'=>'formAddCategory', 'method'=>'post'); ?>
				<?php echo form_open('admin/category/add', $attr); ?>
				<input type="hidden" id="categoryId" name="parent" value="">
				<div class="form-group">
					<label for="exampleFormControlSelect2">Category type</label>
					<select class="form-control" id="categoryType">
						<option value="0">Parent Category</option>
						<option value="1">Sub Category</option>
					</select>

				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect2">Parent category</label>
					<select class="form-control" id="pCategory">

					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect2">Category</label>
					<input type="text" class="form-control" id="" name="name" placeholder="ex: Mobile phones">

				</div>
				<button type="submit" class="btn btn-primary-alt" id="addCat">Submit</button>
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
				
				<div id="dataTableCategory"></div>
			</div>
		</div>
	</div>
</div>
