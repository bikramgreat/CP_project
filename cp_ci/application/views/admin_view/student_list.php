<div id="reg_student_list" class="col-md-12">
    <div id="search_div" class="col-md-12">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p style="color: #5e5e5e; font-size: 150%">Search student:</p>
            <input type="text" id="student_value_input" style="width: 100%;" placeholder="search by reg id, name, data of birth and address" oninput="get_registered_student_list_by_input()">
        </div>
        <div class="col-md-4" ></div>

    </div>



    <div  class="col-md-12" id="student_list_div" style="margin-top: 20px; background-color:#8c8c8c ">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 15%; border: solid 1px;  text-align:center; background-color: #afd9ee"><b>Reg Id</b></th>
                    <th style="width: 25%; border: solid 1px;  text-align:center; background-color: #afd9ee"><b>Student Name</b></th>
                    <th style="width: 25%; border: solid 1px;  text-align:center; background-color: #afd9ee"><b>Date Of Birth</b></th>
                    <th style="width: 25%; border: solid 1px;  text-align:center; background-color: #afd9ee"><b>Student Address</b></th>
                    <th style="width: 10%; border: solid 1px;  text-align:center; background-color: #afd9ee"></th>
                </tr>
            </thead>
            <tbody id="list_div">

            </tbody>


        </table>



    </div>
</div>