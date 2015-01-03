
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><a href="<?php echo base_url().'admin/clients' ?>"><i class="icon-arrow-left-3"></i></a> Ticket history</h1>
          </div>  
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>from</th>
                    <th>to</th>
                    <th>returning</th>
                    <th>booked seats</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('client'); ?>

                  <?php $i = 1; foreach($clients as $client): ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $this->client->get_city_name($this->client->get_from($client->tour_id)) ?></td>
                      <td><?php echo $this->client->get_city_name($this->client->get_to($client->tour_id)); ?></td>
                      <td><?php if($client->returning == '1' ) echo 'One way'; else echo 'Returning'; ?></td>
                      <td><?php echo $client->booked_seats ?></td>
                    </tr> 
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div> 
         </div>
