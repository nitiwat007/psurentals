/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function () {
    $("#frmLogin").submit(function (event) {
        event.preventDefault();
        authentication();
    });
});
function authentication() {
    var username = $("#username").val();
    var password = $("#password").val();
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "/api/aaa/authentication/" + username + "/" + password,
        success: function (d) {
            //alert("Test");
//            if (d.userInfo.isAuthentication) {
//                localStorage.setItem("userInfo", JSON.stringify(d.userInfo));
//                window.location.href = "login2/" + username;
//            } else {
//                alert("Login Fail.");
//            }
               //$("#frmLogin").hide();
               $("html").html(JSON.stringify(d));
        },
        error: function (xhr, status, error) {
            alert("Error1 Test authentication : " + xhr.responseText);
            alert("Error2 Test authentication : " + status);
            alert("Error3 Test authentication : " + error);
        }
    });
}


