<div class="container">
  <div id="spinner"></div>
  <input type="hidden" value="<?php echo $categoryid; ?>" id="categoryid">
    <div id="loadLocations"></div>
</div>

<!-- Sub Category Modal -->
<div class="modal location-modal fade" id="locationModal" tabindex="-1" role="dialog" aria-labelledby="location-modalLabel" aria-hidden="true">
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
      <div id="modalSpinner"></div>
      <div class="modal-body">
        <div id="loadSubLocations"></div>
      </div>
      
    </div>
  </div>
</div>
<!-- /. of Sub Category Modal -->