
        <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-10 col-md-10" style="padding-left:0px;">
                <h1 class="page-header">Tours</h1>
            </div>
            <div class="col-sm-2 col-md-2">
               <a href="<?php echo base_url('admin/tours/add_tour'); ?>"><button type="button" class="btn btn-primary top_button"><span class="icon-plus-2"></span> create tour</button></a>
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
                    <th>From</th>
                    <th>To</th>
                    <th>Departure time</th>
                    <th>Total seats</th>
                    <th>Price</th>
                    <th>Date created</th>
                    <th>Options</th>
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
                        <span class="icon-calendar" style="color:red;"></span> <?php echo date('d/m/Y', strtotime($tour->from_start_time)) ?> 
                        <div class="pull-right"><span class="icon-clock" style="color:red;"></span> <?php echo date('H:i', strtotime($tour->from_start_time)) ?></div>
                      </td>
                      
                      <td><?php echo strtoupper($tour->available_seats) ?></td>
                      <td><?php echo strtoupper($tour->start_price) ?> <?php echo $this->tour->show_symbol($company_info->company_currency) ?></td>
                      <td><?php echo date('d/m/Y', strtotime($tour->date_created))  ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/tours/edit_tour/'.$tour->tour_id); ?>"><button type="button" class="btn btn-success btn-xs"><span class="icon-pencil"></span> Edit</button></a>
                        <a href="<?php echo base_url('admin/tours/delete_tour/'.$tour->tour_id); ?>" onclick="return confirm('Are you sure you want to delete this tour?')"><button type="button" class="btn btn-danger btn-xs"><span class="icon-cancel-2"></span> Delete</button></a>
                      </td>
                    </tr> 
                  <?php $i++; endforeach; ?>

                </tbody>
              </table>
            </div>
          </div> 
         </div>
