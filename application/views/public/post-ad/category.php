<style>
	body {
        background-color: #ececec80;
    }

</style>
<div class="container">
	<div class="d-flex flex-row flex-wrap justify-content-center">
        <div class="card category-card" data-toggle="modal" data-target="#exampleModal">
            <img src="<?php echo base_url('assets/public/dist/images/category/electronics.png'); ?>" class="img-fluid" *alt="" >
            <p class="text-center mt-3 mb-0">Electronics</p>
        </div>

        <div class="card category-card">
            <img src="<?php echo base_url('assets/public/dist/images/category/vehicles.png'); ?>" class="img-fluid" alt="" >
            <p class="text-center mt-3 mb-0">Vehicles</p>
        </div>

        <div class="card category-card">
            <img src="<?php echo base_url('assets/public/dist/images/category/vehicles.png'); ?>" class="img-fluid" alt="" >
            <p class="text-center mt-3 mb-0">Vehicles</p>
        </div>

        <div class="card category-card">
            <img src="<?php echo base_url('assets/public/dist/images/category/vehicles.png'); ?>" class="img-fluid" alt="" >
            <p class="text-center mt-3 mb-0">Vehicles</p>
        </div>

        <div class="card category-card">
            <img src="<?php echo base_url('assets/public/dist/images/category/vehicles.png'); ?>" class="img-fluid" alt="" >
            <p class="text-center mt-3 mb-0">Vehicles</p>
        </div>
        <div class="card category-card">
            <img src="<?php echo base_url('assets/public/dist/images/category/vehicles.png'); ?>" class="img-fluid" alt="" >
            <p class="text-center mt-3 mb-0">Vehicles</p>
        </div>
        <div class="card category-card">
            <img src="<?php echo base_url('assets/public/dist/images/category/vehicles.png'); ?>" class="img-fluid" alt="" >
            <p class="text-center mt-3 mb-0">Vehicles</p>
        </div>
    </div>
</div>

<!-- Sub Category Modal -->
<div class="modal category-modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <div class="modal-body">
        <div class="d-flex flex-row flex-wrap">

            <a href="<?php echo base_url('post-ad/advert?category=elc&sub=mob'); ?>">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
            <a href="#">Mobile Phone Accessories</a>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- /. of Sub Category Modal -->