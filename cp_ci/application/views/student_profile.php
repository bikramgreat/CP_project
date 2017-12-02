
<!DOCTYPE html>
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
    <script type="text/javascript" src="<?php echo base_url();?>assets_file/java_script/get_calendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets_file/Ajax/all_ajax_files.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets_file/canvas/canvasjs.min.js"></script>



    <script type="text/javascript">

        $(document).ready(function(){
            //alert ("bikram shreatjajsfdlaj");

            get_online_user_list();
            add_event_form();
            view_calendar();
            get_calendar_in_previous();
            view_event();
            open_student_add_form();
            //insert_student_registration();
            open_student_add_form();
            add_massage_send_div();
            // get_user_list_name();
            open_notice_add_form();


            timer_run_funtion();
            show_homework_add_div();
            view_homework_form();
            add_class_selecting_attendance_div();
            get_notice_list();
            get_massage_notification_list();


            load_report_form();




            //get_calendar_in_year_input();
            //getting_massage_number();
        });
        //        $(document).on('beforeunload', function(){ alert ('Bye now')});

        //        $(window).bind("beforeunload", function() {
        //            return confirm("Do you really want to close?");
        //        })




        (document).onbeforeunload = function () {
            alter ("Do you really want to close?");
        };



        function timer_run_funtion()
        {

            setTimeout(function() {
                getting_massage_number();
                getting_notice_number();
                timer_run_funtion();
            },10000);
        }

        function getting_massage_number() {
            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_massage_number",
                mathod:"post",
                data:{},
                success:function (number) {
                    // alert (number);
                    if(number=="")
                    {
                        $('#massage_number').css('background-color','');
                        document.getElementById("massage_number").innerHTML='';
                    }
                    else
                    {
                        //alert (number);
                        $('#massage_number').css('background-color','rosybrown');
                        document.getElementById("massage_number").innerHTML=number;
                    }

                }
            });
        }


        function get_notice_list()
        {
            $('#notice_text_div').click(
                function()
                {
                    //alert('dfas');
                    $.ajax({
                        url:"<?php echo base_url();?>User_controller/get_notice_list",
                        mathod:"post",

                        data:{},
                        success:function (notice_list) {
                            ///alert(notice_list);
                            $("#dashbord_main_content_view_div").css('display', 'none');
                           document.getElementById("dashbord_main_content_view_hidden_div").innerHTML =notice_list;
                            $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                        }
                    });
                }
            );

        }




        function getting_notice_number() {
            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_notice_number",
                mathod:"post",
                data:{},
                success:function (number) {
                    // alert (number);
                    if(number=="")
                    {

                    }
                    else
                    {
                        //alert (number);
                        $('#notice_number').css('background-color','rosybrown');
                        document.getElementById("notice_number").innerHTML=number;
                    }

                }
            });

        }


        function get_massage_notification_list() {
            $('#massage_text_div').click(
                function () {
                    $.ajax({
                        url:"<?php echo base_url();?>User_controller/get_massage_list",
                        mathod:"post",
                        data:{},
                        success:function (massage_list) {
                            ///alert(notice_list);
                            $("#dashbord_main_content_view_div").css('display', 'none');
                            document.getElementById("dashbord_main_content_view_hidden_div").innerHTML = massage_list;
                            $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                        }
                    });
                }
            );
        }


        function get_messages_from_list(sender_id,sender_name) {
            // alert (sender_name);
            add_massage_send_div_from_online();//to load message div

            //add_massage_send_div_from_online();

            show_name_input_field(sender_name);
            hide_list_option(sender_id);


        }




        function view_calendar()
        {
            $('#calendar_button').click(
                function()
                {
                    //if($("#dashbord_main_content_view_div").css('display') == 'none'){

                    $("#dashbord_main_content_view_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").css('display', 'none');

                    //}
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
        }

        function insert_student_registration() {

            //alert ();
            //var year=document.getElementById("").innerHTML;
            //var event_detail=document.getElementById("event_title").value;
            var student_first_name=$('#student_first_name').val();
            var student_last_name=$('#student_last_name').val();
            var year=$('#year').val();
            var month=$('#month').val();
            var day=$('#day').val();


            var student_date_of_birth=year+"-"+month+"-"+day;
            var student_age=$('#student_student_age').val()
            var student_address=$('#student_address').val();
            // alert (student_age);
            if (year==""||month==""||day=="") {
                alert ("please enter date of birth");

            }
            else
            {
                $.ajax({
                    url:"<?php echo base_url()?>Controller_admin/ca_registering_student",
                    mathod:"post",
                    data:{student_first_name:student_first_name,student_last_name:student_last_name,student_age:student_age,student_date_of_birth:student_date_of_birth,student_address:student_address},
                    success:function (massage) {
                        alert (massage);
                        //document.getElementById("all_online_user_list").innerHTML=user_list;
                    }
                });
            }


        }



        function get_calendar_in_next() {

            $('#calendar_next_button').click(
                function()
                {
                    if($("#dashbord_main_content_view_div").css('display') == 'none'){

                        $("#dashbord_main_content_view_div").css('display', 'block');
                        $("#dashbord_main_content_view_hidden_div").css('display', 'none');

                    }

                    var year=Number(document.getElementById("calendar_selected_year").innerHTML);
                    var month=Number(document.getElementById("calendar_month_number").innerHTML)+1;
                    var day=Number(document.getElementById("calendar_day_number").innerHTML);
                    // alert (year+month+day);
                    if (month>12) {
                        month=1;
                        year=(year+1);
                    }


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

        }


        function get_calendar_in_previous() {

            $('#calendar_privious_button').click(
                function()
                {
                    if($("#dashbord_main_content_view_div").css('display') == 'none'){

                        $("#dashbord_main_content_view_div").css('display', 'block');
                        $("#dashbord_main_content_view_hidden_div").css('display', 'none');
                    }

                    var year=Number(document.getElementById("calendar_selected_year").innerHTML);
                    var month=Number(document.getElementById("calendar_month_number").innerHTML)-1;
                    var day=Number(document.getElementById("calendar_day_number").innerHTML);
                    // alert (year+month+day);
                    if (month<1) {
                        month=12;
                        year=(year-1);
                    }


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

        }


        function get_calendar_in_year_input() {

            if($("#dashbord_main_content_view_div").css('display') == 'none'){

                $("#dashbord_main_content_view_div").css('display', 'block');
                $("#dashbord_main_content_view_hidden_div").css('display', 'none');

            }
            var e = document.getElementById("year_select");
            var year = Number(e.options[e.selectedIndex].text);

            //var year=Number(document.getElementById("year_select").value);
            var month=Number(document.getElementById("calendar_month_number").innerHTML);
            var day=Number(document.getElementById("calendar_day_number").innerHTML);
            // alert (year+month+day);



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
                            //alert (user_list);
                            document.getElementById("all_online_main_user_list_div").innerHTML=user_list;
                        }
                    });
                }
            );
        }




        function add_event_form() {
            $('#add_event_button').click(
                function () {
                    //alert ('sdfka');
//
                    $("#dashbord_main_content_view_hidden_div").css('display','block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_add_event_form");
                    $("#dashbord_main_content_view_div").css('display', 'none');
                }
            );
        }


        function open_student_add_form() {
            $('#add_student_button').click(
                function () {
                    //alert ('sdfka');
//
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_open_student_add_form");
                    $("#dashbord_main_content_view_div").css('display', 'none');
                }
            );
        }




        function add_massage_send_div() {
            $('#send_massage_button').click(
                function () {
                    // alert ('sdfka');
//
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_add_massage_send_div");
                    $("#dashbord_main_content_view_div").css('display', 'none');

                }
            );


        }

        function add_massage_send_div_from_online() {
            $("#dashbord_main_content_view_hidden_div").css('display', 'none');
            $("#dashbord_main_content_view_div").load("<?php echo base_url();?>School/load_add_massage_send_div");
            $("#dashbord_main_content_view_div").css('display', 'block');
        }


        function open_notice_add_form() {
            $('#send_notice_button').click(
                function () {
                    //alert ('sdfka');
//
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_notice_add_form");
                    $("#dashbord_main_content_view_div").css('display', 'none');
                }
            );
        }




        function insert_event_detail() {

            //alert ();
            //var year=document.getElementById("").innerHTML;
            //var event_detail=document.getElementById("event_title").value;
            var event_title=$('#event_title').val();
            var event_year=$('#event_year').val();
            var event_month=$('#event_month').val();
            var event_day=$('#event_day').val();
            var event_date=event_year+"-"+event_month+"-"+event_day;
            var event_detail=$('#event_detail').val();
            //alert (event_detail);
            if (event_title=="") {
                alert ("plase enter title");
            }
            else
            {
                if (event_year==""||event_month==""||event_day=="") {
                    alert("Plase select whole date");
                }
                else
                {
                    $.ajax({
                        url:"<?php echo base_url()?>Controller_admin/ca_add_event_detail",
                        mathod:"post",
                        data:{event_title:event_title,event_date:event_date,event_detail:event_detail},
                        success:function (massage) {
                            alert (massage);
                            //document.getElementById("all_online_user_list").innerHTML=user_list;
                        }
                    });
                }
            }


        }

        function get_age() //action when adding student details
        {
            var year=$('#year').val();
            var date=new Date();
            var current_year=date.getFullYear();
            document.getElementById("student_student_age").value=current_year-year;
            get_days();
        }

        function get_days() {
            //alert (number_of_day);
            var year=document.getElementById('year').value;
            var month=document.getElementById('month').value;
            //var date=new Date();
            var number_of_day=new Date(year,
                month,
                0).getDate();
            //alert (number_of_day);
            var options="";
            for (var i = 1; i < number_of_day+1; i++) {

                options=options+"<option>"+i+"</option>";
            }
            document.getElementById('day').innerHTML=options;
        }



        function insert_student_registration() {
            $('#student_save_button').click(
                function()
                {
                    //alert ();
                    //var year=document.getElementById("").innerHTML;
                    //var event_detail=document.getElementById("event_title").value;
                    var student_first_name=$('#student_first_name').val();
                    var student_last_name=$('#student_last_name').val();
                    var year=$('#year').val();
                    var month=$('#month').val();
                    var day=$('#day').val();


                    var student_date_of_birth=year+"-"+month+"-"+day;
                    var student_age=$('#student_student_age').val()
                    var student_address=$('#student_address').val();
                    // alert (student_age);
                    if (year==""||month==""||day=="") {
                        alert ("please enter date of birth");

                    }
                    else
                    {
                        $.ajax({
                            url:"<?php echo base_url()?>Controller_admin/ca_registering_student",
                            mathod:"post",
                            data:{student_first_name:student_first_name,student_last_name:student_last_name,student_age:student_age,student_date_of_birth:student_date_of_birth,student_address:student_address},
                            success:function (massage) {
                                alert (massage);
                                //document.getElementById("all_online_user_list").innerHTML=user_list;
                            }
                        });
                    }

                }
            );
        }





        function view_event()
        {
            $('#view_event_button').click(
                function()
                {
                    // if($("#dashbord_main_content_view_div").css('display') == 'none'){

                    $("#dashbord_main_content_view_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").css('display', 'none');


                    // }
                    var date=new Date();
                    var year=date.getFullYear();
                    var month=date.getMonth()+1;
                    var day=date.getDate();
                    //alert( year+" "+month+" "+day);
                    $.ajax({
                        url:"<?php echo base_url();?>User_controller/view_event",
                        mathod:"post",
                        data:{year:year,month:month,day:day},
                        success:function (event) {
                            //alert(calender);
                            document.getElementById("dashbord_main_content_view_div").innerHTML=event;
                        }
                    });
                }
            );
        }


        function get_user_list_name()//to select receiver
        {

            var input_name=document.getElementById('text_search_receiver').value;
            //alert (input_name);
            $.ajax({
                url:"<?php echo base_url();?>User_controller/search_user",
                mathod:"post",
                data:{input_name:input_name},
                success:function (user_lists) {
                    if ($("#outer_list_option_div").css('display') == 'none') {
                        document.getElementById("list_options_div").innerHTML=user_lists;
                        $("#outer_list_option_div").css('display','block');
                    }

                    if ($("#outer_list_option_div").css('display') == 'block') {
                        document.getElementById("list_options_div").innerHTML=user_lists;
                        //$("#outer_list_option_div").css('display','block');
                    }

                    //alert(user_lists);
                    //user_list=user_lists;
                    //drop_down_user_list=user_lists;
                }
            });
        }





        function hide_list_option(id)
        {
            //alert(id);
            document.getElementById('span_receiver_id').innerHTML=id;
            get_massage_detail(id);

            if ($("#outer_list_option_div").css('display') == 'block') {
                // document.getElementById("list_options_div").innerHTML=user_lists;
                $("#outer_list_option_div").css('display','none');
            }



        }

        function hide_list_option_on_mouseout() {
            if ($("#outer_list_option_div").css('display') == 'block') {
                // document.getElementById("list_options_div").innerHTML=user_lists;
                $("#outer_list_option_div").css('display','none');
            }
        }

        function show_name_input_field(name) {
            //alert ('view message');
            document.getElementById('text_search_receiver').value=name;
        }


        function get_massage_detail(user_id) {
            //alert(document.getElementById('span_receiver_id').innerHTML);
            var selected_user_id=user_id;
            //alert (user_id);
            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_massage",
                mathod:"post",
                data:{selected_user_id:selected_user_id},
                success:function (massage_lists) {
                    document.getElementById('span_receiver_id').innerHTML=user_id;//to store id of the person
                    document.getElementById('massage_view_main_div').innerHTML= massage_lists;
                    $("#massage_view_main_div").scrollTop($("#massage_view_main_div")[0].scrollHeight);

                    //alert(massage_lists);
                    //user_list=user_lists;
                    //drop_down_user_list=user_lists;
                }
            });
        }






        function send_massage() {

            var receiver_id=document.getElementById('span_receiver_id').innerHTML;
            var massage_detail=document.getElementById('text_area_write_massage').value;
            //alert(receiver_id);
            if (receiver_id=="") {
                alert ("please select reveiver");
            }
            else
            {
                $.ajax({
                    url:"<?php echo base_url();?>User_controller/send_massage",
                    mathod:"post",
                    data:{receiver_id:receiver_id,massage_detail:massage_detail},
                    success:function (massage_send_success) {
                        get_massage_detail(receiver_id);
                        document.getElementById('text_area_write_massage').value="";
                        //
                        var elem = document.getElementById('massage_view_main_div');//to scroll automaticly in button
                        elem.scrollTop = elem.scrollHeight;
                    }
                });
            }

        }



        function send_notice() {


            var notice_date=document.getElementById('notice_date').innerHTML;
            var notice_title=document.getElementById('notice_title').value;
            var e=document.getElementById('notice_for_usertype');
            var notice_for_user_type=e.options[e.selectedIndex].text;
            var notice_detail=document.getElementById('notice_main_contents').value;
            //alert (notice_date+notice_title+notice_for_user_type+notice_detail);

            $.ajax({
                url:"<?php echo base_url();?>Controller_teacher/add_notification",
                mathod:"post",
                data:{notice_title:notice_title,notice_date:notice_date,notice_for_user_type:notice_for_user_type,notice_detail:notice_detail},
                success:function (notice_send_success) {
                    alert(notice_send_success);
                    document.getElementById('notice_title').value="";
                    document.getElementById('notice_main_contents').value="";

                }
            });

        }

        function set_number_of_day(select_year,select_month,select_day) {
            //alert (number_of_day);
            var year=document.getElementById(select_year).value;
            var month=document.getElementById(select_month).value;
            //var date=new Date();
            var number_of_day=new Date(year,
                month,
                0).getDate();
            //alert (number_of_day);
            var options="";
            for (var i = 1; i < number_of_day+1; i++) {

                options=options+"<option>"+i+"</option>";
            }
            document.getElementById(select_day).innerHTML=options;
        }

        //add_homework_button

        function show_homework_add_div() {
            $('#add_homework_button').click(
                function()
                {
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_homework_add_form");
                    $("#dashbord_main_content_view_div").css('display', 'none');
                }
            );
        }

        function get_teacher_subject_class() {
            var class_no=document.getElementById('homework_class').value;

            $.ajax({

                url:"<?php echo base_url();?>Controller_teacher/get_teacher_subject_class",
                mathod:"post",
                data:{class_no:class_no},
                success:function (found_subjects) {
                    //alert (found_subjects);
                    if(found_subjects=="")
                    {
                        if(class_no=="")
                        {
                            document.getElementById('subject_error').innerHTML='';
                        }
                        else
                        {
                            document.getElementById('subject_error').innerHTML="You have not assign as Teacher for class "+class_no;
                        }

                    }
                    else
                    {
                        document.getElementById('subject_error').innerHTML="";
                        document.getElementById('subjects_list').innerHTML=found_subjects;
                    }

                }
            });
        }
        function check_homework_add_validataion() {

            var class_no=document.getElementById('homework_class').value;
            var subject=document.getElementById('subjects_list').value;
            var homework_detail=document.getElementById('homework_detail').value;
            //alert (class_no);
            if(class_no=="")
            {
                document.getElementById('homework_save_button').disabled=true;
                document.getElementById('validation_error').innerHTML="Please, Select Class Number";
            }
            else
            {
                if (subject=="")
                {
                    document.getElementById('homework_save_button').disabled=true;
                    document.getElementById('validation_error').innerHTML="Please, Select Subject";
                }
                else
                {
                    if (homework_detail=="")
                    {
                        document.getElementById('homework_save_button').disabled=true;
                        document.getElementById('validation_error').innerHTML="Please, Write Homework Detail befor save";
                    }
                    else
                    {
                        var year=document.getElementById('homework_year').value;
                        var month=document.getElementById('homework_month').value;
                        var day=document.getElementById('homework_day').value;
                        if(year==""||month==""||day=="")
                        {
                            document.getElementById('homework_save_button').disabled=true;
                            document.getElementById('validation_error').innerHTML="Please, select Submission date";
                        }
                        else {


                            document.getElementById('validation_error').innerHTML = "";
                            document.getElementById('homework_save_button').disabled = false;
                        }
                    }
                }
            }
        }

        function save_homework_detail() {
            var date=new Date();
            var today_year=date.getFullYear();
            var today_month=date.getMonth()+1;
            var today_day=date.getDate();
            var today_date=today_year+"-"+today_month+"-"+today_day;

            var homework_year=document.getElementById('homework_year').value;
            var homework_month=document.getElementById('homework_month').value;
            var homework_day=document.getElementById('homework_day').value;
            var homework_date=homework_year+"-"+homework_month+"-"+homework_day;
            if(homework_year==today_year)
            {
                if(homework_month<today_month)
                {
                    alert ("Please, selected date is already gone");
                }
                else
                {

                    if (today_month==homework_month)
                    {
                        if (homework_day<today_day)
                        {
                            alert ("Please, selected date is already gone");
                        }
                        else
                        {
                            var class_no=document.getElementById('homework_class').value;
                            var subject=document.getElementById('subjects_list').value;
                            var homework_detail=document.getElementById('homework_detail').value;
                            $.ajax({
                                url:"<?php echo base_url();?>Controller_teacher/add_homework",
                                mathod:"post",
                                data:{class_no:class_no,subject:subject,homework_detail:homework_detail,homework_date:homework_date,today_date:today_date},
                                success:function (homework_add_success) {
                                    alert(homework_add_success);
                                    document.getElementById('homework_year').value="";
                                    document.getElementById('homework_month').value="";
                                    document.getElementById('homework_day').value="";
                                    document.getElementById('homework_class').value="";
                                    document.getElementById('subjects_list').value="";
                                    document.getElementById('homework_detail').value="";
                                }
                            });

                        }
                    }
                    else
                    {
                        var class_no=document.getElementById('homework_class').value;
                        var subject=document.getElementById('subjects_list').value;
                        var homework_detail=document.getElementById('homework_detail').value;
                        $.ajax({
                            url:"<?php echo base_url();?>Controller_teacher/add_homework",
                            mathod:"post",
                            data:{class_no:class_no,subject:subject,homework_detail:homework_detail,homework_date:homework_date,today_date:today_date},
                            success:function (homework_add_success) {
                                alert(homework_add_success);
                                document.getElementById('homework_year').value="";
                                document.getElementById('homework_month').value="";
                                document.getElementById('homework_day').value="";
                                document.getElementById('homework_class').value="";
                                document.getElementById('subjects_list').value="";
                                document.getElementById('homework_detail').value="";
                            }
                        });
                    }
                }

            }
            else
            {
                var class_no=document.getElementById('homework_class').value;
                var subject=document.getElementById('subjects_list').value;
                var homework_detail=document.getElementById('homework_detail').value;
                $.ajax({
                    url:"<?php echo base_url();?>Controller_teacher/add_homework",
                    mathod:"post",
                    data:{class_no:class_no,subject:subject,homework_detail:homework_detail,homework_date:homework_date,today_date:today_date},
                    success:function (homework_add_success) {
                        //alert(homework_add_success);
                        document.getElementById('homework_year').value="";
                        document.getElementById('homework_month').value="";
                        document.getElementById('homework_day').value="";
                        document.getElementById('homework_class').value="";
                        document.getElementById('subjects_list').value="";
                        document.getElementById('homework_detail').value="";
                    }
                });
            }
        }

        function view_homework_form() {
            $('#view_homework_button').click(
                function () {
                    //  alert('sdjf');
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_homework_view_form_student");
                    $("#dashbord_main_content_view_div").css('display', 'none');
                }
            );

        }

        function get_homework_detail() {
            var class_no=document.getElementById('homework_class').value;
            var subject=document.getElementById('subjects_list').value;
            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_homework",
                mathod:"post",
                data:{class_no:class_no,subject:subject},
                success:function (homework_get_success) {
                    if (homework_get_success=="")
                    {
                        alert ('Please select class number and subject to view homework');
                    }
                    else
                    {
                        if(homework_get_success=="database_empty")
                        {
                            alert ('There are no homework for '+subject);
                        }
                        else
                        {
                            $("#dashbord_main_content_view_div").css('display', 'block');
                            document.getElementById("dashbord_main_content_view_div").innerHTML=homework_get_success;
                            $("#dashbord_main_content_view_hidden_div").css('display', 'none');
                        }

                    }

                }
            });
        }


        function get_homework_detail_after_delete(class_no_value,subject_value) {
            var class_no=class_no_value;
            var subject=subject_value;
            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_homework",
                mathod:"post",
                data:{class_no:class_no,subject:subject},
                success:function (homework_get_success) {
                    if (homework_get_success=="")
                    {
                        alert ('Please select class number and subject to view homework');
                    }
                    else
                    {
                        if(homework_get_success=="database_empty")
                        {
                            alert ('There are no homework for '+subject);
                        }
                        else
                        {
                            $("#dashbord_main_content_view_div").css('display', 'block');
                            document.getElementById("dashbord_main_content_view_div").innerHTML=homework_get_success;
                            $("#dashbord_main_content_view_hidden_div").css('display', 'none');
                        }

                    }

                }
            });
        }


        function get_student_list_homework_check(Homework_id,Class_no,Subject_name,Homework_detail) {
            //alert (Homework_detail);
            $.ajax({
                url:"<?php echo base_url();?>Controller_teacher/get_student_homework_check_list",
                mathod:"post",
                data:{Homework_id:Homework_id,Class_no:Class_no,Subject_name:Subject_name,Homework_detail:Homework_detail},
                success:function (list_get_success) {
                    //alert (list_get_success);
                    $("#dashbord_main_content_view_div").css('display', 'none');
                    document.getElementById("dashbord_main_content_view_hidden_div").innerHTML=list_get_success;
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                }
            });
        }


        function delete_homework(homework_id,class_no,subject_name) {
            // alert(homework_id+class_no+subject_name);

            $.ajax({
                url:"<?php echo base_url();?>Controller_teacher/delete_homework",
                mathod:"post",
                data:{homework_id:homework_id},
                success:function (delete_massage) {
                    if(delete_massage=="true")
                    {
                        alert ('message is deleted successfully');
                        get_homework_detail_after_delete(class_no,subject_name)
                    }
                    else
                    {
                        alert ('message is not deleted successfully');
                    }


                }
            });
        }



        function save_student_homework_detail(homework_id)
        {
//            $('.student_homework_detail').each(function () {
//                alert ($(this).find('#Homework_done').val());
//            });
            var check_error=true;
            var check_save=true;
            $('.student_homework_detail').each(

                function () {
                    var homework_done=$(this).find('#Homework_done').val();//to get value of of child element having same div class name
                    var homework_remark=$(this).find('#Remark').val();
                    if (homework_done==""||homework_remark=="")
                    {
                        $(this).find('#error_p').text('Please, Select Remark and homework done or not');
                        check_error=false;
                    }
                    else
                    {
                        $(this).find('#error_p').text('');
                    }

                }
            );

            if (check_error==true)
            {

                $('.student_homework_detail').each(
                    function () {
                        var student_id=$(this).find('#student_account_id_div').text();
                        var homework_done=$(this).find('#Homework_done').val();//to get value of of child element having same div class name
                        var homework_remark=$(this).find('#Remark').val();
                        if (homework_done=="not done")
                        {
                            homework_remark=0;
                        }

                        //alert ('homework_remark');

                        //$(this).find('#error_p').text("");
                        $.ajax({
                            url:"<?php echo base_url();?>Controller_teacher/save_student_homework_detail",
                            mathod:"post",
                            data:{student_id:student_id,homework_done:homework_done,homework_remark:homework_remark,homework_id:homework_id},
                            success:function (save_student_homework_success) {
                                //alert (save_student_homework_success);

                                if(save_student_homework_success=="false")
                                {
                                    document.getElementById('homework_save_error').innerHTML='Homework reports are already stored';

                                }
                                else
                                {
                                    document.getElementById('homework_save_error').innerHTML='Homework reports saved succcessfully';
                                }

                                //alert (save_student_homework_success);
//                                $("#dashbord_main_content_view_div").css('display', 'block');
//                                document.getElementById("dashbord_main_content_view_hidden_div").innerHTML=list_get_success;
//                                $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                            }
                        });


                    }
                );

            }
            else
            {
                alert ('Please, Select Remark and homework done or not');
            }


        }

        //              function view_homework() {
        //                  $('#view_homework_button').click(
        //                    function () {
        //
        //                        if($("#dashbord_main_content_view_div").css('display') == 'none'){
        //
        //                            $("#dashbord_main_content_view_div").css('display', 'block');
        //                            $("#dashbord_main_content_view_hidden_div").css('display', 'none');
        //                        }
        //
        //
        //
        //
        //                    }
        //                  );
        //
        //              }




        function add_class_selecting_attendance_div() {

            $('#add_student_manage_button').click(
                function () {
                    //  alert('sdjf');
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');
                    $("#dashbord_main_content_view_hidden_div").load("<?php echo base_url();?>School/load_class_manage_form");
                    $("#dashbord_main_content_view_div").css('display', 'none');

                    $.ajax({//this is for to get classes which are only assign as class teacher
                        url:"<?php echo base_url();?>Controller_teacher/get_class_teacher_assigned_class",
                        mathod:"post",
                        data:{},
                        success:function (list_class) {
                            //alert (list_get_success);
                            document.getElementById('attendance_class_select').innerHTML=list_class;


                        }
                    });
                }
            );
        }


        function add_roll_no() {
            var class_no=document.getElementById('attendance_class_select').value;
            if(class_no=="")
            {
                alert ('Please select Class number');
            }
            else {


                $.ajax({
                    url: "<?php echo base_url();?>Controller_teacher/add_refrash_roll_no",
                    mathod: "post",
                    data: {class_no: class_no},
                    success: function (student_list_with_rollno) {
                        //alert (student_list_with_rollno);
                        // document.getElementById('attendance_class_select').innerHTML=list_class;
                        $("#dashbord_main_content_view_div").css('display', 'none');
                        document.getElementById("dashbord_main_content_view_hidden_div").innerHTML = student_list_with_rollno;
                        $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                    }
                });
            }

        }

        function get_user_list_attendance() {
            var class_no=document.getElementById('attendance_class_select').value;
            if(class_no=="")
            {
                alert ('Please select Class number');
            }
            else {


                $.ajax({
                    url: "<?php echo base_url();?>Controller_teacher/get_user_list_attendance",
                    mathod: "post",
                    data: {class_no: class_no},
                    success: function (student_list_with_rollno) {
                        //alert (student_list_with_rollno);
                        // document.getElementById('attendance_class_select').innerHTML=list_class;
                        $("#dashbord_main_content_view_div").css('display', 'none');
                        document.getElementById("dashbord_main_content_view_hidden_div").innerHTML = student_list_with_rollno;
                        $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                    }
                });
            }


        }

        function add_attendance_of_students(class_no) {

            var check_error=true;
            var check_save=true;


            $('.student_attendance_detail').each(

                function () {
                    // alert ('fsdjkfh');

                    var attendance_check=$(this).find('input[name=attendance]:checked').val();
                    // alert (attendance_check);
                    if (typeof (attendance_check)=="undefined")
                    {
                        $(this).find('#error_p').text('Please, Select Remark and homework done or not');
                        check_error=false;
                    }
                    else
                    {
                        $(this).find('#error_p').text('');
                    }

                }
            );

            if (check_error==true)
            {

                $('.student_attendance_detail').each(
                    function () {
                        var student_reg_id=$(this).find('#student_reg_id_div').text();
                        var attendance_check=$(this).find('input[name=attendance]:checked').val();
                        $.ajax({
                            url:"<?php echo base_url();?>Controller_teacher/save_attendance_detail",
                            mathod:"post",
                            data:{student_reg_id:student_reg_id,class_no:class_no,attendance_check:attendance_check},
                            success:function (save_save_attendance_success) {
                                //alert (save_save_attendance_success);
                                if(save_save_attendance_success=="false")
                                {
                                    document.getElementById('attendance_save_error').innerHTML='Attendances are already taken for class no '+class_no;

                                }
                                else
                                {
                                    document.getElementById('attendance_save_error').innerHTML='Attendances is taken successfully';
                                }
                            }
                        });


                    }
                );

            }
            else
            {
                alert ('Please, Check addendance');
            }
        }


        function load_report_form() {
            $('#get_report_form_button').click(
                function () {
                    $("#dashbord_main_content_view_hidden_div").css('display', 'none');
                    $("#dashbord_main_content_view_div").load("<?php echo base_url();?>School/load_report_generate_form");
                    $("#dashbord_main_content_view_div").css('display', 'block');

                }
            );
        }



        function get_student_list_of_class() {
            //
            var class_no=document.getElementById('report_class').value;
            // alert(class_no);
            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_class_student_list",
                mathod:"post",
                data:{class_no:class_no},
                success:function (student_list) {
                    // alert (student_list);
                    document.getElementById('student_list').innerHTML=student_list;

                }
            });

        }


        function select_student_reg_account_id(student_registration_id,student_account_id) {
            //alert (student_registration_id);
            document.getElementById('student_reg_id_div').innerHTML=student_registration_id;
            document.getElementById('student_account_id_div').innerHTML=student_account_id;
            //alert(document.getElementById('student_account_id_div').innerHTML);
        }


        function get_report()
        {
            //alert('fsdaf');
            var reg_id=document.getElementById('student_reg_id_div').innerHTML;
            var account_id=document.getElementById('student_account_id_div').innerHTML;
            var class_no=document.getElementById('report_class').value;
            var student_value=document.getElementById('student_list').value;
            if(reg_id==""||account_id==""||class_no==""||student_value=="")
            {
                document.getElementById('validation_error').innerHTML="Please Select class and Student to get report";
            }
            else
            {
                document.getElementById('validation_error').innerHTML="";
                $.ajax({
                    url:"<?php echo base_url();?>User_controller/get_student_report_for_teacher",
                    mathod:"post",
                    data:{reg_id:reg_id,account_id:account_id,class_no:class_no},
                    success:function (student_report) {
                        //alert (student_report);
                        $("#dashbord_main_content_view_div").css('display', 'block');
                        document.getElementById("dashbord_main_content_view_hidden_div").innerHTML = student_report;
                        $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                    }
                });
            }
        }


        function get_report_by_student()
        {
            //alert('fsdaf');

                $.ajax({
                    url:"<?php echo base_url();?>User_controller/get_student_report_for_student",
                    mathod:"post",
                    data:{},
                    success:function (student_report) {
                        //alert (student_report);
                        $("#dashbord_main_content_view_div").css('display', 'block');
                        $("#dashbord_main_content_view_div").css('text-align', 'center');

                        document.getElementById('dashbord_main_content_view_div').innerHTML="Your Report"
                        document.getElementById("dashbord_main_content_view_hidden_div").innerHTML = student_report;
                        $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }

                });

        }


        function get_attendance_by_student()
        {
            //alert('fsdaf');

            $.ajax({
                url:"<?php echo base_url();?>User_controller/get_attendance_for_student",
                mathod:"post",
                data:{},
                success:function (student_report) {
                    alert (student_report);
                    $("#dashbord_main_content_view_div").css('display', 'block');
                    $("#dashbord_main_content_view_div").css('text-align', 'center');

                    document.getElementById('dashbord_main_content_view_div').innerHTML="Your Report"
                    document.getElementById("dashbord_main_content_view_hidden_div").innerHTML = student_report;
                    $("#dashbord_main_content_view_hidden_div").css('display', 'block');

                },
                error: function(xhr, status, error) {
                    alert(xhr.responseText);
                }

            });

        }





        function ceechdfasd() {
            alter ('fsadfsa');
        }

        function get_attendance_chart(total_attendance,attendance_a) {
            var t_attndance=total_attendance;
            var a_attendance=attendance_a/t_attndance*100;
            var p_attendance=100-a_attendance;



            if ( $("#attendance_chart_div").css('display') == 'none' ){
                $("#attendance_chart_div").show();
            }
            else
            {
                $("#attendance_chart_div").hide();
            }
            var chart = new CanvasJS.Chart("attendance_chart_div",
                {
                    title:{
                        text: "Attendance of Student"
                    },
                    legend: {
                        maxWidth: 350,
                        itemWidth: 120
                    },
                    data: [
                        {
                            type: "pie",
                            showInLegend: true,
                            legendText: "{indexLabel}",
                            dataPoints: [
                                { y: a_attendance, indexLabel: "Present day number in %" },
                                { y: p_attendance, indexLabel: "Absent day number in %" },

                            ]
                        }
                    ]
                });
            chart.render();
        }

        function bar_remark_diagram(array_json,total_max_remark) {
            //alert (array_json->sub_name);
            if ( $("#homework_remark_chart_div").css('display') == 'none' ){
                $("#homework_remark_chart_div").show();
            }
            else
            {
                $("#homework_remark_chart_div").hide();
            }
            account_total_remark=0;
            account_remark_got=0;

            economic_total_remark=0;
            economic_remark_got=0;

            english_total_remark=0;
            english_remark_got=0;

            enviroment_total_remark=0;
            enviroment_remark_got=0;

            math_total_remark=0;
            math_remark_got=0;

            gk_total_remark=0;
            gk_remark_got=0;

            nepali_total_remark=0;
            nepali_remark_got=0;

            opt_math_total_remark=0;
            opt_math_remark_got=0;

            science_total_remark=0;
            science_remark_got=0;

            social_total_remark=0;
            social_remark_got=0;
            $.each(array_json, function(key, value) {
                //alert (value['sub_name']);
                switch(value['sub_name']) {
                    case "account":
                        account_total_remark=value['total_remark'];
                        account_remark_got=value['remark_got'];

                        break;
                    case "economic":
                        economic_total_remark=value['total_remark'];
                        economic_remark_got=value['remark_got'];

                        break;
                    case "english":
                        english_total_remark=value['total_remark'];
                        english_remark_got=value['remark_got'];

                        break;
                    case "enviroment":
                        enviroment_total_remark=value['total_remark'];
                        enviroment_remark_got=value['remark_got'];

                        break;

                    case "math":
                        math_total_remark=value['total_remark'];
                        math_remark_got=value['remark_got'];

                        break;
                    case "gk":
                        gk_total_remark=value['total_remark'];
                        gk_remark_got=value['remark_got'];

                        break;
                    case "nepali":
                        nepali_total_remark=value['total_remark'];
                        nepali_remark_got=value['remark_got'];

                        break;
                    case "Optional math":
                        opt_math_total_remark=value['total_remark'];
                        opt_math_remark_got=value['remark_got'];

                        break;
                    case "science":
                        science_total_remark=value['total_remark'];
                        science_remark_got=value['remark_got'];

                        break;

                    default:
                        social_total_remark=value['total_remark'];
                        social_remark_got=value['remark_got'];

                }

            });
            //alert (obj);
            var chart = new CanvasJS.Chart("homework_remark_chart_div",
                {
                    title:{
                        text: "Total Remark got by student in each subject"
                    },
                    axisY: {
                        title: "Remarks",
                        maximum: total_max_remark
                    },
                    data: [
                        {
                            type: "bar",
                            showInLegend: true,
                            legendText: "Total remarks",
                            color: "gold",
                            dataPoints: [
                                { y: math_total_remark, label: "Math"},
                                { y: science_total_remark, label: "Science"},
                                { y: account_total_remark, label: "Account"},
                                { y: economic_total_remark, label: "Economic"},
                                { y: english_total_remark, label: "English"},
                                { y: enviroment_total_remark, label: "Enviroment"},
                                { y: gk_total_remark, label: "Gk"},
                                { y: nepali_total_remark, label: "Nepali"},
                                { y: opt_math_total_remark, label: "Optional math"},
                                { y: social_total_remark, label: "Social"}
                            ]
                        },
                        {
                            type: "bar",
                            showInLegend: true,
                            legendText: "Student's total remark",
                            color: "silver",
                            dataPoints: [
                                { y: math_remark_got, label: "Math"},
                                { y: science_remark_got, label: "Science"},
                                { y: account_remark_got, label: "Account"},
                                { y: economic_remark_got, label: "Economic"},
                                { y: english_remark_got, label: "English"},
                                { y: enviroment_remark_got, label: "Enviroment"},
                                { y: gk_remark_got, label: "Gk"},
                                { y: nepali_remark_got, label: "Nepali"},
                                { y: opt_math_remark_got, label: "Optional math"},
                                { y: social_remark_got, label: "Social"}
                            ]
                        }

                    ]
                });

            chart.render();

        }

        function load_attendance_view_div() {



            $("#dashbord_main_content_view_hidden_div").css('display', 'block');
            $('#dashbord_main_content_view_hidden_div').load("<?php echo base_url();?>School/load_attendance_view_div", function () {
                get_days_for_attendance_view();
                load_attendance_student_select_div();
            });
        }

        function load_attendance_student_select_div() {
           // alert('dsfasf');
            $("#dashbord_main_content_view_div").css('display', 'block');
            $('#dashbord_main_content_view_div').load("<?php echo base_url();?>School/load_attendance_student_select_div", function () {

                $.ajax({
                    url:"<?php echo base_url();?>User_controller/get_attendance_view_student_list",
                    mathod:"post",
                    data:{},
                    success:function (student_list) {
                        //alert (student_list);
                        document.getElementById('attendance_student_select_list').innerHTML=student_list;

                    },
                    error: function(xhr, status, error) {
                        alert(xhr.responseText);
                    }
                });
            });
        }

        function get_days_for_attendance_view() {


                    var date=new Date();
                    var year=date.getFullYear();
                    var month=date.getMonth()+1;
                    //var day=date.getDate();

                    for(var i=1;i<=12;i++)
                    {
                                var number_of_day=new Date(year,
                                    i,
                                    0).getDate();
                                //alert (number_of_day);


                                for (var di = 1; di < number_of_day+1; di++) {
                                    var div=document.getElementById(i+"d"+di);
                                    div.innerHTML=di;
                                }
                    }



        }

        function get_attendance_record(attendance_array_json) {
           // alert ("fsadf");
            $.each(attendance_array_json, function(key, value) {
                 //alert(value['Today_year']);
                document.getElementById(value['Today_month']+"a"+value['Today_day']).innerHTML=value['Attendance_record']
            });
        }











    </script>
</head>
<body style="background-color: #aec3f3;">
<?php include('common_view/dashboard_header.php');?>
<?php include('student_view/student_dashboard_nav.php');?>
<!-- <div hidden=""></div> -->

<div class="container-fluid " id="dashbord_main_content_view_div" style=" " >

</div>

<div class="container-fluid " id="dashbord_main_content_view_hidden_div" style=" "  >
    <?php //require('admin_view/event_form.php');?>
    <?php //require('admin_view/student_add_form.php');?>
    <?php //require('common_view/massage_send_view.php');?>
    <?php //require('admin_view/notice_add_form.php');?>


</div>


<!-- <div class="container-fluid" style="height: 550px; background-color: #aec3f3;">
  	  <div class="col-md-4" style="background-color:red;" id="dashbord_massage_div">ram</div>
	  <div class="col-md-4" style="background-color:green;" id="dashbord_main_body_div">
	  	<?php //include('common_view/calendar_view_div.php');?>
	  </div>
	  <div class="col-md-4" style="background-color:#d4cff8;" id="dashbord_buttons_div">
	  	<button class="btn btn-primary active" id="calendar_button" style="width:100%; margin-top: 20px; font-size: 110%;">Calender
	  	<span id="span_year"></span>
	  	<span id="span_month"></span>
	  	<span id="span_day"></span>
	  	</button>
        <button class="btn btn-primary active" id="send_massage_button" style="width:100%; margin-top: 20px; font-size: 110%;">Send Massage</button>
        <button class="btn btn-primary active" id="view_student_detail_button" style="width:100%; margin-top: 20px; font-size: 110%;">View student detail</button>
        <button class="btn btn-primary active" id="view_event_button" style="width:100%; margin-top: 20px; font-size: 110%;">View event</button>
        <button class="btn btn-primary active" id="view_attendance_button" style="width:100%; margin-top: 20px; font-size: 110%;">View Attendance</button>
        <button class="btn btn-primary active" id="add_event_button" style="width:100%; margin-top: 20px; font-size: 110%;">Add Events</button>
        <button class="btn btn-primary active" id="send_notice_button" style="width:100%; margin-top: 20px; font-size: 110%;">Send Notice</button>
        <button class="btn btn-primary active" id="add_student_button" style="width:100%; margin-top: 20px; font-size: 110%;">Add Student</button>
	  </div>
  </div> -->


</body>
</html>





