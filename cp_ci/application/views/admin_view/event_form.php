
			<div class="container-fluid" id="event_add_form">
			    <div class="col-md-4"></div>
				<div  class="col-md-4">
				       <b><p style="text-align: center; color: red; font-size: 150%;">ADD EVENT</p></b>
				   		<div>
				   		  <div class="form-group">
						    <label class="col-sm-12" for="event_title">Event Title:</label>
						    <div class="col-sm-12">
						      <input type="text" class="form-control" id="event_title" required="" name="event_title">
						    </div>
						  </div>

						  <div class="form-group">
						    <label class="col-sm-12" style="float: left;">Date:</label>
						    <div class="col-sm-12"> 
						      <!-- <input type="password" class="form-control" id="pwd" placeholder="Enter password"> -->
						      Year:
                               <select id="event_year">
						       <option></option>
                               <?php
                                 $dates = time () ; 
								 $year = date('Y', $dates) ;
								 for ($i=0; $i < 4; $i++) { 
								 	$year_i=$year+$i;
								 	echo "<option>".$year_i."</option>";
								 }
                              // $number = cal_days_in_month(CAL_GREGORIAN, 1, 2017);

                               ?>
						       </select >
                               Month:
						       <select id="event_month" oninput='set_number_of_day("event_year","event_month","event_day");'>
						        <option></option>
						       	<?php
                                   for ($i=1; $i < 13; $i++) { 
								 	
								 	echo "<option>".$i."</option>";
								 }
						       	?>
						       </select>

						       Day:
						       <select id="event_day">
						       	<option></option>
						       </select>
						      
						      
						    </div>
						  </div>
						  <div class="form-group">
						    <label class="col-sm-12" for="event_detail">Event Detail:</label>
						    <div class="col-sm-12">
						      
						      <textarea rows="4" cols="50" class="form-control" id="event_detail" required="" name="event_detail"></textarea>
						    </div>
						  </div>
						  
						  
						  <div class="form-group"> 
						    <div class="col-sm-offset-2 col-sm-10">
						      <button class="btn btn-primary active" id="event_save_button" style="margin-top: 5px;" onclick="insert_event_detail();">SAVE</button>
						      
						    </div>
						  </div>
						</div>
				</div>
				<div class="col-md-4"></div>

			</div>
