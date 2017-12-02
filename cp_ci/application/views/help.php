<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_profile.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_massage_view.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets_file/css_file/css_notice.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url();?>assets_file/bootstrap_file/css/bootstrap.min.css">
    <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/jquery/jqueryui.js"></script>
    <script src="<?php echo base_url();?>assets_file/bootstrap_file/js/bootstrap.js"></script>
</head>
<body>
            <div class="col-md-12" style=" background-color: #1b6d85; font-size: 300%; text-align: center">
                  Welcome in Help Center
            </div>

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <a href="#common_feature" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none;"><p>Click here to view All Features of Application</p></a>

                <div id="common_feature" class="collapse" style="margin-left: 40px; border-top: solid 5px;">
                    <p><b>Common features which all user can use:</b></p>
                    <p>	User can create account (Sign up)</p>
                    <p>	Sign in</p>
                    <p>	All user can send and view message</p>
                    <p>	User Can see online users on her/his board</p>
                    <p>	All user can View calendar and event details</p>
                    <p>	All user can view notice which are sent for them</p>
                    <p><b>Features in admin account:</b></p>
                    <p>	Admin can register students</p>
                    <p>	Admin can add all event detail of whole year</p>
                    <p>	Admin can send notices for particular user type (for teacher, student, parent)</p>

                    <p><b>Features in Teacher account</b></p>
                    <p>	Teacher can take the attendance of class</p>
                    <p>	Teacher can view all student list of class with their information</p>
                    <p>	Teacher can add Homework for particular subject with deadline</p>
                    <p>	Teacher also can send notice to other user (for teacher, student, parent)</p>
                    <p>	Teacher can view student report</p>
                    <p><b>Features in Student account</b></p>
                    <p>	Student can view his/her Attendance detail of whole year</p>
                    <p>	Student can view given homework detail by teacher</p>
                    <p>	Student can view his/her own educational report</p>
                    <p>	Student can send leave request to class teacher</p>
                    <p><b>Features in Parent account</b></p>
                    <p>	Parent can view his/her child’s Attendance detail of whole year</p>
                    <p>	Parent can view given homework detail for his/her child</p>
                    <p>	Parent can view his/her child’s educational report</p>
                    <p>	Parent can send leave request for his/her child to class teacher</p>

                </div>
                <div class="col-md-2"></div>

                <div class="col-md-12" style="text-align: center; font-size: 150%; background-color: #afd9ee;">
                    Common Questions
                </div>
                <div style="background-color:#9acfea">
                    <a href="#qa1" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none;"><p style="background-color:#888888; color: #0e1040">1.How to create new account (sign up)</p></a>
                    <div id="qa1" class="collapse" style=" border-top: solid 5px;">
                        <p>To sign up, for teacher and student, they must be registered in school and after that they can create account of this system. But for parents they must have student’s registration id. You have to do following thing to create account</p>
                        <p>	Register as teacher or student in school and get registration ID from school admin</p>
                        <p>	Open following sign in form (http://localhost:8080/CP_project/cp_ci/school/login) and click in "create new account" then select the user type to get sign up form</p>
                        <p>There are three option to select your type</p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/sign up/5.png' style="height: 300px; width: 600px;">
                        <p>	Then a form appears, fill all required field and you can create new account </p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/sign up/2.png' style="height: 300px; width: 300px;">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/sign up/3.png' style="height: 300px; width: 300px;">
                    </div>



                    <a href="#qa2" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none;"><p style="background-color:#888888; color: #0e1040">2.	How to log in (sign in)?</p></a>
                    <div id="qa2" class="collapse" style=" border-top: solid 5px;">
                        <p>After creating account, you can log in into system just by using user name and password. Also you have to select the user type </p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/sign up/4.png' style="height: 300px; width: 600px;">

                    </div>




                    <a href="#qa3" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">3.How to send massage?</p></a>
                    <div id="qa3" class="collapse" style=" border-top: solid 5px;">
                        <p>To send message, you have to click sand message button. In navigation dropdown button</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/8.png' style="height: 300px; width: 600px;">
                        <p>Then a window opens, where you can search the person to who you want to send message.  </p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/1.png' style="height: 300px; width: 400px;">
                        <p>Then you can select person to send message and then you can just send message by clicking send button</p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/2.png' style="height: 300px; width: 400px;">
                        <p>Also we can send message to person who are online in system.</p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/3.png' style="height: 300px; width: 50%;">
                    </div>


                    <a href="#qa4" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">4.	How to view message and notifications (notices)?</p></a>
                    <div id="qa4" class="collapse" style=" border-top: solid 5px;">
                        <p>TUser can just see how many number of message and notice are receive in dashboard</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/4.png' style="height: 200px; width: 100%;">
                        <p>By clicking “notification” button you can get notice details, where user can see all the related notices which are provided by school.</p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/5.png' style="height: 300px; width: 100%;">
                        <p>Also just by clicking message button, you can get message detail</p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/6.png' style="height: 300px; width: 100%;">
                    </div>

                    <a href="#qa5" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">5.	How to view calendar and Events?</p></a>
                    <div id="qa5" class="collapse" style=" border-top: solid 5px;">
                        <p>Every user can view Calendar with event of school. Just by clicking Calendar button user can get calendar and event detail.</p>


                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/8.png' style="height: 300px; width: 100%;">

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/message/7.png' style="height: 300px; width: 100%;">
                    </div>

                    <a href="#qa6" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">6.	How to register student into system (Admin)?</p></a>
                    <div id="qa6" class="collapse" style=" border-top: solid 5px;">
                        <p>Here only admin can register to student in this system. Because only a registered student can create account in this system. Also for parent account he/she must have student’s (child) Registered ID.</p>
                        <p>	Admin can add student just by clicking “Add student” button in dashboard </p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/admin/1.png' style="height: 300px; width: 50%;">
                        <p>	After that a form appears </p>


                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/admin/2.png' style="height: 300px; width: 100%;">
                        <p>After filling all the information of student admin can register student in school.</p>
                    </div>





                    <a href="#qa7" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">7.	How to register student into system (Admin)?</p></a>
                    <div id="qa7" class="collapse" style=" border-top: solid 5px;">
                        <p>Here only Admin can add the event detail of whole year, also he/ she can add any event in any time.
                            He/she can just add event detail by clicking “add event” button, Then a form appears
                        </p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/admin/3.png' style="height: 300px; width: 45%; float: left">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/admin/4.png' style=" margin-left:10%;height: 300px; width: 45%; float: left">
                        <p>	After that a form appears </p>

                        <p>Here after filling all the event details, the admin can save the event details just by clicking “SAVE” button.</p>
                    </div>

                    <a href="#qa8" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">8.	How to send notice to user (Teacher, Parent and Student)?</p></a>
                    <div id="qa8" class="collapse" style=" border-top: solid 5px;">
                        <p>When admin clicks “Send notice” a form appears, and he can send notice detail after filling all required fields</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/admin/add_notice1.png' style="height: 300px; width: 50%;">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/admin/add_notice2.png' style="height: 300px; width: 100%;">

                    </div>


                    <a href="#qa9" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">9.	How teacher can take attendance of class:?</p></a>
                    <div id="qa9" class="collapse" style=" border-top: solid 5px;">
                        <p>	Click on “Student management”, then a form appears</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take attendance.png' style="height: 300px; width: 40%; float: left">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take_attendance2.png' style=" margin-left:10%; height: 300px; width: 50%; float: left">
                        <p>Here in class selecting field only those class will appear in which teacher is assigned as class teacher.
                            After selecting class, teacher can view attendance taking page by clicking “Take attendance” button, where a list of student will appears
                        </p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take_attendance3.png' style="height: 300px; width: 40%; float: left">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take_attendance4.png' style=" margin-left:10%; height: 300px; width: 50%; float: left">
                        <p>Then we can take attendance by clicking “Save Attendance”</p>
                    </div>



                    <a href="#qa10" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">10.	How to view student list of particular class?</p></a>
                    <div id="qa10" class="collapse" style=" border-top: solid 5px;">
                        <p>	to view list of student, we have to do following steps</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take attendance.png' style="height: 300px; width: 40%; float: left">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take_attendance2.png' style=" margin-left:10%; height: 300px; width: 50%; float: left">
                        <p>Here in this form by clicking “Add Roll no and Refresh roll no” button after selecting class, we can view all student list with their roll number.</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/take_attendance5.png' style="height: 300px; width: 45%; float: left">
                    </div>

                    <a href="#qa11" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">11.	how to add Homework detail?</p></a>
                    <div id="qa11" class="collapse" style=" border-top: solid 5px;">
                        <p>to add homework, teacher have to click a button “Add Homework”, then a form will appears</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/add_homework1.png' style="height: 300px; width: 40%; float: left">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/teacher/add_homework2.png' style=" margin-left:10%; height: 300px; width: 50%; float: left">
                        <p>After filling all the fields, Teacher can add the Homework detail with deadline..</p>


                    </div>


                    <a href="#qa13" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">13.	How to view own Attendance by student ?
                        </p><p style="background-color:#888888; color: #0e1040">14.	How to view child’s attendance by parent?
                        </p></a>
                    <div id="qa13" class="collapse" style=" border-top: solid 5px;">
                        <p>Student and Parent both can view his/her own attendance of whole year just by clicking “View Attendance” button</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/student/view_attendance1.png' style="height: 300px; width: 40%;">

                        <p>Then after, a student selection option and list of month will appears.</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/student/view_attendance2.png' style="height: 300px; width: 100%;">
                        <p>For student account, in student select list, only student’s own name will display as option, but for parent, there will be a list of his/her all child.
                            And after selecting he can view attendance detail of whole year
                        </p>

                    </div>




                    <a href="#qa14" data-toggle="collapse" style="text-align: center ; font-size: 150%; text-decoration: none; background-color: #8ba8af"><p style="background-color:#888888; color: #0e1040">15.	How to view homework details?</p></a>
                    <div id="qa14" class="collapse" style=" border-top: solid 5px;">
                        <p>To view homework, both parent and student have to click the “View Attendance” button in his/her dashboard. And a smell form will appear</p>

                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/student/view_homwork1.png' style="height: 300px; width: 40%; float: left">
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/student/view_homwork2.png' style=" margin-left:10%; height: 300px; width: 50%; float: left">
                        <p>After Selecting class and Subject we have to click “View Homework” in form to view whole homework details.</p>
                        <img src='<?php echo base_url();?>assets_file/user_guide_pic/student/view_homwork3.png' style="height: 300px; width: 40%; float: left">



                    </div>



                </div>
            </div>
            <div class="col-md-2"></div>



</body>
</html>