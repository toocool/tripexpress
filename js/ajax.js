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
              if(obj.length === 0) alert('No available tours to book');
              console.log(data);
              $.each( obj, function(index, value) {
                alert(value.start_time);
                
               // /   tour.push(value.start_time + " " + value.start_price) ;
                
               
                $("#from_results").append("<li>" + value.start_time + " " + value.start_price + "</li>");
             });
            }
    });// .ajax
     return false;
	});
});