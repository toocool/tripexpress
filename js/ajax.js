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
         data: {from: $("#from").val(), to: $("#to").val(), returning: $("#returning").prop('checked'), from_date: $('#from_date').val(), back_date: $('#from_back_date').val()},

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
                  if(value.ticket_type == 'one_way') {
                    tours += ("<tr>");
                    tours += ('<td style="text-align:center;"><input type="radio" name="selected_one_way" value="' + index + '"></td>');
                    tours += ('<td>' + $("#from option:selected").text() + ' <span class="icon-arrow-right"></span> ' + $("#to option:selected").text() + '</td>');
                    tours += ("<td>" + value.start_time + "</td>");
                    tours += ("<td>" + value.start_price + " " + value.currency + "</td>");
                    tours += ("</tr>");
                  }
                });

                tours += ('</tbody>');
                tours += ('</table>');
                tours += ('</div>');
                tours += ('</div><!-- col-sm -->');
                tours += ('</div><!-- .table-responsive -->');

                  //RETURNING TABLE
                  if($('input[name="returning"]:checked').length > 0) {
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
                      if(value.ticket_type == 'returning') {
                        tours += ("<tr>");
                        tours += ('<td style="text-align:center;"><input type="radio" name="selected_returning" value="' + index + '"></td>');
                        tours += ('<td>' + $("#to option:selected").text() + ' <span class="icon-arrow-right"></span> ' + $("#from option:selected").text() + '</td>');
                        tours += ("<td>" + value.start_time + "</td>");
                        tours += ("<td>" + value.start_price + " " + value.currency + "</td>");
                        tours += ("</tr>");
                      }
                    });

                    tours += ('</tbody>');
                    tours += ('</table>');
                    tours += ('</div>');
                    tours += ('</div><!-- col-sm -->');
                    tours += ('</div><!-- .table-responsive -->');
                  }
              }
              $('.booking_results').html(tours);
              // /$("#from_results").html(tours);
               
            }

    });
     return false;
	});
});