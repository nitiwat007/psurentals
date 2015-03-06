var userInfo = JSON.parse(localStorage.getItem("userInfo"));
$(function () {

    if (userInfo.isAuthentication) {
        $(".status").show();
    } else
        $(".status").hide();

    $(".cover").click(function (event) {
        event.preventDefault();
        var RentalID = $(this).attr("id");
        localStorage.setItem("ucRentalListID", RentalID);
        window.location.href = "/detail";
    });
    $(".title").click(function (event) {
        event.preventDefault();
        var RentalID = $(this).attr("id");
        localStorage.setItem("ucRentalListID", RentalID);
        window.location.href = "/detail";
    });
});

