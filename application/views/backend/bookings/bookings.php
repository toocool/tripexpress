
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-10 col-md-10" style="padding-left:0px;">
                <h1 class="page-header"><?php echo lang('Bookings');?></h1>
            </div>
            <div class="col-sm-2 col-md-2">
               <a href="<?php echo base_url('admin/bookings/add_ticket'); ?>"><button type="button" class="btn btn-primary top_button"><span class="icon-plus-2"></span> <?php echo lang('Book a ticket');?></button></a>
            </div>
          </div>
          <div class="row">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><?php echo $this->session->userdata['user_id']?></th>
                    <th><?php echo lang('First name');?></th>
                    <th><?php echo lang('Last name');?></th>
                    <th><?php echo lang('ID number');?></th>
                    <th><?php echo lang('Departure');?></th>
                    <th><?php echo lang('Arrival');?></th>
                    <th><?php echo lang('Departure time');?></th>
                    <th><?php echo lang('Return time');?></th>
                    <th><?php echo lang('Booked by');?></th>
                    <th ><?php echo lang('Options');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('booking'); ?>

                  <?php
                    if ($this->pagination->per_page >= $this->pagination->total_rows) $i =1 ;
                    else $i = 1 + ($this->pagination->cur_page-1)*$this->pagination->per_page;
                    foreach($bookings as $booking):
                  ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $booking->client_firstname ?></td>
                      <td><?php echo $booking->client_lastname ?></td>
                      <td><?php echo $booking->identification_nr ?></td>

                      <td><?php echo $this->booking->get_city_name($booking->from) ?></td>
                      <td><?php echo $this->booking->get_city_name($booking->to) ?></td>
                      <td>
                        <span class="icon-calendar" style="color:red;"></span> <?php echo date('d/m/Y', strtotime($this->booking->show_booking_date($booking->from))) ?>
                        <div class="pull-right"><span class="icon-clock" style="color:red;"></span> <?php echo date('H:i', strtotime($this->booking->show_booking_date($booking->from))) ?></div>
                      </td>
                      <td>
                        <?php if($booking->returning == '2') { //1 = one way; 2 = returning ticket ?>
                        <span class="icon-calendar" style="color:red;"></span> <?php echo date('d/m/Y', strtotime($this->booking->show_booking_date($booking->to))) ?>
                        <div class="pull-right"><span class="icon-clock" style="color:red;"></span> <?php echo date('H:i', strtotime($this->booking->show_booking_date($booking->to))) ?></div>
                        <?php } ?>
                      </td>
                      <td><?php echo $this->booking->get_username($booking->created_by) ?></td>
                      <td style="text-align:center">
                        <div class="btn-group" role="group">
                          <a href="<?php echo base_url('admin/bookings/pdf/'.$booking->booking_id); ?>" target="_blank" class="btn btn-default btn-xs"><span class="icon-file-pdf" style="color:red"></span> <?php echo lang('Invoice')?></a>
                          <!-- <a href="<?php echo base_url('admin/bookings/edit_booking/'.$booking->booking_id); ?>" class="btn btn-default btn-xs"><span class="icon-pencil" style="color:green"></span> <?php echo lang('Edit')?></a> -->
                          <a href="<?php echo base_url('admin/bookings/delete_booking/'.$booking->booking_id); ?>" onclick="return confirm('Are you sure you want to delete this booking ticket?')" class="btn btn-default btn-xs"><span class="icon-cancel-2" style="color:red"></span> <?php echo lang('Delete')?></a>
                        </div>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
            <ul class="pagination"><?php echo $links ?></ul>
          </div>
         </div>
