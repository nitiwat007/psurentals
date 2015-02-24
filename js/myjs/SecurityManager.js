var userInfo = JSON.parse(localStorage.getItem("userInfo"));
function checkRole() {
    var roles = userInfo.roles;
    getProviderMenu();
    for (var i = 0; i <= roles.length; i++) {
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
function getProviderMenu() {
    if (userInfo.isAuthentication) {
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
    if (userInfo.isAuthentication) {
        var Menu = "<div class='panel panel-default'>"
                + "<div class='panel-heading'><strong>Inspector</strong></div>"
                + "<div class='list-group'>"
                + "<a href='#' class='list-group-item'>Wait for approve</a>"
                + "<a href='#' class='list-group-item'>Rentals</a>"
                + "</div></div>";
        $("#divRentalRoleMenu").append(Menu);
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



