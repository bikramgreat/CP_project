function refresh_notification()
    {
    		var uname=document.getElementById("user_user_name").innerHTML;
    		setTimeout(function() {
    				   if(window.XMLHttpRequest) 
    				   {
				        // Code for modern browsers
				        req=new XMLHttpRequest();
				       }
				       else 
				       {
				        // code for older versions of Internet Explorer
+				        req = new ActiveXObject("Microsoft.XMLHTTP");
				       }
					   req.onreadystatechange=function(){
				        //alert (req.readyState);
						if(req.readyState==4 && req.status==200){
					       document.getElementById("number").innerHTML=req.responseText;
						}
					}
					req.open("GET","../../model/find_notification_number.php? uname="+uname,true);
					req.send();
					refresh_notification();
    			},100);
    }
