
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-10 col-md-10" style="padding-left:0px;">
                <h1 class="page-header">Bookings</h1>
            </div>
            <div class="col-sm-2 col-md-2">
               <a href="<?php echo base_url('admin/bookings/add_ticket'); ?>"><button type="button" class="btn btn-primary top_button"><span class="icon-plus-2"></span> Book a ticket</button></a>
            </div>
          </div> 
          <div class="row">
              <?php 
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';            
              ?>
          </div> 
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>ID number</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Departure time</th>
                    <th>Return time</th>
                    <th>Seats booked</th>
                    <th>Options</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('booking'); ?>

                  <?php $i = 1; foreach($bookings as $booking): ?>
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
                      <td><?php echo $booking->booked_seats ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/bookings/edit_booking/'.$booking->booking_id); ?>"><button type="button" class="btn btn-success btn-xs"><span class="icon-pencil"></span> Edit</button></a>
                        <a href="<?php echo base_url('admin/bookings/delete_booking/'.$booking->booking_id); ?>" onclick="return confirm('Are you sure you want to delete this booking ticket?')"><button type="button" class="btn btn-danger btn-xs"><span class="icon-cancel-2"></span> Delete</button></a>
                      </td>
                    </tr> 
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div> 
         </div>
