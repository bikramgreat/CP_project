<div class="container-fluid" id="student_add_form">
    <div class="col-md-4"></div>
    <div  class="col-md-4">
        <b><p style="text-align: center; color: red; font-size: 150%;">Student Registration Update</p></b>
        <b><p style="text-align: center; color: #995300; font-size: 150%;" id="student_reg_id_update"></p></b>
        <div class="form-horizontal"  >
            <div class="form-group">
                <label  for="student_first_name">First name:</label>
                <input type="text" class="form-control" id="student_first_name" required="" name="student_first_name">

            </div>

            <div class="form-group">
                <label class="control-label">Last name</label>
                <input type="text" required="" class="form-control" name="student_last_name" id="student_last_name"> </input>

            </div>
            <div class="form-group">
                <label class="control-label" for="student_date_of_birth">Date of Birth:</label>
                <div>
                    Year<select id="year">
                        <option></option>
                        <?php $number_year=1990;
                        for ($i=0; $i < 15; $i++) {
                            echo "<option>".($number_year+$i)."</option>";
                        }?>
                    </select>
                    month<select id="month" oninput="get_age();set_number_of_day('year','month','day');">
                        <option></option>
                        <?php $number_month=1;
                        for ($i=0; $i < 12; $i++) {
                            echo "<option>".($number_month+$i)."</option>";
                        }?>
                    </select>

                    day<select id="day">
                        <option></option>
                        <?php $number_day=1;
                        for ($i=0; $i < 32; $i++) {
                            echo "<option>".($number_day+$i)."</option>";
                        }?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="control-label" for="student_student_age">Student age:</label>

                <input type="number" class="form-control" id="student_student_age" required="" name="student_student_age"></input>

            </div>



            <div class="form-group">
                <label class="control-label" for="student_address">Address:</label>
                <input type="text" class="form-control" id="student_address" required="" name="student_address"></input>

            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-primary active" id="student_save_button" onclick="update_student_registration();">update Registration detail</button>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>

</div>