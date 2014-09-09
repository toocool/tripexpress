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
                  <select class="form-control" name="city" value="<?php echo set_value('city'); ?>">
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>"><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('city'); ?>
                </div>
                <div  class="form-group">
                  <label for="iso">Departure date and time</label>
                  <div class="row">
                      <div class="col-md-6  date" id='datepicker1'>
                          <input type="text" class="form-control" name="date" data-date-format="DD/MM/YYYY">
                          <span class="input-group-addon"><span class="icon-calendar"></span>
                          </span>
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
                          <input type="text" class="form-control" name="time" data-date-format="HH:mm" >
                          <span class="input-group-addon"><span class="icon-clock"></span>
                          </span>
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
                   <select class="form-control" name="city" value="<?php echo set_value('city'); ?>">
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>"><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('city'); ?>
                </div>
                <div class="form-group">
                  <label for="iso">Return date and time</label>
                   <div class="row">
                      <div class="col-md-6 date" id='datepicker2'>
                          <input type="text" class="form-control" name="date" data-date-format="DD/MM/YYYY">
                          <span class="input-group-addon"><span class="icon-calendar"></span>
                          </span>
                      </div>
                        <script type="text/javascript">
                          $(function () {
                            $('#datepicker2').datetimepicker({
                              pickTime: false,
                              useCurrent: false
                            });
                          });
                        </script>
                      <div class="col-md-6  date" id='timepicker2'>
                          <input type="text" class="form-control" name="time"  >
                          <span class="input-group-addon"><span class="icon-clock"></span>
                          </span>
                      </div>
                        <script type="text/javascript">
                            $(function () {
                                $('#timepicker2').datetimepicker({
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

