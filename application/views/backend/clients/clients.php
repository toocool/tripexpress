
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header">Clients</h1>
          </div>  
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Identification number</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Total tickets</th>
                    <th>Total seats</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('client'); ?>

                  <?php $i = 1; foreach($clients as $client): ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $client->identification_nr ?></td>
                      <td><?php echo $client->client_firstname ?></td>
                      <td><?php echo $client->client_lastname ?></td>
                      <td><?php echo $client->total_tickets ?></td>
                      <td><?php echo $client->total_seats ?></td>
                    </tr> 
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div> 
         </div>
