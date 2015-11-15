 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/destinations' ?>"><i class="icon-arrow-left-3"></i></a> <?php echo lang('Add Destination') ?></h1>
            </div>
          </div>
          <div class="row">
            <?php //echo  validation_errors(); ?>
            <div class="col-sm-5 col-md-5">
             <?php echo form_open('admin/destinations/add_destination'); ?>
                <div class="form-group">
                  <label for="city"><?php echo lang('City') ?></label>
                  <input type="text" class="form-control" name="city" value="<?php echo set_value('city'); ?>">
                  <?php echo form_error('city'); ?>
                </div>
                <div class="form-group">
                  <label for="iso"><?php echo lang('ISO name') ?></label>
                  <input type="text" class="form-control" name="iso" value="<?php echo set_value('iso'); ?>">
                  <?php echo form_error('iso'); ?>
                </div>
              <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> <?php echo lang('Submit') ?></button>
              </form>
            </div>
          </div>
         </div>
