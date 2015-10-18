 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/bookings/add_ticket' ?>"><i class="icon-arrow-left-3"></i></a> Ticket details</h1>
            </div>
          </div>
          
        	<div class="row">
				<div class=" search_box col-sm-12 col-md-5" >
				 	<h4 style="margin-left:20px;">Booking details</h4>
    				<hr/>
    				<div class="col-sm-4 col-md-6">
    					<label for="departure">Departure:</label>
    					<h4 id="departure"><?php echo ucfirst($get_data['from']) ?></h4>
    				</div>
					
					<div class="col-sm-4 col-md-6">
    					<label for="arrival">Arrival:</label>
    					<h4 id="arrival"><?php echo ucfirst($get_data['to']) ?></h4>
    				</div>
    				
    				<div class="col-sm-4 col-md-6">
    					<label for="departure_time">Time:</label>
    					<h4 id="departure_time"><?php echo $db_data['one_way']['start_time'] ?></h4>
    				</div>
    				
    				<div class="col-sm-4 col-md-6">
    					<label for="return_time">Return time:</label>
    					<h4 id="return_time"><?php echo $db_data['returning']['start_time'] ?></h4>
    				</div>

    				<div class="col-sm-4 col-md-6">
    					<label for="tickets">Tickets:</label>
    					<h4 id="tickets"><?php echo $get_data['tickets'] ?></h4>
    				</div>	
    				<div class="col-sm-4 col-md-6">
    					<label for="price">Price:</label>
    					<h4 id="price" class="text-success"><?php echo ($db_data['one_way']['start_price'] + $db_data['returning']['start_price'] )* (int) $get_data['tickets'] ?> EUR</h4>
    				</div>				
					
				</div>
				<div class="col-sm-12 col-md-7" >
				asdsa
				</div>
			</div> 
          <?php print_r($db_data)?>
          
</div>

         


