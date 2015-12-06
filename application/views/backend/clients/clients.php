
        <div class="col-sm-10 col-md-11 main">
          <div class="row" style="margin-right:0px;">
            <h1 class="page-header"><?php echo lang('Clients'); ?></h1>
          </div>
          <div class="row" style="margin-right:0px;margin-bottom: 10px;">
            <div class="col-sm-4 col-md-4" style="padding-left:0px;">
              <form class="form-inline" method="POST" action="clients/list_client">
                <div class="form-group">
                  <input type="text" class="form-control" id="client_search" name="client_search" placeholder="<?php echo lang('ID number') ?>">
                </div>
                <button type="submit" class="btn btn-primary"><?php echo lang('Search client'); ?></button>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo lang('ID number'); ?></th>
                    <th><?php echo lang('First name'); ?></th>
                    <th><?php echo lang('Last name'); ?></th>
                    <th><?php echo lang('Total tickets'); ?></th>
                    <th><?php echo lang('Options'); ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('client'); ?>

                  <?php
                    if ($this->pagination->per_page > $this->pagination->total_rows) $i =1 ;
                    else $i = 1 + ($this->pagination->cur_page-1)*$this->pagination->per_page;
                    foreach($clients as $client):
                  ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $client->identification_nr ?></td>
                      <td><?php echo $client->client_firstname ?></td>
                      <td><?php echo $client->client_lastname ?></td>
                      <td><?php echo $client->total_tickets ?></td>
                      <td style="text-align:center" width="20%">
                          <a href="<?php echo base_url('admin/clients/list_tickets/'.$client->identification_nr); ?>" class="btn btn-default btn-xs"><span class="icon-history" style="color:grey"></span> <?php echo lang('Booking history'); ?></a>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
            <ul class="pagination"><?php echo $links ?></ul>
          </div>
         </div>
