function get_online_user_list() {
    		$('#online_user_list_btn').click(
    			function()
    			{
    				//alert ();
    			   //var year=document.getElementById("").innerHTML;	
    			   $.ajax({
    				url:"<?php echo base_url();?>User_controller/get_online_users",
    				mathod:"post",
    				data:{},
    				success:function (user_list) {
    					alert (user_list);
    					//document.getElementById("all_online_user_list").innerHTML=user_list;
    				}
    			   });
    			}
    		);
}