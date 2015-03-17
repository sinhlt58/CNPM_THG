function checkMail(){                                                   //checking email after entering it
    $.ajax({
        type: "POST",
        url: "functions/checkEmail.php",
        dataType: "text",
        data: "signup_mail="+$("#signup_email").val(),
        success: function (response) {
            if(response == "existed") {
                $("#email_warning").html("Email already existed");
            }
            else{
                $("#email_warning").html("");
            }
        },
        error: function() {
            console.log("Email checking error");
        }
    });
}

function checkPass() {                                          //checking if passwords do match
    var pass = $("#signup_password").val();
    var retypePass = $("#signup_retype_password").val();
    if(retypePass != "" && retypePass != undefined) {
        if (pass != retypePass)
            $("#password_warning").html("Password doesn't match");
        else
            $("#password_warning").html("");
    }
}

function checkEmptiness() {                     //if "signup_password" is empty "signup_retype_password" will be disabled
    var pass = $("#signup_password").val();
    if (pass == "") {
        $("#signup_retype_password").prop("disabled", true);
        $("#signup_retype_password").val("");
    }
    else {
        $("#signup_retype_password").prop("disabled", false);
    }
}

$(document).ready(function(){
    $("#signup_email").change(function(){
        checkMail();
    });

    $("#signup_password").keyup(function(){
        checkEmptiness();
        checkPass();
    });

    $("#signup_retype_password").keyup(function(){
        checkPass();
    });
});
