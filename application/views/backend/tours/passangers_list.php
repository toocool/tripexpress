
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/tours' ?>"><i class="icon-arrow-left-3"></i></a> <?php echo lang('Passangers list'); ?></h1>
            </div>

          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo lang('First name'); ?></th>
                    <th><?php echo lang('Last name'); ?></th>
                    <th><?php echo lang('ID number'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($clients)){  ?>
                    <?php $empty_data = ''; $i = 1; foreach($clients as $client): ?>
                      <tr>
                        <td><?php echo $i ?></td>
                        <td><?php echo ucfirst($client->client_firstname) ?></td>
                        <td><?php echo ucfirst($client->client_lastname) ?></td>
                        <td><?php echo $client->identification_nr ?></td>
                      </tr>

                    <?php $i++; endforeach; ?>
                  <?php } else {$empty_data = 'No passangers booked yet!';} ?>

                </tbody>
              </table>
            </div>
            <?php echo $empty_data; ?>
          </div>
         </div>
