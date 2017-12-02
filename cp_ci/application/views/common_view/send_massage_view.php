<div id="sand_massage_div" onmouseleave="hide_list_option_on_mouseout();">
    <div class="col-md-4"></div>
    <div class="col-md-4" id="massage_send_div">
        <div class="form-group ui-widget" id="user_search_div" style="width: 100%;height: 60px;">
            <label  for="text_serch_receiver" style="text-align: center;">Search Friend</label>
            <input type="text" class="form-control" id="text_search_receiver" name="user_full_name" oninput="get_user_list_name();">
            <div id="outer_list_option_div" style="display: none; overflow:scroll; height: 300px; width: 100%;  background-color:#87c8ed; border: 2px solid; position: relative;">
                <div id="list_options_div" style="">

                </div>
            </div>


        </div>
        <div id="massage_view_div" style="width: 100%; height: 440px; margin-top: -10px;">
            <div id="massage_view_main_div" style="height: 300px; width: 100%; background-color: pink; overflow: scroll;">

            </div>

            <div id="send_massage_div" style="width: 100%; height: 140px;">
                <textarea id="text_area_write_massage" style="width: 100%; height: 100px;"></textarea>
                <button class="btn btn-primary active" id="massage_send_button" style="width:80%;margin-left: 10%;" onclick="send_massage();">SEND</button>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
    <span id="span_receiver_id" hidden=""></span> <!-- to store id of current_user -->
</div>