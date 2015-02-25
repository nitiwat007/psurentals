$(function () {
    $("#frmLogin").submit(function(event){
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
        url: "api/aaa/authentication/" + username + "/" + password ,
        success: function (d) {
            if(d.userInfo.isAuthentication){
                localStorage.setItem("userInfo",JSON.stringify(d.userInfo));
                window.location.href = "profile";
            }else{
                alert("Login Fail.");
            }
        },
        error: function (xhr, status, error) {
            alert("Error1 authentication : " + xhr.responseText);
            alert("Error2 authentication : " + status);
            alert("Error3 authentication : " + error);
        }
    });
}

