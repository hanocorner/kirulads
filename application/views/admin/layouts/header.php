<!-- Admin Header -->
<body class="fixed-nav sticky-footer" id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <a class="navbar-brand" href="index.html">Kirulads.lk Dashboard</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
          
          <li class="nav-item <?php if($this->uri->segment(2) == 'dashboard') echo 'active'; ?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo base_url('admin/dashboard');?>">
              <i class="fa fa-tachometer fa-fw" aria-hidden="true"></i>
              <span class="nav-link-text">Dashboard</span>
            </a>
          </li>

          <li class="nav-item <?php if($this->uri->segment(2) == 'ads') echo 'active'; ?>" data-toggle="tooltip" data-placement="right" title="All Ads">
            <a class="nav-link" href="<?php echo base_url('admin/ads/all');?>">
              <i class="fa fa-file-text-o fa-fw" aria-hidden="true"></i>
              <span class="nav-link-text">All Ads</span>
            </a>
          </li>

        </ul>
        <ul class="navbar-nav sidenav-toggler">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left fa-lg"></i>
            </a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto mr-4">
         <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url();?>admin/dashboard/profile">
            Welcome&nbsp;<?php echo ucwords($this->session->username); ?>Admin</a>
         </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>admin/logout">
              <i class="fa fa-fw fa-power-off fa-lg"></i></a>
          </li>
        </ul>
      </div>
    </nav>
