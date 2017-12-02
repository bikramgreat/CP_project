public function check_validation_reg_id()
	{
		$reg_id=$this->input->get('registration_id');
		//echo $reg_id."dfas";
		if ($reg_id=="") {
			echo "Please enter Teacher registration id provided by School";
		}
		else
		{
            $this->load->Model('Teacher');
            $this->Teacher->set_id($reg_id);
            $availability=$this->Teacher->check_registration_availability();
            if ($availability==true) {
            	echo "";
            }
            else
            {
            	echo "The entered ID is not registered in Our System, Please get Registration in from School";
            }

		}
	}

function password_strangth(user_password)
		{
			var special_char='!@#$%^&*()_+{}[~]|><~`';
			var score=0;
			var password=document.getElementById(user_password).value;
			var number_char=0;
			var number_alpha=0;
			var number_lager_alpha=0;
			var number_numaric=0;

			for (var i = 0; i<password.length; i++) 
			{
				//alert (password.charAt(i));


				    if (special_char.indexOf(password.charAt(i))>-1)
					{
		               number_char=number_char+1;
					}



					if (/[a-z]/.test(password.charAt(i)))
					 {
					 	//alert (password.charAt(i));
					 	number_alpha=number_alpha+1;
					 }

					 if (/[A-Z]/.test(password.charAt(i)))
					{
		               number_lager_alpha=number_lager_alpha+1;
					}

					if (/[\d]/.test(password.charAt(i)))
					{
		               number_numaric=number_numaric+1;
					}

					
				
			}

			if (number_char>2) {
				score=score+1.5;
			}

			if (number_alpha>3) {
				score=score+1.5;
			}

			// // if (/[a-z]/.test(password))
			//  // {
			//  // 	score=score+1;
			//  // }



			if (number_lager_alpha>1) {
                   score=score+0.5;
			}
		     
			 
			//  // if (/[A-Z]/.test(password))
			//  //  {
			//  //  	score=score+1;
			//  //  }

           

			if (number_numaric>0) {
                   score=score+0.5;
			}



			//   // if (/[\d]/.test(password))
			//   // {
			//   // 	score=score+1;
			//   // }
		      

		      
			 

			  if (password.length >= 8) 
			  {
			  	 score=score+1;
			  }

			 alert(score);
             
		      
			  if (score >=4)
			  {
			  	alert ('vary str');
			  	$('#password_error').css('color','#61050c');
			  	document.getElementById('password_error').innerHTML="*vary strong password*";//score+"*vary strong*";
			  }
			  else if(score<4,score>=3.5)
			  {
			  	alert ('strong');
			  	$('#password_error').css('color','#831f26');
		         document.getElementById('password_error').innerHTML="*strong password*";//score+"*strong*";
			  }
			  else if(score<3.5,score>=2.5)
			  {
			  	$('#password_error').css('color','#ac3941');
		         document.getElementById('password_error').innerHTML="*mediam password*";//score+"*mediam*";
			  }

			  else if(score<2.5&&score>=1.5)
			  {
			  	$('#password_error').css('color','#c1565d');
			  	document.getElementById('password_error').innerHTML="*weak password*";//score+"*weak*";
			  }

			  else if(1.5>score)
			  {
			  	$('#password_error').css('color','#ec848c');
			  	document.getElementById('password_error').innerHTML="*vary weak password*";//score+"*vary weak*";
			  }
		}