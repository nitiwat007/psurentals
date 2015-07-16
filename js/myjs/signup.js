$(function () {
    $('[data-toggle="tooltip"]').tooltip({
        container: 'body'
    });

    $("#frmSignUp").submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: $("#frmSignUp").serialize(),
            url: "userregister",
            success: function (d) {
                alert(d.result);
                //alert("Successful Registration.");
                //window.location.href = "profile";
            },
            error: function (xhr, status, error) {
                alert("Error1 Registration : " + xhr.responseText);
                alert("Error2 Registration : " + status);
                alert("Error3 Registration : " + error);
            }
        });
    });
});