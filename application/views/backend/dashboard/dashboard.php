
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header">Dashboard</h1>
          </div>  

          <div class="row" >
            <div class="col-md-4" style="padding-left:0px;">
              <div class="panel panel-default">
                <div class="panel-heading"><strong>Your stats</strong></div>
                

                <table class="table table-bordered">
                  
                  <tbody>
                    <?php $this->load->model('dashboard_stats'); ?>
                      <tr>
                        <td>Your username:</td>
                        <td><?php echo $this->session->userdata['username'] ?></td>
                      </tr>
                      <tr>
                        <td>Your role</td>
                        <td>
                          <?php 
                            if($this->dashboard_stats->member_role($this->session->userdata['username']) == 0) echo 'Administrator';
                              elseif($this->dashboard_stats->member_role($this->session->userdata['username']) == 1) echo 'Empoyee';
                                elseif($this->dashboard_stats->member_role($this->session->userdata['username']) == 2) echo 'Reseller';
                                  else echo 'Error';
                          ?>
                        </td>
                      </tr> 
                      <tr>
                        <td>Total tickets sold last 7 days</td>
                        <td><?php echo $this->dashboard_stats->total_tickets_per_week() ?></td>
                      </tr>
                      <tr>
                        <td>Total tickets sold this month</td>
                        <td><?php echo $this->dashboard_stats->total_tickets_per_month() ?></td>
                      </tr>  
                      <tr>
                        <td>Total tickets sold</td>
                        <td><?php echo $this->dashboard_stats->total_tickets() ?></td>
                      </tr> 
                      
                    

                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-8">
              <div class="panel panel-default">
                <div class="panel-heading"><strong>Available tours</strong></div>

                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>From</th>
                      <th>To</th>
                      <th>Time</th>
                      <th width="15%" class="text-center">Quick booking</th>
                     </tr>
                  </thead>
                  <tbody>
                    <?php $this->load->model('dashboard_stats'); ?>

                    <?php  foreach($upcoming_tours as $dashboard_upcoming): ?>
                      <?php 
                      //short variables
                      $from_name = $this->dashboard_stats->get_city_name($dashboard_upcoming->from);
                      $to_name = $this->dashboard_stats->get_city_name($dashboard_upcoming->to);
                      ?>
                      <tr>
                        <td><?php echo $this->dashboard_stats->get_city_name($dashboard_upcoming->from) ?></td>
                        <td><?php echo $this->dashboard_stats->get_city_name($dashboard_upcoming->to) ?></td>
                        <td>
                            <span class="icon-calendar" style="color:red;"></span> <?php echo date('d/m/Y', strtotime($dashboard_upcoming->from_start_time)) ?>
                            <div class="pull-right"><span class="icon-clock" style="color:red;"></span> <?php echo date('H:i', strtotime($dashboard_upcoming->from_start_time)) ?></div>
                        </td>
                        <td class="text-center">
                          <a href="<?php echo base_url().'admin/bookings/process_ticket?from='.$from_name.'&to='.$to_name.'&tickets=1&tour_id='.$dashboard_upcoming->tour_id ?>" class="btn btn-success btn-xs">Book ticket</a>
                        </td>
                      </tr> 
                    <?php  endforeach; ?>

                  </tbody>
                </table>
              </div>
            </div>


            
          </div> 
         </div>
