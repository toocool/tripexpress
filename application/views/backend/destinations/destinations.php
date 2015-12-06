
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-10 col-md-10" style="padding-left:0px;">
                <h1 class="page-header"><?php echo lang('Destinations') ?></h1>
            </div>
            <div class="col-sm-2 col-md-2">
               <a href="<?php echo base_url('admin/destinations/add_destination'); ?>"><button type="button" class="btn btn-primary top_button"><span class="icon-plus-2"></span> <?php echo lang('Add Destination') ?></button></a>
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
                    <th></th>
                    <th><?php echo lang('City') ?></th>
                    <th><?php echo lang('ISO name') ?></th>
                    <th><?php echo lang('Options') ?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; foreach($destinations as $destination): ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo ucfirst($destination->city) ?></td>
                      <td><?php echo strtoupper($destination->iso) ?></td>
                      <td style="text-align:center" width="20%">
                        <div class="btn-group" role="group">
                          <a href="<?php echo base_url('admin/destinations/edit_destination/'.$destination->destination_id); ?>" class="btn btn-default btn-xs"><span class="icon-pencil" style="color:green"></span> <?php echo lang('Edit') ?></a>
                          <a href="<?php echo base_url('admin/destinations/delete_destination/'.$destination->destination_id); ?>" class="btn btn-default btn-xs" onclick="return confirm('Are you sure you want to delete this destination?')"><span class="icon-cancel-2" style="color:red"></span> <?php echo lang('Delete') ?></a>
                        </div>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
         </div>
