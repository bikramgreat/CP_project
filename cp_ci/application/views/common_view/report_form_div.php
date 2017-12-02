
<div class="container-fluid" id="report_form_div">
    <div class="col-md-4"></div>
    <div  class="col-md-4">
        <b><p style="text-align: center; color: red; font-size: 150%;">Get Report</p></b>
        <div>
            <div class="form-group">
                <label class="col-sm-12" for="report_class" >Class:</label>
                <div class="col-sm-12">
                    <select class="col-sm-12" id="report_class" oninput="get_student_list_of_class();" style="font-size: 150%;">

                        <option ></option>
                        <?php
                        for($i=0;$i<11;$i++)
                        {
                            echo "<option>$i</option>";
                        }
                        ?>

                    </select>
                </div>

            </div>

            <div class="form-group">
                <label class="col-sm-12">Select Student:</label>



                <div class="col-sm-12">
                    <select id="student_list" class="col-sm-12" style="font-size: 150%;">


                    </select >
                </div>


            </div>

            <div class="form-group">



                <div id="validation_error" class="col-sm-12" style="text-align:center; color: crimson;"></div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <div hidden='' id='student_reg_id_div'></div>
                        <div hidden='' id='student_account_id_div'></div>
                        <button class="btn btn-primary active col-sm-12" id="report_get_button" style="margin-top: 5px;" onclick="get_report();">View Report</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>

    </div>