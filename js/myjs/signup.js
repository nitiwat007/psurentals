$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    $("#frmSignUp").submit(function (event) {
        event.preventDefault();
        var $btn = $("#submit").button('loading');
        // business logic...
        var password = $("#txtPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password === confirmPassword) {
            if ($("#chkTermCondition").is(":checked")) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    data: $("#frmSignUp").serialize(),
                    url: "userregister",
                    success: function (d) {
                        //alert(d.result);
                        if (d.result===true) {
                            alert("Successful Registration.");
                            window.location.href = "login";
                        } else {
                            alert(d.result);
                            $btn.button('reset');
                        }

                    },
                    error: function (xhr, status, error) {
                        alert("Error1 Registration : " + xhr.responseText);
                        alert("Error2 Registration : " + status);
                        alert("Error3 Registration : " + error);
                    }
                });
            } else {
                alert("Please check accept terms and condition.");
                $btn.button('reset');
            }

        } else {
            alert("Password not match !!!");
            $("#txtPassword").focus();
            $btn.button('reset');
        }
    });
});