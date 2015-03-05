<!DOCTYPE html>
<script>
    var loginName = "<li class='dropdown'>"
            + "<a id='loginName' href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-expanded='false'></a>"
            + "<ul class='dropdown-menu' role='menu'>"
            + "<li><a id='aProfile' href='#'>My Profile</a></li>"
            + "<li class='divider'></li>"
            + "<li><a id='aLogout' href='#'>Logout</a></li>"
            + "</ul></li>";
    var SignIn = "<li><a id='aSignIn' href='#'><span id='loginName'>Sign In</span></a></li>";
    $(function () {
        var userInfo = JSON.parse(localStorage.getItem("userInfo"));
        if (userInfo === null) {
            $("#ulLoginStatus").html(SignIn);
            $("#aSignIn").click(function () {
                window.location.href = "/login";
            });

        } else {
            //$("#loginName").html(userInfo.name + " <span class='caret'></span>");
            $("#ulLoginStatus").html(loginName);
            $("#loginName").html(userInfo.userName + " <span class='caret'></span>");
            $("#aLogout").click(function () {
                localStorage.removeItem("userInfo");
                alert("Logout.");
                window.location.href = "/login";
            });
            $("#aProfile").click(function () {
                window.location.href = "/profile";
            });
        }

    });

</script>
<!--<a href="#"><span id="loginName"></span></a>-->
<ul id="ulLoginStatus" class="nav navbar-nav navbar-right" style="margin-right:20px;">
    <!--    <li class="dropdown">
            <a id="loginName" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#">Logout</a></li>
            </ul>
        </li>-->
</ul>
