
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-8 col-md-10" style="padding-left:0px;">
                <h1 class="page-header"><?php echo lang('Tours') ;?></h1>
            </div>
            <div class="col-sm-8 col-md-2  " >
               <a href="<?php echo base_url('admin/tours/add_tour'); ?>" class="btn btn-primary top_button"><span class="icon-plus-2"></span> <?php echo lang('Create tour') ;?> </a>
            </div>

          </div>

          <div class="row">
              <?php
                if ($this->session->flashdata('message') != '') echo '<div class="alert alert-success" role="alert">' . $this->session->flashdata('message') . '</div>';
              ?>
          </div>
          <div class="row">
            <div class="table-responsive">
              <table class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th></th>
                    <th><?php echo lang('Departure') ;?></th>
                    <th><?php echo lang('Arrival') ;?></th>
                    <th><?php echo lang('Departure time') ;?></th>
                    <th><?php echo lang('Total seats') ;?></th>
                    <th><?php echo lang('Price') ;?></th>
                    <th><?php echo lang('Date created') ;?></th>
                    <th><?php echo lang('Status') ?></th>
                    <th width="22%"><?php echo lang('Options') ;?></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $this->load->model('tour'); ?>

                  <?php $i = 1; foreach($tours as $tour): ?>
                      <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $this->tour->get_city_name($tour->from) ?></td>
                      <td><?php echo $this->tour->get_city_name($tour->to) ?></td>
                      <td>
                        <span class="icon-calendar" style="color:red;"></span> <?php echo date('d.m.Y', strtotime($tour->from_start_time)) ?>
                        <div class="pull-right"><span class="icon-clock" style="color:red;"></span> <?php echo date('H:i', strtotime($tour->from_start_time)) ?></div>
                      </td>

                      <td><?php echo strtoupper($tour->available_seats) ?></td>
                      <td><?php echo strtoupper($tour->start_price) ?> <?php echo $this->tour->show_symbol($company_info->company_currency) ?></td>
                      <td><?php echo date('d.m.Y', strtotime($tour->date_created))  ?></td>
                      <td style="text-align:center"><?php tour::status($tour->from_start_time) ?></td>
                      <td style="text-align:center" width="20%">
                        <div class="btn-group" role="group">
                          <a href="<?php echo base_url('admin/tours/list_passangers/'.$tour->tour_id); ?>" class="btn btn-default btn-xs"><span class="icon-list" style="color:grey"></span> <?php echo lang('Passangers list') ?></a>
                          <a href="<?php echo base_url('admin/tours/edit_tour/'.$tour->tour_id); ?>" class="btn btn-default btn-xs"><span class="icon-pencil" style="color:green"></span> <?php echo lang('Edit') ?></a>
                          <a href="<?php echo base_url('admin/tours/delete_tour/'.$tour->tour_id); ?>" class="btn btn-default btn-xs" onclick="return confirm('Are you sure you want to delete this tour?')"><span class="icon-cancel-2" style="color:red"></span> <?php echo lang('Delete') ?></a>
                        </div>
                      </td>
                    </tr>
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div>
         </div>
