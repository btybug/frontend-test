<div id="settings_div111">
    <div class="form-group my_rows1">
        <h3 for="newcontainer" class="col-sm-4 labelTitle">Sub footer</h3>
        <div class="col-sm-10 ">
            <div class="col-md-12 slider-box">
                <h3>Left Side Title</h3>
                <input type="text" name="sub_footer_left_side" class="form-control" value="{{isset($settings["sub_footer_left_side"]) ? $settings["sub_footer_left_side"] : '' }}">
            </div>

            <div>
                <div class="col-md-4 col-xs-12 person">
                    <div>
                        <label for="social-facebook">Facebook url</label>
                        <input class="form-control" id="social-facebook" type="text" name="sub_footer_facebook" value="{{ isset($settings['sub_footer_facebook']) ? $settings["sub_footer_facebook"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
                    </div>
                    <div>
                        <label for="social-twitter">Twitter url</label>
                        <input class="form-control" id="social-twitter" type="text" name="sub_footer_twitter" value="{{ isset($settings["sub_footer_twitter"]) ? $settings["sub_footer_twitter"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
                    </div>
                    <div>
                        <label for="social-google">Google url</label>
                        <input class="form-control" id="social-google" type="text" name="sub_footer_google" value="{{ isset($settings["sub_footer_google"]) ? $settings["sub_footer_google"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
                    </div>
                    <div>
                        <label for="social-linkedin">Linkedin url</label>
                        <input class="form-control" id="social-linkedin" type="text" name="sub_footer_linkedin" value="{{ isset($settings["sub_footer_linkedin"]) ? $settings["sub_footer_linkedin"] : '' }}">
                        <button class="remove_link btn btn-danger">Clear</button>
                    </div>
                    <div>
                        <label for="social-pinterest-p">Pinterest url</label>
                        <input class="form-control" id="social-pinterest-p" type="text" name="sub_footer_pinterest" value="{{ isset($settings["sub_footer_pinterest"]) ? $settings["sub_footer_pinterest"] : '' }}">
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










