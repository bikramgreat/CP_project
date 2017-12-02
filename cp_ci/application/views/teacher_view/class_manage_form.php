
<div class="container-fluid" id="attendance_add_form">
    <div class="col-md-4"></div>
    <div  class="col-md-4">
        <b><p style="text-align: center; color: red; font-size: 150%;">Add Attendance</p></b>
        <div>
            <div class="form-group">
                <label class="col-sm-12" for="attendance_class_select" >Select Class:</label>
                <div class="col-sm-12">
                    <select class="col-sm-12" id="attendance_class_select" style="font-size: 150%;">

                        <option ></option>
<!--                        --><?php
//                        for($i=0;$i<11;$i++)
//                        {
//                            echo "<option>$i</option>";
//                        }
//                        ?>

                    </select>
                </div>

            </div>


            <div class="form-group">

                <div class="col-sm-12" style="text-align:center; color: crimson;" id="subject_error"></div>

                <div id="validation_error" class="col-sm-12" style="text-align:center; color: crimson;"></div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-primary active col-sm-12" id="class_student_list_get_button" style="margin-top: 5px;" onclick="get_user_list_attendance();">Take Attendance</button>

                    </div>

                    <div class="col-sm-12">
                        <button class="btn btn-primary active col-sm-12" id="add_roll_no" style="margin-top: 5px;" onclick="add_roll_no();">Add Roll no and Refresh roll no</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>

    </div>