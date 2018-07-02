<div id="settings_div111">
    <div class="form-group my_rows1">
        <h3 for="newcontainer" class="col-sm-4 labelTitle">Footer description</h3>
        <div class="col-sm-10 ">
            <div>
                <div class="col-md-12 col-xs-12 person">
                    <div>
                        <label for="footer_unit_info_description">Description</label>
                        <textarea class="form-control" id="footer_unit_info_description" type="text" name="footer_unit_info_description">{{ isset($settings['footer_unit_info_description']) ? $settings["footer_unit_info_description"] : '' }}</textarea>
                        <button class="remove_this btn btn-danger">Clear</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('body').delegate(".remove_link",'click',function(){
            $(this).parent().children('input').val('');
        });
    });
</script>





