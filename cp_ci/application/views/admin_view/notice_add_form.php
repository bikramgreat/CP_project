<div id="notice_add_div">
	<div class="col-md-3" style="background-color: #97b7f7;"></div>
	<div class="col-md-6" id="notice_send_div">
		<div class="col-md-12" style="height: 80px; background-color: #97b7f7;">
			
				 <div class="col-md-4"> </div>
				 <div class="col-md-4" style="background-color: #97b7f7; height: 80px;"><img src="<?php echo base_url();?>assets_file/image_file/logo2.png" style="height: 100%; width: 100%;"></div>
				 <div class="col-md-4"> </div>
			
			

		</div>
		<div class="col-md-12" style="height: 25px; background-color: #97b7f7; text-align: right;">Date:<p style="float: right;" id="notice_date"><?php 
		                                                 $dates = time () ; 
												        $day = date('d', $dates) ;  
												        $month =date('m', $dates) ;
												        $year = date('Y', $dates) ;
												        echo $year."-".$month."-".$day; ?></p></div>
		<div class="col-md-12" style="height: 50px; background-color: #97b7f7;">
			<div class="col-md-12" style="text-align: center;">Title</div>
			<div class="col-md-12"><input type="text" style="width: 100%; text-align: center;" id="notice_title"></input></div>
		</div>
		<div class="col-md-12" style="height: 50px; background-color: #97b7f7;">
			<p style="float: left;">Dear 
			        <select id="notice_for_usertype">
			         <option></option>
			         <option>Teacher</option>
			         <option>Parent</option>
			         <option>Student</option> 
			         <option>Teacher, Parent, Student</option>
			        </select>
			</p>
		</div>
		<div class="col-md-12" style="height: 250px; background-color: #97b7f7; ">
			<textarea style="height: 100% ; width: 100%;" id="notice_main_contents"> 
			</textarea>
		</div>
		<div class="col-md-12" style="height: 25px; background-color: #97b7f7; margin-top: 3px;">
			<button class="btn btn-primary active" id="add_notice_button" style="width:80%; height: 25px; margin-left: 10%;" onclick="send_notice();">ADD NOTICE</button>
		</div>
		
	</div>
	<div class="col-md-3" style="background-color: #97b7f7;"></div>
</div>