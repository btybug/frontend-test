$(document).ready(function () {
    check();
});

function url() {
    return document.getElementById("route_composer_main").value;
}

function call(func) {
    $(".bookshelf_wrapper").removeClass("hidden");
    $("#output").append("\n please wait...\n");
    $("#output").append("\n===================================================================\n");
    $("#output").append("Executing Started");
    $("#output").append("\n===================================================================\n");
    $.post(url(),
        {
            "path": $("#path").val(),
            "package": $("#package").val(),
            "command": func,
            "function": "command",
            "_token": document.getElementsByName("_token")[0].value

        },
        function (data) {
            $("#output").append(data);
            $("#output").append("\n===================================================================\n");
            $("#output").append("Execution Ended");
            $("#output").append("\n===================================================================\n");
            $(".bookshelf_wrapper").addClass("hidden");
            autoloadUp();

        }
);
}

function autoloadUp() {
    $.post(url(),
        {
            "package": $("#package").val(),
            "function": "autoloadUp",
            "_token": document.getElementsByName("_token")[0].value
        },
        function (data) {
            $("#output").append(data);
            $("#output").append("\n===================================================================\n");
            $("#output").append("Execution Ended");
            $("#output").append("\n===================================================================\n");
            $(".bookshelf_wrapper").addClass("hidden");

        }
);
}

function check() {
    $("#output").append('\nloading...\n');
    $.post(url(),
        {
            "function": "getStatus",
            "password": $("#password").val(),
            "_token": document.getElementsByName("_token")[0].value
        },
        function (data) {
            if (data.composer_extracted) {
                $("#output").html("Ready. All commands are available.\n");
                $("button").removeClass('disabled');
            }
            else if (data.composer) {
                $.post(url(),
                    {
                        "password": $("#password").val(),
                        "function": "extractComposer",
                        "_token": document.getElementsByName("_token")[0].value

                    },
                    function (data) {
                        $("#output").append(data);
                        window.location.reload();
                    }, 'text');
            }
            else {
                $("#output").html("Please wait till composer is being installed...\n");
                $.post(url(),
                    {
                        "password": $("#password").val(),
                        "function": "downloadComposer",
                        "_token": document.getElementsByName("_token")[0].value

                    },
                    function (data) {
                        $("#output").append(data);
//                                check();
                    }, 'text');
            }
        });
}
