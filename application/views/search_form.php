
<div class="row">

<div class=" search_box col-sm-12 col-md-5" >
    <h4 style="margin-left:20px;"><?php echo lang('Search'); ?></h4>
    <hr/>

    <div class="col-sm-4 col-md-6">
      <div class="form-group">
        <label for="city"><?php echo lang('Departure city'); ?></label>
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
        <label for="city"><?php echo lang('Arrival city'); ?></label>
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
    <label><?php echo lang('Departure date'); ?> <span class="text-muted">(<?php echo lang('Optional'); ?>)</span></label>
      <div class="form-group date" id="datepicker1">
         <input type="text" class="form-control" name="from_date" id="from_date" data-date-format="YYYY-MM-DD" value="">
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
    <label><?php echo lang('Return date'); ?></label>
      <div class="form-group date" id="datepicker2">
         <input type="text" class="form-control" name="from_back_date" id="from_back_date" data-date-format="YYYY-MM-DD" value="">
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
       <div class="input-group spinner">
        <label for="booked_seats"><?php echo lang('Tickets'); ?></label>
        <input type="text" class="form-control" name="booked_seats" id="booked_seats" value="1" min="1" max="10">
        <div class="input-group-btn-vertical">
          <button class="btn btn-default" type="button"><i class="icon-arrow-up-4"></i></button>
          <button class="btn btn-default" type="button"><i class="icon-arrow-down-4"></i></button>
        </div>
        <?php echo form_error('booked_seats'); ?>
      </div>
    </div>

     <div class="col-sm-3 col-md-3">
        <div class="form-group">
          <label for="returning"><?php echo lang('Returning'); ?></label><br/>
           <input type="checkbox" name="returning" id="returning">
          <?php echo form_error('returning'); ?>
        </div>
    </div>
    <div class="col-sm-12 col-md-12"></div>


  	<div class="col-sm-12 col-md-12">
      <hr/>
      <button type="button" id="reset" class="btn btn-primary"><span class="icon-spin"></span> <?php echo lang('Reset'); ?></button>
  		<button type="button" id="check" class="btn btn-success" value="submit"><span class="icon-search"></span> <?php echo lang('Check available tours'); ?></button>

    </div>

</div>

<div class="col-sm-12 col-md-7" >
  <div class="row booking_results"><h2 class="text-muted" style="text-align:center; margin-top: 20%;"><?php echo lang('Your search results will be displayed here'); ?></h2></div>
  <button  class="btn btn-success btn-lg" id="next_step" ><span class="icon-arrow-right-3"></span> <?php echo lang('Next');?></button>

</div>



</div>

<script type="text/javascript">
  $(function(){

    $('.spinner .btn:first-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
        input.val(parseInt(input.val(), 10) + 1);
      } else {
        btn.next("disabled", true);
      }
    });
    $('.spinner .btn:last-of-type').on('click', function() {
      var btn = $(this);
      var input = btn.closest('.spinner').find('input');
      if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
        input.val(parseInt(input.val(), 10) - 1);
      } else {
        btn.prev("disabled", true);
      }
    });

})

  var base_url = "<?php echo base_url(); ?>admin/";
  var currency = "EUR"; //$this->booking->show_symbol($company_info->company_currency
  var destination = "<?php echo lang('Destination');?>";
  var time = "<?php echo lang('Departure time');?>";
  var price = "<?php echo lang('Price');?>";
  var currently = "<?php echo lang('Currently there are no tours available');?>";
  var from = "<?php echo lang('from');?>";
  var to = "<?php echo lang('to');?>";
</script>

<script type="text/javascript" src="<?php echo base_url() ?>js/ajax.js"></script>
