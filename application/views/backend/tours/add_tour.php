 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/tours' ?>"><i class="icon-arrow-left-3"></i></a> <?php echo lang('Create tour'); ?></h1>
            </div>
          </div>
          <div class="row">
            <?php //echo  validation_errors(); ?>
            <?php echo form_open('admin/tours/add_tour'); ?>
              <div class="col-sm-4 col-md-4">

                <div class="form-group">
                  <label for="city"><?php echo lang('Departure'); ?></label>
                  <select class="form-control" name="from" >
                    <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('from',  $city->destination_id); ?> ><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('from'); ?>
                </div>

                <div class="form-group">
                  <label for="city"><?php echo lang('Arrival'); ?></label>
                   <select class="form-control" name="to" value="<?php echo set_value('city'); ?>">
                      <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('to',  $city->destination_id); ?>><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('to'); ?>
                </div>

                <div class="form-group">
                  <label for="start_price"><?php echo lang('Price'); ?></label>
                  <input type="text" class="form-control" name="start_price" value="<?php echo set_value('start_price'); ?>">
                  <?php echo form_error('start_price'); ?>
                </div>

                <div class="form-group">
                  <label for="available_seats"><?php echo lang('Total seats'); ?></label>
                  <input type="text" class="form-control" name="available_seats" value="<?php echo set_value('available_seats'); ?>">
                  <?php echo form_error('available_seats'); ?>
                </div>
              </div>

              <div class="col-sm-4 col-md-4 alert alert-warning" >
                  <div  class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="tour_type" value="Manual" checked>
                            Manual
                      </label>
                    </div>

                    <label for="dateandtime"><?php echo lang('Departure time'); ?></label>
                    <div class="row">
                        <div class="col-md-6  date" id='datepicker1'>
                            <input type="text" class="form-control" name="from_start_date" placeholder="Date" data-date-format="DD-MM-YYYY" value="<?php echo set_value('from_start_date'); ?>">
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
                            <input type="text" class="form-control" name="from_start_time" placeholder="Time" data-date-format="HH:mm" value="<?php echo set_value('from_start_time'); ?>">
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
                  <hr/>
                  <div  class="form-group">
                    <div class="radio">
                      <label>
                        <input type="radio" name="tour_type" value="Automatic" >
                            Automatic
                      </label>
                    </div>
                    <label for="dateandtime"><?php echo lang('Period'); ?></label>
                    <div class="row">
                        <div class="col-md-6  date" id='datepicker3'>
                            <input type="text" class="form-control" placeholder="<?php echo lang('From'); ?>" name="automatic_from" data-date-format="DD-MM-YYYY" value="<?php echo set_value('automatic_from'); ?>">
                            <span class="input-group-addon"><span class="icon-calendar"></span>
                            </span>
                            <?php echo form_error('automatic_from'); ?>
                        </div>
                          <script type="text/javascript">
                            $(function () {
                              $('#datepicker3').datetimepicker({
                                pickTime: false,
                                useCurrent: false
                              });
                            });
                          </script>
                          <div class="col-md-6  date" id='datepicker4'>
                              <input type="text" class="form-control" placeholder="<?php echo lang('Until'); ?>" name="automatic_until" data-date-format="DD-MM-YYYY" value="<?php echo set_value('automatic_until'); ?>">
                              <span class="input-group-addon"><span class="icon-calendar"></span>
                              </span>
                              <?php echo form_error('automatic_until'); ?>
                          </div>
                          <script type="text/javascript">
                            $(function () {
                              $('#datepicker4').datetimepicker({
                                pickTime: false,
                                useCurrent: false
                              });
                            });
                          </script>
                    </div>
                  </div>
                  <div  class="form-group">

                    <div class="row">
                        <div class="col-md-6 " >
                            <label for="automatic_day">Every</label>
                              <select class="form-control" name="automatic_day">
                                  <option value="Day">Day</option>
                                  <option value="Monday">Monday</option>
                                  <option value="Tuesday">Tuesday</option>
                                  <option value="Wednesday">Wednesday</option>
                                  <option value="Thursday">Thursday</option>
                                  <option value="Friday">Friday</option>
                                  <option value="Saturday">Saturday</option>
                                  <option value="Sunday">Sunday</option>
                              </select>
                        </div>
                        <label for="city">&nbsp;</label>
                        <div class="col-md-6  date" id='timepicker5'>
                              <input type="text" class="form-control" name="automatic_time" placeholder="Time" data-date-format="HH:mm" value="<?php echo set_value('automatic_time'); ?>">
                              <span class="input-group-addon"><span class="icon-clock"></span>
                              </span>
                              <?php echo form_error('automatic_time'); ?>
                        </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#timepicker5').datetimepicker({
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


              </div>

              <div class="col-sm-12 col-md-12">
                <button type="submit" class="btn btn-success" value="submit"><span class="icon-checkmark"></span> <?php echo lang('Submit'); ?></button>
              </div>
            </form>
          </div>
         </div>
