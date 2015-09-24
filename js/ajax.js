$(document).ready(function(){ 
	$("#check").click(function()
    {     
      //$("#from_results").html('');
      //$("#return_results").html('');
      //$('#book_ticket').attr('disabled','disabled');
      var tours_list = [];
      var tour = [];
      
     $.ajax({
         type: "POST",
         url: base_url + "bookings/ajax_check_tours", 
         data: {from: $("#from").val(), to: $("#to").val()},
         dataType: 'json',  
         cache:false,
         success: 
            function(data){
              
              var obj = jQuery.parseJSON(data);
              var tours = '';
              
              if(obj.length === 0){
                tours = 'Currently there are no tours for this destination';
              } 
              else{
                $.each( obj, function(index, value) {
                  tours += ("<tr>");
                  tours += ('<td><input type="radio" name="selected_one_way_destination" value="' + index + '"></td>');
                  tours += ("<td>" + $("#from option:selected").text() + " > " + $("#to option:selected").text() + "</td>");
                  tours += ("<td>" + value.start_time + "</td>");
                  tours += ("<td>" + value.start_price + "</td>");
                  tours += ("</tr>");
                });  
              }
              $("#from_results").html(tours);
            }
    });
     return false;
	});
});