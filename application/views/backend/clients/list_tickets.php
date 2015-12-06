
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><a href="<?php echo base_url().'admin/clients' ?>"><i class="icon-arrow-left-3"></i></a> <?php echo lang('Booking history')?></h1>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo lang('Departure');?></th>
                    <th><?php echo lang('Arrival');?></th>
                    <th><?php echo lang('Direction');?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('client'); ?>

                  <?php $i = 1; foreach($clients as $client): ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $this->client->get_city_name($this->client->get_from($client->tour_id)) ?></td>
                      <td><?php echo $this->client->get_city_name($this->client->get_to($client->tour_id)); ?></td>
                      <td><?php if($client->returning == '1' ) echo lang('One way'); else echo lang('Returning'); ?></td>
                    </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
         </div>
