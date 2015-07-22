var userInfo = null;
userInfo = JSON.parse(localStorage.getItem("userInfo"));
var roles = userInfo.roles;
var activeFunction = "YourRentals";
var ProfileActiveMenu = "aYourRentals";
$(function () {
    if (typeof (Storage) !== "undefined") {

    } else {
        alert("Not Support.");
    }
    checkLogin();
});
function checkRole() {
    getProviderMenu();
    for (var i = 0; i < roles.length; i++) {
        //alert(roles[i].nameEN);
        switch (roles[i].nameEN) {
            case "Admin":
                getAdminMenu();
                break;
            case "Inspector":
                getInspectorMenu();
                break;
            default:
                $("#ddlProvider").hide();
                break;

        }
    }
}
function checkRoleMakeRentals() {
    if (roles.length === 0) {
        $("#ddlProvider").hide();
        $("#lblProvider").show();
    } else {
        $("#ddlProvider").show();
        $("#lblProvider").hide();
    }
}
function checkLogin() {
    if (userInfo === null) {
        window.location.href = "login";
    }
    if (!userInfo.isAuthentication) {
        localStorage.removeItem("userInfo");
        window.location.href = "login";
    }
}
function getProviderMenu() {
    if (userInfo.isAuthentication) {
        var Menu = "<div class='panel panel-default'>"
                + "<div class='panel-heading'><strong>Provider</strong></div>"
                + "<div class='list-group'>"
                + "<a id='aYourRentals' href='#' class='list-group-item'>Your Rentals</a>"
                + "<a id='aNewRentals' href='rentals' class='list-group-item'>Make new Rentals ads</a>"
                + "</div></div>";
        $("#divRentalRoleMenu").append(Menu);

        $("#aYourRentals").click(function (event) {
            event.preventDefault();
            $(this).addClass("active");
            $("#" + ProfileActiveMenu).removeClass("active");
            ProfileActiveMenu = "aYourRentals";
            activeFunction = "YourRentals";
            $("#panelHeadingList").html("<strong>Your Rentals / ประกาศทั้งหมดของคุณ</strong>");
            $('#divPagination').html('');
            $('#divPagination').html('<ul id="pagination" class="pagination-sm"></ul>');
            getRentals();
        });
    }
}
function getInspectorMenu() {
    if (userInfo.isAuthentication) {
        var Menu = "<div class='panel panel-default'>"
                + "<div class='panel-heading'><strong>Inspector</strong></div>"
                + "<div class='list-group'>"
                + "<a id='aWaitForApprove' href='#' class='list-group-item'>Wait for approve</a>"
                + "<a id='aInspectorAllRentals' href='#' class='list-group-item'>All Rentals</a>"
                + "</div></div>";
        $("#divRentalRoleMenu").append(Menu);

        $("#aWaitForApprove").click(function (event) {
            event.preventDefault();
            $(this).addClass("active");
            $("#" + ProfileActiveMenu).removeClass("active");
            ProfileActiveMenu = "aWaitForApprove";
            activeFunction = "WaitForApprove";
            $("#panelHeadingList").html("<strong>Wait for approve / รอการอนุมัติ</strong>");
            $('#divPagination').html('');
            $('#divPagination').html('<ul id="pagination" class="pagination-sm"></ul>');
            getRentalsByStatus();
        });

        $("#aInspectorAllRentals").click(function (event) {
            event.preventDefault();
            $(this).addClass("active");
            $("#" + ProfileActiveMenu).removeClass("active");
            ProfileActiveMenu = "aInspectorAllRentals";
            activeFunction = "InspectorAllRentals";
            $("#panelHeadingList").html("<strong>All Rentals / ประกาศทั้งหมด</strong>");
            $('#divPagination').html('');
            $('#divPagination').html('<ul id="pagination" class="pagination-sm"></ul>');
            getRentalsAll();
        });
    }
}
function getAdminMenu() {
    if (userInfo.isAuthentication) {
        var Menu = "<div class='panel panel-default'>"
                + "<div class='panel-heading'><strong>Admin</strong></div>"
                + "<div class='list-group'>"
                + "<a id='aMember' href='#' class='list-group-item'>Member</a>"
                + "</div></div>";
        $("#divRentalRoleMenu").append(Menu);
        $("#aMember").click(function (event) {
            event.preventDefault();
            $(this).addClass("active");
            $("#" + ProfileActiveMenu).removeClass("active");
            ProfileActiveMenu = "aMember";
            activeFunction = "Member";
            $("#panelHeadingList").html("<strong>Member / สมาชิก</strong>");
            getMember();
        });
    }
}
function checkEditPermission() {
    if (roles.length === 0) {
        $("#btnStatus").show();
    }
    for (var i = 0; i < roles.length; i++) {
        switch (roles[i].nameEN) {
            case "Admin":
                break;
            case "Inspector":
                $('#ddlStatus').attr("disabled", false);
                $('#ddlProvider').attr("disabled", false);
                break;
        }
    }
}

