function view_calendar()
    	{
    		$('#calendar_button').click(
    			function()
    			{
    				if($("#dashbord_main_content_view_div").css('display') == 'none'){
			            $("#event_add_form").css('display', 'none');
			            $("#dashbord_main_content_view_div").css('display', 'block');
			            $("#dashbord_main_content_view_hidden_div").css('display', 'none');

			           }
    			   var date=new Date();
    			   var year=date.getFullYear();
    			   var month=date.getMonth()+1;
    			   var day=date.getDate();
    			   //alert( year+" "+month+" "+day); 	
    			   $.ajax({
    				url:"<?php echo base_url();?>User_controller/get_calendar",
    				mathod:"post",
    				data:{year:year,month:month,day:day},
    				success:function (calender) {
    					//alert(calender);
    					document.getElementById("dashbord_main_content_view_div").innerHTML=calender;
    				}
    			   });
    			}
    		);
    	




        function get_calendar_in_year_input() {
            alert("slkdjfas");
                    
                    if($("#dashbord_main_content_view_div").css('display') == 'none'){
                        $("#event_add_form").css('display', 'none');
                        $("#dashbord_main_content_view_div").css('display', 'block');
                        $("#dashbord_main_content_view_hidden_div").css('display', 'none');

                       }
                     var e = document.getElementById("year_select");
                     var year = Number(e.options[e.selectedIndex].text);  
                   
                   //var year=Number(document.getElementById("year_select").value);
                   var month=Number(document.getElementById("calendar_month_number").innerHTML);
                   var day=Number(document.getElementById("calendar_day_number").innerHTML);
                  // alert (year+month+day);
                  alert (year);
                  

                   //alert( year+" "+month+" "+day);    
                   $.ajax({
                    url:"<?php echo base_url();?>User_controller/get_calendar",
                    mathod:"post",
                    data:{year:year,month:month,day:day},
                    success:function (calender) {
                        //alert(calender);
                    document.getElementById("dashbord_main_content_view_div").innerHTML=calender;
                    }
                   });
                

        }