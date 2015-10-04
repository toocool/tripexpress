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
              $('.booking_results').css({"margin-left":"-30px","margin-top":"-25px"});
              if(obj.length === 0){
                tours = 'Currently there are no tours for this destination';
              } 
              else{
                tours += ('<div class="col-sm-12 col-md-12">');
                tours += ('<div class="table-responsive ">');
                tours += ('<table class="table table-bordered">');
                tours += ('<thead>');
                tours += ('<th></th>');
                tours += ('<th>Destination</th>');
                tours += ('<th>Time</th>');
                tours += ('<th>Price</th> ');  
                tours += ('</thead>');
                tours += ('<tbody id="from_results">');
                
                $.each( obj, function(index, value) {
                  tours += ("<tr>");
                  tours += ('<td><input type="radio" name="selected_one_way_destination" value="' + index + '"></td>');
                  tours += ('<td>' + $("#from option:selected").text() + ' <span class="icon-arrow-right" aria-hidden="true"></span> ' + $("#to option:selected").text() + '</td>');
                  tours += ("<td>" + value.start_time + "</td>");
                  tours += ("<td>" + value.start_price + " " + value.currency + "</td>");
                  tours += ("</tr>");
                });

                tours += ('</tbody>');
                tours += ('</table>');
                tours += ('</div>');
                tours += ('</div><!-- col-sm -->');
                tours += ('</div><!-- .table-responsive -->');
              }
              $('.booking_results').html(tours);
              // /$("#from_results").html(tours);
            }
    });
     return false;
	});
});