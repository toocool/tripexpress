 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/bookings' ?>"><i class="icon-arrow-left-3"></i></a> Edit ticket</h1>
            </div>
          </div>  
          <div class="row">
            <?php //echo  validation_errors(); ?>
            <?php echo form_open('admin/bookings/edit_booking/'.$this->uri->segment(4)); ?>
              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label for="firstname">First name</label>
                   <input type="text" class="form-control" name="client_firstname" id="client_firstname" value="<?php echo set_value('client_firstname', $booking->client_firstname); ?>">
                  <?php echo form_error('client_firstname'); ?>
                </div>
                
                <div class="form-group">
                  <label for="city">Departure city</label>
                  <select class="form-control" name="from" id="from" >
                    <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('from', $city->destination_id, $booking->from == $city->destination_id)?> ><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('from'); ?>
                </div>
                <div class="form-group">
                  <label for="start_price">Identification number</label>
                  <input type="text" class="form-control" name="identification_nr" id="identification_nr" value="<?php echo set_value('identification_nr', $booking->identification_nr); ?>">
                  <?php echo form_error('identification_nr'); ?>
                </div>
                 <div class="form-group">
                  <label for="returning">Returning ticket?</label>
                   <select class="form-control" name="returning" id="returning" value="<?php echo set_select('returning', $booking->returning )?> >">
                      <option value="1">One way</option>
                      <option value="2">Returning ticket</option>
                   </select>
                  <?php echo form_error('returning'); ?>
                </div>
                          
              </div>

              <div class="col-sm-4 col-md-4">
                <div class="form-group">
                  <label for="client_lastname">Last name</label>
                   <input type="text" class="form-control" name="client_lastname" value="<?php echo set_value('client_lastname', $booking->client_lastname); ?>">
                  <?php echo form_error('client_lastname'); ?>
                </div>
               
                <div class="form-group">
                  <label for="city">Arrival city</label>
                   <select class="form-control" name="to" id="to" value="<?php echo set_value('city'); ?>">
                      <option value="0"></option>
                    <?php foreach($cities as $city):?>
                      <option value="<?php echo $city->destination_id ?>" <?php echo set_select('to', $city->destination_id, $booking->to == $city->destination_id)?> ><?php echo $city->city ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('to'); ?>
                </div>
                 <div class="form-group">
                  <label for="booked_seats">Seats to book</label>
                  <input type="text" class="form-control" name="booked_seats" id="booked_seats" value="<?php echo set_value('booked_seats', $booking->booked_seats); ?>">
                  <?php echo form_error('booked_seats'); ?>
                </div>
                <p></p>
                 <button type="button" id="check" style="margin-top: 25px;" class="btn btn-primary" value="submit"><span class="icon-spin"></span> Check available tours</button>
              </div>
              
              <div class="col-sm-12 col-md-12">
                <div class="row">
                  <div class="col-sm-4 col-md-4" id="from_results"></div>
                  <div class="col-sm-4 col-md-4" id="return_results"></div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-12" style="margin-top:30px;" >
                    <button type="submit" class="btn btn-success btn-lg" disabled="disabled" id="book_ticket" value="submit"><span class="icon-checkmark"></span> Save</button>
                  </div>
                </div>

              </div>


              
            </form>
          </div> 
         </div>
<script>
$(document).ready(function(){   
  
  $("#check").click(function()
    {     
      $("#from_results").html('');
      $("#return_results").html('');
      $('#book_ticket').attr('disabled','disabled');

      var base_url = "<?php echo base_url(); ?>admin/";
     $.ajax({
         type: "POST",
         url: base_url + "bookings/ajax_check_tours", 
         data: {from: $("#from").val(), to: $("#to").val()},
         dataType: 'json',  
         cache:false,
         success: 
            function(data){
              var obj = jQuery.parseJSON( data);
              $.each( obj, function( key, value ) {
              var to_info = value.split('|');
              $("#from_results").append('<div class="radio list-group-item"><label> <input type="radio" name="choose_from" id="choose_from" value="' + key + '" >Date: ' + to_info[0] + '<br/> Price: ' + to_info[1] + ' <?php echo $this->booking->show_symbol($company_info->company_currency) ?></label></div> ' ); //.hide().slideDown('slow') to add effects but I have to remember to use the hide() first
             });
            }
    });// .ajax
     return false;
  });
  
  $(document).on("change","#from_results input[type=radio]",function(){
    $("#return_results").html('');
    if($('#returning').val() == '2'){ // 2 = returning; 1 = one way
         
          var base_url = "<?php echo base_url(); ?>admin/";
         $.ajax({
             type: "POST",
             url: base_url + "bookings/ajax_check_tours_back", 
             data: {to: $("#to").val(), selected_back: $("#from_results input[type=radio]:checked").val()},
             dataType: 'json',  
             cache:false,
             success: 
                function(data){
                  var obj = jQuery.parseJSON( data);
                  $.each( obj, function( key, value ) {
                  var back_info = value.split('|');
                  $("#return_results").append('<div class="radio list-group-item"><label> <input type="radio" name="choose_back" id="choose_back" value="' + key + '" >Date: ' + back_info[0] + '<br/> Price: ' + back_info[1] + ' <?php echo $this->booking->show_symbol($company_info->company_currency) ?></label></div> ' ); //.hide().slideDown('slow') to add effects but I have to remember to use the hide() first
                 });
                }
        });// .ajax
         return false;
      }else{
        //$('#book_ticket').removeAttr('disabled');
        return false;

      }
    });

  $(document).on("change", "#from_results input[type=radio]",function(){
      if($('#returning').val() == '1'){
          $('#book_ticket').removeAttr('disabled');
        }
        else{
          $('#book_ticket').attr('disabled','disabled');
        }
  });

    $(document).on("change", "#return_results input[type=radio]",function(){
      if($('#returning').val() == '2'){
          $('#book_ticket').removeAttr('disabled');
        }
        else{
          $('#book_ticket').attr('disabled','disabled');
        }
  });

  $("#returning").change(function(){
    if($("#from_results").html() != ''){
      $("#check").trigger('click');
    }
   
  })
   

});
</script>


