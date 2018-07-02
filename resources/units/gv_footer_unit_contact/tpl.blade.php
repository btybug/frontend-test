<h5>Contact</h5>
@if(isset($settings["footer_unit_contact_email"]))
    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>{{ $settings["footer_unit_contact_email"] }}</span></p>
@endif
@if(isset($settings["footer_unit_contact_phone"]))
    <p><i class="fa fa-phone" aria-hidden="true"></i> <span>{{ $settings["footer_unit_contact_phone"] }}</span></p>
@endif
@if(isset($settings["footer_unit_contact_location"]))
    <p><i class="fa fa-location-arrow" aria-hidden="true"></i> <span>{{ $settings["footer_unit_contact_location"] }}</span></p>
@endif
