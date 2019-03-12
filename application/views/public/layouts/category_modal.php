<!-- Category Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><i class="fa fa-sliders fa-fw"></i> Select Category</h5>
				<a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
					&times;
				</a>
			</div>
			<div class="modal-body" id="modalBodyCategory">
                <div id="modalSpinner" class="mx-auto mt-3"></div>
				<div class="all-ad-category" id="mainCategories">
					<ul>
						<li><a href="#" data-action="category" data-id=""><span><i class="fa fa-sliders fa-fw"></i></span> All Categories</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="100"><span><i class="fa fa-desktop fa-fw"></i></span> Electronics</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="101"><span><i class="fa fa-car fa-fw"></i></span> Vehicles</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="102"><span><i class="fa fa-home fa-fw"></i></span> Property</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="104"><span><i class="fa fa-heartbeat fa-fw"></i></span> Fashion, Health &
								Beauty</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="105"><span><i class="fa fa-futbol-o fa-fw"></i></span> Hobby, Sport & Kids</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="107"><span><i class="fa fa-briefcase fa-fw"></i></span> Business & Industry</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="103"><span><i class="fa fa-sun-o fa-fw"></i></span> Home & Garden</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="110"><span><i class="fa fa-snapchat-ghost fa-fw"></i></span> Animals</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="109"><span><i class="fa fa-graduation-cap fa-fw"></i></span> Education</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="111"><span><i class="fa fa-cutlery fa-fw"></i></span> Food & Agriculture</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="108"><span><i class="fa fa fa-wrench fa-fw"></i></span> Services</a></li>
						<li><a href="<?php echo $this->uri->segment(2); ?>" data-action="category" data-id="112"><span><i class="fa fa fa-archive fa-fw"></i></span> Other</a></li>
					</ul>
                </div>
                <div id="loadSubCategories"></div>
			</div>

		</div>
	</div>
</div>
<!-- /. of Category Modal -->