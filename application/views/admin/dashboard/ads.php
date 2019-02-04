<div class="content-wrapper">
	<div class="container-fluid">
		<ol class="breadcrumb mt-5">
			<li class="breadcrumb-item">
				<a href="<?php echo base_url('admin/ads/all');?>">All Ads</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page" id="currentPage">Pending</li>
		</ol>

		<div class="grid-nav">
			<div class="input-group">
				<span class="mr-2">Show</span>
				<select id="rowCount" style="width:3rem;">
					<option selected="selected">10</option>
					<option>15</option>
					<option>25</option>
					<option>50</option>
				</select>
				<span class="mx-2">entries</span>
			</div>

			<select id="sortAds" class="ml-2">
				<option value="0" selected="selected">Pending</option>
				<option value="1">Approved</option>
				<option value="2">Problematic</option>
				<option value="3">Removed</option>
			</select>

			<a href="#" class="text-primary ml-3" data-action="reload"><span><i class="fa fa-refresh fa-fw" aria-hidden="true"></i></span>Refresh</a>
		</div>

		<div id="allData" class="mb-3"></div>

	</div><!-- /. of container fluid -->
</div><!-- /. of container wrapper -->
