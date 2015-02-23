$(function () {
    getMenu();
});
function getProviderMenu() {
    if (localStorage.getItem("loginStatus")) {
        var Menu = "<div class='panel panel-default'>"
                + "<div class='panel-heading'><strong>Provider</strong></div>"
                + "<div class='list-group'>"
                + "<a href='#' class='list-group-item'>Rentals</a>"
                + "<a href='#' class='list-group-item'>New Rentals</a>"
                + "<a href='#' class='list-group-item'>Profile</a>"
                + "</div></div>";
        $("#divRentalRoleMenu").append(Menu);
    }
}
function getInspectorMenu() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "roles/isinroles/" + localStorage.getItem("username") + "/Inspector",
        success: function (d) {
            if (d.result && localStorage.getItem("loginStatus")) {
                var Menu = "<div class='panel panel-default'>"
                        + "<div class='panel-heading'><strong>Inspector</strong></div>"
                        + "<div class='list-group'>"
                        + "<a href='#' class='list-group-item'>Wait for approve</a>"
                        + "<a href='#' class='list-group-item'>Rentals</a>"
                        + "</div></div>";
                $("#divRentalRoleMenu").append(Menu);
            }
        },
        error: function (xhr, status, error) {
            alert("Error1 checkPermission : " + xhr.responseText);
            alert("Error2 checkPermission : " + status);
            alert("Error3 checkPermission : " + error);
        }
    });
}
function getAdminMenu() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "roles/isinroles/" + localStorage.getItem("username") + "/Admin",
        success: function (d) {
            if (d.result && localStorage.getItem("loginStatus")) {
                var Menu = "<div class='panel panel-default'>"
                        + "<div class='panel-heading'><strong>Admin</strong></div>"
                        + "<div class='list-group'>"
                        + "<a href='#' class='list-group-item'>Manage</a>"
                        + "</div></div>";
                $("#divRentalRoleMenu").append(Menu);
            }
        },
        error: function (xhr, status, error) {
            alert("Error1 checkPermission : " + xhr.responseText);
            alert("Error2 checkPermission : " + status);
            alert("Error3 checkPermission : " + error);
        }
    });
}
function getMenu() {
    $("#divRentalRoleMenu").html("");
    getProviderMenu();
    getInspectorMenu();
    getAdminMenu();
}
function dataTest() {
    localStorage.setItem("username", "nitiwat.t"); //TEST DATA
    localStorage.setItem("loginStatus", true); //TEST DATA
}



