
<div class="container-fluid" id="homework_add_form">
    <div class="col-md-4"></div>
    <div  class="col-md-4">
        <b><p style="text-align: center; color: red; font-size: 150%;">ADD HOMEWORK</p></b>
        <div>
            <div class="form-group">
                    <label class="col-sm-6" for="homework_class" >Class:</label>

                    <select class="col-sm-6" id="homework_class" oninput="get_teacher_subject_class();">
                        <div>
                            <option ></option>
                            <?php
                            for($i=0;$i<11;$i++)
                            {
                                echo "<option>$i</option>";
                            }
                            ?>
                        </div>
                    </select>

            </div>





            <div class="form-group">
                <label class="col-sm-12">Subject:</label>



                <div class="col-sm-12">
                    <select id="subjects_list" class="col-sm-12">


                    </select >
                </div>


            </div>

            <div class="form-group">




                <div class="form-group">
                    <label class="col-sm-12">Homework Submission Last date:</label>
                    <div class="col-sm-12">
                        <!-- <input type="password" class="form-control" id="pwd" placeholder="Enter password"> -->
                        Year:
                        <select id="homework_year">
                            <option></option>
                            <?php
                            $dates = time () ;
                            $year = date('Y', $dates) ;
                            for ($i=0; $i < 2; $i++) {
                                $year_i=$year+$i;
                                echo "<option>".$year_i."</option>";
                            }
                            // $number = cal_days_in_month(CAL_GREGORIAN, 1, 2017);

                            ?>
                        </select >
                        Month:
                        <select id="homework_month" oninput="set_number_of_day('homework_year','homework_month','homework_day');">
                            <option></option>
                            <?php
                            for ($i=1; $i < 13; $i++) {

                                echo "<option>".$i."</option>";
                            }
                            ?>
                        </select>

                        Day:
                        <select id="homework_day">
                            <option></option>
                        </select>


                    </div>
                </div>



            </div>


            <div class="col-sm-12" style="text-align:center; color: crimson;" id="subject_error"></div>
            <div class="form-group">
                <label class="col-sm-12" for="event_detail">Homework Detail:</label>
                <div class="col-sm-12">

                    <textarea rows="4" cols="50" class="form-control" id="homework_detail" required="" name="homework_detail" onmouseover="check_homework_add_validataion();" oninput="check_homework_add_validataion();"></textarea>
                </div>

            </div>
            <div id="validation_error" class="col-sm-12" style="text-align:center; color: crimson;"></div>



            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-primary active col-sm-12" id="homework_save_button" style="margin-top: 5px;" onclick="save_homework_detail();">SAVE</button>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>

</div>