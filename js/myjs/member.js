/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getMember(page) {
    $("#divRentalList").html("");
    $("#divRentalList").append("<ul id='ulMemberList' class='thumbnails' style='list-style-type: none;'></ul>");

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getmemberall?page=" + page,
        success: function (d) {
            $("#panelHeadingList").html("<strong>Member / สมาชิก" + " (" + d.total + " Results)</strong>");
            var resultLength = (Object.keys(d.data).length);
            for (var i = 1; i <= resultLength; i++) {
                var UserID = d.data[i - 1].UserID;
                var FullName = d.data[i - 1].FirstName + " " + d.data[i - 1].LastName;
                var Status = d.data[i - 1].StatusNameEN;
                if (Status === null) {
                    Status = "<font color='009900'>Ok</font>";
                } else {
                    Status = "<font color='FF0000'>" + d.data[i - 1].StatusNameEN + "</font>";
                }
                memberListTemplate(UserID, FullName, Status);
            }
            Pagination(d.total, d.per_page);
        },
        error: function (xhr, status, error) {
            alert("Error1 getMember : " + xhr.responseText);
            alert("Error2 getMember : " + status);
            alert("Error3 getMember : " + error);
        }
    });
}

function memberListTemplate(UserID, FullName, Status) {
    var memberListTemplate = "<li class='col-md-10'>"
            + "<div class='thumbnail'>"
            + "<img src='/images/user.png' alt='ALT NAME' class='pull-left' style='width:96px;height:96px;'>"
            + "<div class='caption' class='pull-left'>"
            + "<a href='#' class='btn btn-primary icon  pull-right'>Select</a>"
            + "<h4>"
            + "<a href='#' >" + FullName + "</a>"
            + "</h4>"
            + "<small><b>User ID : </b>" + UserID + "</small>"
            + "<br><small><b>Status  : </b>" + Status + "</small>"
            + "</div>"
            + "</div>"
            + "</li>";
    $("#ulMemberList").append(memberListTemplate);
}

