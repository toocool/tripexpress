$('#next_step').hide();
$(document).ready(function(){
  $("#check").click(function()
    {
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
                $('#next_step').hide().attr( "disabled", "disabled" );
                tours = '<h2 class="text-muted" style="text-align:center; margin-top: 20%;">'+currently+'<br/> '+from+' <strong>'+$("#from option:selected").text()+'</strong> '+to+' <strong>'+$("#to option:selected").text()+'</strong></h2>';
              }
              else{
                $('#next_step').show().attr( "disabled", "disabled" );
                tours += ('<div class="col-sm-12 col-md-12">');
                tours += ('<div class="table-responsive ">');
                tours += ('<table class="table table-bordered">');
                tours += ('<thead>');
                tours += ('<th></th>');
                tours += ('<th>'+destination+'</th>');
                tours += ('<th>'+time+'</th>');
                tours += ('<th>'+price+'</th> ');
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
                    tours += ('<th>'+destination+'</th>');
                    tours += ('<th>'+time+'</th>');
                    tours += ('<th>'+price+'</th> ');
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

              //enable NEXT button if atleast the one way tour is selected from the results list
              $('input[type=radio][name=selected_one_way]').change(function(){
                 if ($(this).is(':checked')) {
                      $('#next_step').attr("disabled", false);
                    }
              });

            }//endof function(data)

    });
     return false;
	});



  $("#next_step").click(function()
  {
    var tour_back_id = '';
    if( typeof $('input:radio[name=selected_returning]:checked').val() != 'undefined'){
      tour_back_id = $('input:radio[name=selected_returning]:checked').val();
    }

    var tour_id = $('input:radio[name=selected_one_way]:checked').val();
    var from = $("#from option:selected").text()
    var to = $("#to option:selected").text();
    var tickets = $('#booked_seats').val();
    //alert(tour_id);
    window.location = 'process_ticket?from='+from+'&to='+to+'&tickets='+tickets+'&tour_id='+tour_id+'&tour_back_id=' + tour_back_id;
  });

});
