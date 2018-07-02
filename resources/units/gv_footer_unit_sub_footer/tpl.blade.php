<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="footer-bottom-content">
                <div class="col-md-6 reserverd">

                    @if(isset($settings["sub_footer_left_side"]))
                        <p>{{ $settings["sub_footer_left_side"] }}</p>
                    @endif

                </div>
                <div class="col-md-6 social">
                    <ul>
                        @if(isset($settings["sub_footer_facebook"]))
                            <li><a target="_blank" href="{{ $settings['sub_footer_facebook'] }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        @endif

                        @if(isset($settings["sub_footer_twitter"]))
                            <li><a target="_blank" href="{{ $settings["sub_footer_twitter"] }}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        @endif

                        @if(isset($settings["sub_footer_google"]))
                            <li><a target="_blank" href="{{ $settings["sub_footer_google"] }}"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        @endif

                        @if(isset($settings["sub_footer_linkedin"]))
                            <li><a target="_blank" href="{{ $settings["sub_footer_linkedin"] }}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        @endif

                        @if(isset($settings["sub_footer_pinterest"]))
                            <li><a target="_blank" href="{{ $settings["sub_footer_pinterest"] }}"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
