<div class="container flex-length mt-5">
	<h5 class="text-center mb-4">Select a category</h5>
	<div class="row">
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="101">
				<p class="text-center mb-1"><i class="fa fa-car fa-fw"></i></p>
				<p class="text-center mb-0">Vehicles</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="100">
				<p class="text-center mb-1"><i class="fa fa-desktop fa-fw"></i></p>
				<p class="text-center mb-0">Electronics</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="102">
				<p class="text-center mb-1"><i class="fa fa-home fa-fw"></i></p>
				<p class="text-center mb-0">Property</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="104">
				<p class="text-center mb-1"><i class="fa fa-heartbeat fa-fw"></i></p>
				<p class="text-center mb-0">Fashion, Health & Beauty</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="105">
				<p class="text-center mb-1"><i class="fa fa-futbol-o fa-fw"></i></p>
				<p class="text-center mb-0">Hobby, Sport & Kids</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="107">
				<p class="text-center mb-1"><i class="fa fa-briefcase fa-fw"></i></p>
				<p class="text-center mb-0">Business & Industry</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="103">
				<p class="text-center mb-1"><i class="fa fa-sun-o fa-fw"></i></p>
				<p class="text-center mb-0">Home & Garden</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="110">
				<p class="text-center mb-1"><i class="fa fa-snapchat-ghost fa-fw"></i></p>
				<p class="text-center mb-0">Animals</p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-6 col-sm-4 col-md-3 col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="109">
				<p class="text-center mb-1"><i class="fa fa-graduation-cap fa-fw"></i></p>
				<p class="text-center mb-0">Education</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="111">
				<p class="text-center mb-1"><i class="fa fa-cutlery fa-fw"></i></p>
				<p class="text-center mb-0">Food & Agriculture</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="108">
				<p class="text-center mb-1"><i class="fa fa fa-wrench fa-fw"></i></p>
				<p class="text-center mb-0">Services</p>
			</div>
		</div>
		<div class="col-6 col-sm-4 col-md-3 col-6 col-sm-4 col-md-3 my-3">
			<div class="category-card" data-action="category" data-id="112">
				<p class="text-center mb-1"><i class="fa fa fa-archive fa-fw"></i></p>
				<p class="text-center mb-0">Other</p>
			</div>
		</div>
	</div>
</div>

<!-- Sub Category Modal -->
<div class="modal category-modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="d-flex align-items-center">
					<div>
						<h5 class="modal-title">Select a subcategory</h5>
					</div>
				</div>

				<a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
					&times;
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
