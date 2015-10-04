 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/bookings' ?>"><i class="icon-arrow-left-3"></i></a> Book a ticket</h1>
            </div>
          </div> 
          
          <?php echo Search::search_form() ?>

         
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

