
<div class="container-fluid" id="homework_add_form">
    <div class="col-md-4"></div>
    <div  class="col-md-4">
        <b><p style="text-align: center; color: red; font-size: 150%;">VIEW HOMEWORK DETAIL</p></b>
        <div>
            <div class="form-group">
                <label class="col-sm-12" for="homework_class" >Class:</label>
                <div class="col-sm-12">
                <select class="col-sm-12" id="homework_class" style="font-size: 150%;">

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
                <label class="col-sm-12">Subject:</label>



                <div class="col-sm-12">
                    <select id="subjects_list" class="col-sm-12" style="font-size: 150%;">
                        <option></option>
                        <option>account</option>
                        <option>economic</option>
                        <option>english</option>
                        <option>enviroment</option>
                        <option>gk</option>
                        <option>math</option>
                        <option>nepali</option>
                        <option>opt math</option>
                        <option>science</option>
                        <option>social</option>


                    </select >
                </div>


            </div>

            <div class="form-group">

            <div class="col-sm-12" style="text-align:center; color: crimson;" id="subject_error"></div>

            <div id="validation_error" class="col-sm-12" style="text-align:center; color: crimson;"></div>

            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-primary active col-sm-12" id="homework_get_button" style="margin-top: 5px;" onclick="get_homework_detail();">View Homework</button>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>

</div>