<div class="container">
	<div class="d-flex flex-row flex-wrap justify-content-center">
        <div class="card location-card" data-toggle="modal" data-target="#location-modal">
            <img src="<?php echo base_url('assets/public/dist/images/location/colombo.png'); ?>"  alt="">
            <p class="text-center mt-3 mb-0">Colombo</p>
        </div>
    </div>
</div>

<!-- Sub Category Modal -->
<div class="modal location-modal fade" id="location-modal" tabindex="-1" role="dialog" aria-labelledby="location-modalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <div class="d-flex align-items-center">
              <img src="<?php echo base_url('assets/public/dist/images/location/colombo.png'); ?>" alt="">
              <div>
              <h5 class="modal-title" id="exampleModalLabel">Colombo District</h5>
              <p class="text-muted">Select a local area within Colombo</p>
              </div>
          </div>
       
        <a data-dismiss="modal" aria-label="Close">
          <img src="<?php echo base_url('assets/public/dist/images/error.png'); ?>" alt="">
        </a>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-row flex-wrap">

            <a href="<?php echo base_url('post-ad/details/category/5/location/4'); ?>">Nuegagoda</a>
            <a href="<?php echo base_url('post-ad/advert/category/450'); ?>">Kotte</a>
            
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- /. of Sub Category Modal -->