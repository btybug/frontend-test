window.onload = function(){
    $("body").delegate(".change_password_button","click",function(event){
        event.preventDefault();
        var new_pass = $(".new_pass");
        new_pass.closest('.input-group').children("span.error").remove();
        var new_password = new_pass.val();
        var confirm_password = $(".confirm_pass").val();

        if(new_password === confirm_password && new_password !== ""){
            return   $(".change_password_form").submit();
        }
        return new_pass.closest('.form-group').addClass("has-error").end().parent().append("<span class='error display_block'>New password must be equal with confirm password and not empty.</span>");
    });
};