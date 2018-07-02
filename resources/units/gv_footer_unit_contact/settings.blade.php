<div id="settings_div111">
    <div class="form-group my_rows1">
        <h3 for="newcontainer" class="col-sm-4 labelTitle">Footer contacts</h3>
        <div class="col-sm-10 ">
            <div>
                <div class="col-md-4 col-xs-12 person">
                    <div>
                        <label for="footer_unit_contact_email">Email</label>
                        <input class="form-control" id="footer_unit_contact_email" type="text" name="footer_unit_contact_email" value="{{ isset($settings['footer_unit_contact_email']) ? $settings["footer_unit_contact_email"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
                    </div>
                    <div>
                        <label for="footer_unit_contact_phone">Phone</label>
                        <input class="form-control" id="footer_unit_contact_phone" type="text" name="footer_unit_contact_phone" value="{{ isset($settings["footer_unit_contact_phone"]) ? $settings["footer_unit_contact_phone"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
                    </div>
                    <div>
                        <label for="footer_unit_contact_location">Location</label>
                        <input class="form-control" id="footer_unit_contact_location" type="text" name="footer_unit_contact_location" value="{{ isset($settings["footer_unit_contact_location"]) ? $settings["footer_unit_contact_location"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
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















