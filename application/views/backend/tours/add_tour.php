 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/tours' ?>"><i class="icon-arrow-left-3"></i></a> Add Tour</h1>
            </div>
          </div>  
          <div class="row">
            <?php //echo  validation_errors(); ?>
            <?php echo form_open('admin/tours/add_tour'); ?>
              <div class="col-sm-4 col-md-4">
             
                <div class="form-group">
                  <label for="city">Departure city</label>
                  <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">
                  <?php echo form_error('city'); ?>
                </div>
                <div class="form-group">
                  <label for="iso">Departure date and time</label>
                  <input type="text" class="form-control" name="iso" value="<?php echo set_value('iso'); ?>">
                  <?php echo form_error('iso'); ?>
                </div>
                <div class="form-group">
                  <label for="iso">One-way price</label>
                  <input type="text" class="form-control" name="iso" value="<?php echo set_value('iso'); ?>">
                  <?php echo form_error('iso'); ?>
                </div>
                <div class="form-group">
                  <label for="iso">Total available seats</label>
                  <input type="text" class="form-control" name="iso" value="<?php echo set_value('iso'); ?>">
                  <?php echo form_error('iso'); ?>
                </div>           
              </div>

              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label for="city">Arrival/return city</label>
                  <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">
                  <?php echo form_error('city'); ?>
                </div>
                <div class="form-group">
                  <label for="iso">Return date and time</label>
                  <input type="text" class="form-control" name="iso" value="<?php echo set_value('iso'); ?>">
                  <?php echo form_error('iso'); ?>
                </div>
                <div class="form-group">
                  <label for="iso">Return price</label>
                  <input type="text" class="form-control" name="iso" value="<?php echo set_value('iso'); ?>">
                  <?php echo form_error('iso'); ?>
                </div>                               
              </div>

              <div class="col-sm-12 col-md-12">
                <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> Submit</button>
              </div>
            </form>
          </div> 
         </div>
