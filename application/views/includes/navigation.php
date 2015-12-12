<?php $page = $this->uri->segment(2);
$this->load->helper('language');
$this->lang->load('navigation', $this->session->userdata('language'));
?>
<?php if ($this->session->userdata['role'] == 0) { //ADMINISTATOR ?>
 <div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if ($page == "dashboard" || $page == ''){ echo "class='active'";} ?> >
              <a href="<?php echo base_url() ?>admin/dashboard">
                <div class="nav-icon"><span class="icon-home"></span></span></div>
                <div class="nav-title"><?php echo lang('Dashboard');?></div>
              </a>
            </li>
            <li <?php if ($page == "bookings"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/bookings">
                <div class="nav-icon"><span class="icon-files"></i></span></div>
                <div class="nav-title"><?php echo lang('Bookings');?></div>
              </a>
            </li>
            <li <?php if ($page == "members"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/members">
                <div class="nav-icon"><span class="icon-user-3"></span></div>
                <div class="nav-title"><?php echo lang('Members');?></div>
              </a>
            </li>
            <li <?php if ($page == "destinations"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/destinations">
                <div class="nav-icon"><span class="icon-location"></span></div>
                <div class="nav-title"><?php echo lang('Destinations');?></div>
              </a>
            </li>
            <li <?php if ($page == "tours"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/tours">
                <div class="nav-icon"><span class="icon-calendar"></span></div>
                <div class="nav-title"><?php echo lang('Tours');?></div>
              </a>
            </li>
            <li <?php if ($page == "clients"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/clients">
                <div class="nav-icon"><span class="icon-user-2"></span></div>
                <div class="nav-title"><?php echo lang('Clients');?></div>
              </a>
            </li>
            <li <?php if ($page == "statistics"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/statistics">
                <div class="nav-icon"><span class="icon-stats"></span></div>
                <div class="nav-title"><?php echo lang('Statistics');?></div>
              </a>
            </li>
            <li <?php if ($page == "settings"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/settings">
                <div class="nav-icon"><span class="icon-tools"></span></div>
                <div class="nav-title"><?php echo lang('Settings');?></div>
              </a>
            </li>
          </ul>
        </div>
<?php } elseif ($this->session->userdata['role'] == 1) { //EMPLOYEE ?>
  <div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if ($page == "dashboard" || $page == ''){ echo "class='active'";} ?> >
              <a href="<?php echo base_url() ?>admin/dashboard">
                <div class="nav-icon"><span class="icon-home"></span></span></div>
                <div class="nav-title"><?php echo lang('Dashboard');?></div>
              </a>
            </li>
            <li <?php if ($page == "bookings"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/bookings">
                <div class="nav-icon"><span class="icon-files"></i></span></div>
                <div class="nav-title"><?php echo lang('Bookings');?></div>
              </a>
            </li>
            <li <?php if ($page == "destinations"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/destinations">
                <div class="nav-icon"><span class="icon-location"></span></div>
                <div class="nav-title"><?php echo lang('Destinations');?></div>
              </a>
            </li>
            <li <?php if ($page == "tours"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/tours">
                <div class="nav-icon"><span class="icon-calendar"></span></div>
                <div class="nav-title"><?php echo lang('Tours');?></div>
              </a>
            </li>
            <li <?php if ($page == "clients"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/clients">
                <div class="nav-icon"><span class="icon-user-2"></span></div>
                <div class="nav-title"><?php echo lang('Clients');?></div>
              </a>
            </li>
          </ul>
        </div>
<?php } elseif ($this->session->userdata['role'] == 2) { //RESELLER ?>
  <div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <li <?php if ($page == "dashboard" || $page == ''){ echo "class='active'";} ?> >
              <a href="<?php echo base_url() ?>admin/dashboard">
                <div class="nav-icon"><span class="icon-home"></span></span></div>
                <div class="nav-title"><?php echo lang('Dashboard');?></div>
              </a>
            </li>
            <li <?php if ($page == "bookings"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/bookings">
                <div class="nav-icon"><span class="icon-files"></i></span></div>
                <div class="nav-title"><?php echo lang('Bookings');?></div>
              </a>
            </li>
            <li <?php if ($page == "clients"){ echo "class='active'";} ?>>
              <a href="<?php echo base_url() ?>admin/clients">
                <div class="nav-icon"><span class="icon-user-2"></span></div>
                <div class="nav-title"><?php echo lang('Clients');?></div>
              </a>
            </li>
          </ul>
        </div>
<?php } ?>
