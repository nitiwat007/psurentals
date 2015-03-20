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
        switch (roles[i].nameEN) {
            case "Admin":
                getAdminMenu();
                break;
            case "Inspector":
                getInspectorMenu();
                break;
        }
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
                + "<a id='aNewRentals' href='rentals' class='list-group-item'>New Rentals</a>"
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
                + "<a href='#' class='list-group-item'>Manage</a>"
                + "</div></div>";
        $("#divRentalRoleMenu").append(Menu);
    }
}
function checkEditPermission() {
    if(roles.length===0){
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

