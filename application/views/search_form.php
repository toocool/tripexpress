
<div class="row">

<div class=" search_box col-sm-12 col-md-5" >
    <h4 style="margin-left:20px;">Search</h4>
    <hr/>

    <div class="col-sm-4 col-md-6">
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

    <div class="col-sm-4 col-md-6">
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

    <div class="col-sm-4 col-md-6">
    <label>Departure date <span class="text-muted">(Optional)</span></label>
      <div class="form-group date" id="datepicker1">
         <input type="text" class="form-control" name="from_date" data-date-format="YYYY-MM-DD" value="">
          <span class="input-group-addon"><span class="icon-calendar"></span></span>
          <script type="text/javascript">
              $(function () {
                $('#datepicker1').datetimepicker({
                  pickTime: false,
                  useCurrent: false
                });
              });
          </script>
      </div>
    </div>

    <div class="col-sm-4 col-md-6">
    <label>Return date</label>
      <div class="form-group date" id="datepicker2">
         <input type="text" class="form-control" name="from_back_date" data-date-format="YYYY-MM-DD" value="">
          <span class="input-group-addon"><span class="icon-calendar"></span></span>
          <script type="text/javascript">
              $(function () {
                $('#datepicker2').datetimepicker({
                  pickTime: false,
                  useCurrent: false
                });
              });
          </script>
      </div>
    </div>
      

    <div class="col-sm-3 col-md-3">
       <div class="form-group">
        <label for="booked_seats">Tickets</label>
        <input type="text" class="form-control" name="booked_seats" id="booked_seats" value="<?php echo set_value('booked_seats'); ?>">
        <?php echo form_error('booked_seats'); ?>
      </div>
    </div>

     <div class="col-sm-3 col-md-3">
        <div class="form-group">
          <label for="returning">Returning</label><br/>
           <input type="checkbox" name="returning" id="returning">
          <?php echo form_error('returning'); ?>
        </div>
    </div>
    <div class="col-sm-12 col-md-12"></div>    
    

  	<div class="col-sm-12 col-md-12">
      <hr/>
      <button type="button" id="reset" class="btn btn-primary"><span class="icon-spin"></span> Reset</button>
  		<button type="button" id="check" class="btn btn-success" value="submit"><span class="icon-search"></span> Check available tours</button>

    </div>

</div>

<div class="col-sm-12 col-md-7" >
  <div class="row booking_results"></div>
  
</div>

     

</div>

<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>admin/";
  var currency = "EUR"; //$this->booking->show_symbol($company_info->company_currency
</script>

<script type="text/javascript" src="<?php echo base_url() ?>js/ajax.js"></script> 