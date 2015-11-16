 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/tours' ?>"><i class="icon-arrow-left-3"></i></a> <?php echo lang('Edit tour')?></h1>
            </div>
          </div>
          <div class="row">
            <?php //echo  validation_errors(); ?>
            <?php echo form_open('admin/tours/edit_tour/'.$this->uri->segment(4)); ?>
              <div class="col-sm-4 col-md-4">

                <div class="form-group">
                  <label for="city"><?php echo lang('Departure'); ?></label>
                  <select class="form-control" name="from" >
                    <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('from', $city->destination_id, $tour->from == $city->destination_id)?> ><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('from'); ?>
                </div>
                <div  class="form-group">
                  <label for="dateandtime"><?php echo lang('Departure time'); ?></label>
                  <div class="row">
                      <div class="col-md-6  date" id='datepicker1'>
                          <input type="text" class="form-control" name="from_start_date" data-date-format="DD-MM-YYYY" value="<?php echo set_value('from_start_date', date('d-m-Y', strtotime($tour->from_start_time))); ?>">
                          <span class="input-group-addon"><span class="icon-calendar"></span>
                          </span>
                          <?php echo form_error('from_start_date'); ?>
                      </div>
                        <script type="text/javascript">
                          $(function () {
                            $('#datepicker1').datetimepicker({
                              pickTime: false,
                              useCurrent: false
                            });
                          });
                        </script>
                      <div class="col-md-6  date" id='timepicker1'>
                          <input type="text" class="form-control" name="from_start_time" data-date-format="HH:mm" value="<?php echo set_value('from_start_time', date('H:i', strtotime($tour->from_start_time))); ?>">
                          <span class="input-group-addon"><span class="icon-clock"></span>
                          </span>
                           <?php echo form_error('from_start_time'); ?>
                      </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#timepicker1').datetimepicker({
                                    pickDate: false,
                                    useCurrent: false,
                                    icons: {
                                      up: "icon-arrow-up",
                                      down: "icon-arrow-down"
                                    }
                                });
                            });
                        </script>
                  </div>
                </div>
                <div class="form-group">
                  <label for="start_price"><?php echo lang('Price'); ?></label>
                  <input type="text" class="form-control" name="start_price" value="<?php echo set_value('start_price', $tour->start_price); ?>">
                  <?php echo form_error('start_price'); ?>
                </div>

              </div>

              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label for="city"><?php echo lang('Arrival'); ?></label>
                   <select class="form-control" name="to" >
                      <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('to', $city->destination_id, $tour->to == $city->destination_id); ?>><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('to'); ?>
                </div>
                <div class="form-group">
                  <label for="available_seats"><?php echo lang('Total seats'); ?></label>
                  <input type="text" class="form-control" name="available_seats" value="<?php echo set_value('available_seats', $tour->available_seats); ?>">
                  <?php echo form_error('available_seats'); ?>
                </div>


              </div>

              <div class="col-sm-12 col-md-12">
                <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> <?php echo lang('Submit'); ?></button>
              </div>
            </form>
          </div>
         </div>
