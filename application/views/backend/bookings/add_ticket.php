 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/bookings' ?>"><i class="icon-arrow-left-3"></i></a> Book a ticket</h1>
            </div>
          </div>  
          <div class="row">
            <?php //echo  validation_errors(); ?>
            <?php echo form_open('admin/tours/add_ticket'); ?>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label for="firstname">First name</label>
                   <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo set_value('firstname'); ?>">
                  <?php echo form_error('firstname'); ?>
                </div>
                <div class="form-group">
                  <label for="city">Departure city</label>
                  <select class="form-control" name="from" >
                    <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('from',  $city->destination_id); ?> ><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('from'); ?>
                </div>
                <div class="form-group">
                  <label for="start_price">ID number</label>
                  <input type="text" class="form-control" name="start_price" value="<?php echo set_value('start_price'); ?>">
                  <?php echo form_error('start_price'); ?>
                </div>
                          
              </div>

              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label for="lastname">Last name</label>
                   <input type="text" class="form-control" name="lastname" value="<?php echo set_value('lastname'); ?>">
                  <?php echo form_error('lastname'); ?>
                </div>
                <div class="form-group">
                  <label for="city">Arrival/return city</label>
                   <select class="form-control" name="to" value="<?php echo set_value('city'); ?>">
                      <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('to',  $city->destination_id); ?>><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('to'); ?>
                </div>
                 <div class="form-group">
                  <label for="available_seats">Seats to book</label>
                  <input type="text" class="form-control" name="available_seats" value="<?php echo set_value('available_seats'); ?>">
                  <?php echo form_error('available_seats'); ?>
                </div>
              </div>
              <div class="col-sm-12 col-md-12">
                <div class="row">
                  <div class="col-sm-4 col-md-4" id="from_results">
                   <div class="radio available_tours">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        12/12/2014 15:00
                      </label>
                    </div>
                    <div class="radio available_tours">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        04/01/2014 13:00
                      </label>
                    </div>
                    <div class="radio available_tours">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        15/25/2014 16:00
                      </label>
                    </div>
                  </div>
                   <div class="col-sm-4 col-md-4">
                   <div class="radio available_tours">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        12/12/2014 15:00
                      </label>
                    </div>
                    <div class="radio available_tours">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        04/01/2014 13:00
                      </label>
                    </div>
                    <div class="radio available_tours">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        15/25/2014 16:00
                      </label>
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-sm-8 col-md-8">
                <button type="button" id="check" class="btn btn-primary" value="submit"><span class="icon-spin"></span> Check available tours</button>
                <button type="submit" class="btn btn-success" style="float:right;" disabled value="submit"><span class="icon-checkmark"></span> Book ticket</button>
              </div>
            </form>
          </div> 
         </div>
         <script>
$(document).ready(function(){   

    $("#check").click(function()
    {     
      var base_url = "<?php echo base_url(); ?>admin/";
     $.ajax({
         type: "POST",
         url: base_url + "bookings/ajax_check_tours", 
         data: {firstname: $("#firstname").val()},
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                alert(data);  //as a debugging message.
                $('#from_results').append(data);
              }
          });// you have missed this bracket
     return false;
 });
 });
         </script>

