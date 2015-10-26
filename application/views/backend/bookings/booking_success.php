 <div class="col-sm-10 col-md-11 main">
          <div class="row" >
            <div class="col-sm-12 col-md-12" style="padding-left:0px;">
                <h1 class="page-header"> Ticket(s) booked successfully </h1>
            </div>
          </div>
          
        	<div class="row">
        		
				<div class="col-sm-12 col-md-12" >
					<div class="alert alert-success" role="alert">
					
					<?php
						$first_name = $this->input->post('first_name');
						$last_name = $this->input->post('last_name');
						$tickets = $this->input->post('tickets'); 
				 		for($i=0; $i < $tickets; $i++) {
					
						echo '
								<p>#'.($i+1).' Ticket for <strong>'.ucfirst($first_name[$i]).' '.ucfirst($last_name[$i]).'</strong> was booked successfully
									<button type="button" class="btn btn-success btn-xs">Print invoice</button>
								</p>
							';
							
						}
					?>
					</div>
					<br/>

					<div class="text-center">
						<a href="<?php echo base_url().'admin/bookings/add_ticket' ?>" class="btn btn-primary btn-lg">Go back to search</a>
					</div>
					
					
				</div>

			</div> 
          
          
</div>