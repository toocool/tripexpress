
<div class="row search_box">
<!-- <?php echo form_open('admin/bookings/add_ticket'); ?> -->
<form>
  <div class="col-sm-4 col-md-4">
    <div class="form-group">
      <label for="city">Departure city</label>
      <select class="form-control" name="from" id="from" >
        <option value="0"></option>
        <?php foreach($cities as $city):?>
          <option value="<?php echo $city->destination_id ?>" <?php echo set_select('from',  $city->destination_id); ?> ><?php echo $city->city ?></option>
        <?php endforeach; ?>
      </select>
      <?php echo form_error('from'); ?>
    </div>
  </div>

  <div class="col-sm-4 col-md-4">
    <div class="form-group">
      <label for="city">Arrival city</label>
       <select class="form-control" name="to" id="to" value="<?php echo set_value('city'); ?>">
          <option value="0"></option>
        <?php foreach($cities as $city):?>
          <option value="<?php echo $city->destination_id ?>" <?php echo set_select('to',  $city->destination_id); ?>><?php echo $city->city ?></option>
        <?php endforeach; ?>
      </select>
      <?php echo form_error('to'); ?>
    </div>
  </div>

  <div class="col-sm-1 col-md-1">
     <div class="form-group">
      <label for="booked_seats">Seats</label>
      <input type="text" class="form-control" name="booked_seats" id="booked_seats" value="<?php echo set_value('booked_seats'); ?>">
      <?php echo form_error('booked_seats'); ?>
    </div>
  </div>

	<div class="col-sm-1 col-md-1">
	  	<div class="form-group">
	      <label for="returning">Returning</label>
	       <input type="checkbox">
	      <?php echo form_error('returning'); ?>
	    </div>
   </div>
	<div class="col-sm-2 col-md-2">	  
		<button type="button" id="check" style="margin-top: 25px;" class="btn btn-primary" value="submit"><span class="icon-spin"></span> Check available tours</button>
	</div>
</form>

	<div class="row">
                  <div class="col-sm-12 col-md-12">
                    <table class="table">
                      <thead>
                        <th></th>
                        <th>Destination</th>
                        <th>Time</th>
                        <th>Price</th>   
                      </thead>
                      <tbody id="from_results">
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="col-sm-4 col-md-4" id="return_results"></div>
                </div>

</div>
<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>admin/";
  var currency = "EUR"; //$this->booking->show_symbol($company_info->company_currency
</script>

<script type="text/javascript" src="<?php echo base_url() ?>js/ajax.js"></script> 