 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"><a href="<?php echo base_url().'admin/bookings/add_ticket' ?>"><i class="icon-arrow-left-3"></i></a> Ticket details</h1>
            </div>
          </div>
          
        	<div class="row">
				<div class="booking_details col-sm-12 col-md-5" >
				 	<h4 style="margin-left:20px;">Booking details</h4>
    				<hr/>
    				<div class="col-sm-4 col-md-4">
    					<label for="departure">Departure:</label>
    					<h3 id="departure"><?php echo ucfirst($get_data['from']) ?></h3>
    				</div>
					
					<div class="col-sm-4 col-md-4">
    					<label for="arrival">Arrival:</label>
    					<h3 id="arrival"><?php echo ucfirst($get_data['to']) ?></h3>
    				</div>
    				
    				<div class="col-sm-4 col-md-4">
    					<label for="departure_time">Time:</label>
    					<h3 id="departure_time"><?php echo $db_data['one_way']['start_time'] ?></h3>
    				</div>
					
					<?php if(isset($db_data['returning'])): ?>
						<div class="col-sm-4 col-md-4">
	    					<label for="return_from">Departure:</label>
	    					<h3 id="return_from"><?php echo ucfirst($get_data['to']) ?></h3>
	    				</div>

						<div class="col-sm-4 col-md-4">
	    					<label for="return_to">Arrival:</label>
	    					<h3 id="return_to"><?php echo ucfirst($get_data['from']) ?></h3>
	    				</div>

	    				<div class="col-sm-4 col-md-4">
	    					<label for="return_time">Return time:</label>
	    					<h3 id="return_time"><?php echo $db_data['returning']['start_time'] ?></h3>
	    				</div>
	    			<?php endif; ?>

    				<div class="col-sm-4 col-md-4">
    					<label for="tickets">Tickets:</label>
    					<h3 id="tickets"><?php echo $get_data['tickets'] ?></h3>
    				</div>	
    				<div class="col-sm-4 col-md-4">
    					<label for="price">Price:</label>
    					<h3 id="price" class="text-success">
    					<?php 
    						if(isset($db_data['returning'])):
    							echo ($db_data['one_way']['start_price'] + $db_data['returning']['start_price'] )* (int) $get_data['tickets'];
    						else:
    							echo $db_data['one_way']['start_price'] * (int) $get_data['tickets'];
    						endif;
    					?> EUR
    					</h3>
    				</div>				
					
				</div>
				<div class="col-sm-12 col-md-7" >
					<div class="col-sm-1 col-md-1"></div>
					<div class="col-sm-4 col-md-3">
				        <label for="first_name">First name</label>
				    </div>
				    <div class="col-sm-4 col-md-3">
				        <label for="last_name">Last name</label>
				    </div>
				    <div class="col-sm-4 col-md-5">
				        <label for="identification_number">Identification number</label>
					</div>
					    
					    <?php for($i = 1; $i < (int) $get_data['tickets'] + 1; $i++): ?>
							<div class="col-sm-1 col-md-1 text-right">
						      <strong>#<?php echo $i ?></strong>
						    </div>
							<div class="col-sm-4 col-md-3">
						      <div class="form-group">
						        <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>">
						        <?php echo form_error('first_name'); ?>
						      </div>
						    </div>
						    <div class="col-sm-4 col-md-3">
						      <div class="form-group">
						        <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>">
						        <?php echo form_error('last_name'); ?>
						      </div>
						    </div>
						    <div class="col-sm-4 col-md-5">
						      <div class="form-group">
						        <input type="text" class="form-control" name="identification_number" id="identification_number" value="<?php echo set_value('identification_number'); ?>">
						        <?php echo form_error('identification_number'); ?>
						      </div>
						    </div>
						<?php endfor; ?>
						
					<div class="col-sm-12 col-md-12 text-right">
				        <button type="submit" class="btn btn-success btn-lg" id="book_ticket" value="submit"><span class="icon-cart-2"></span> Book ticket</button>
					</div>
				</div>

			</div> 
          <?php //print_r($db_data)?>
          
</div>

         


