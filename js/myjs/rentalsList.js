$(function () {
    $("#" + ProfileActiveMenu).addClass("active");
    if (userInfo !== null) {
        if (userInfo.isAuthentication) {
            checkRole();
            getRentals();
            $("#btn_newrentals").click(function (event) {
                event.preventDefault();
                window.location.href = "rentals";
            });
        } else {
            window.location.href = "home";
        }
    }else{
        window.location.href = "home";
    }

});
function getRentals(page) {
    $("#divRentalList").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentalspage/" + userInfo.userName + "?page=" + page,
        success: function (d) {
            var resultLength = (Object.keys(d.data).length - 2);
            for (var i = 1; i <= resultLength; i++) {
                var RentalID = d.data[i - 1].RentalID;
                var Title = d.data[i - 1].Title.substring(0, (d.data["titleLenght"] - 3)) + "...";
                //var Detail = d.data[i - 1].Details.substring(0, (250 - 3)) + "...";
                //var Detail = d.data[i - 1].Details;
                var myDetail = "<div id='myDetail'>" + d.data[i - 1].Details + "</div>";
                var Detail = $(myDetail).text().substring(0, (250 - 3)) + "...";
                var StatusNameEN = d.data[i - 1].StatusNameEN;
                var StatusNameTH = d.data[i - 1].StatusNameTH;
                var Status = d.data[i - 1].Status;
                var MonthlyRentalFeeFrom = $.number(d.data[i - 1].MonthlyRentalFeeFrom);
                var MonthlyRentalFeeTo = $.number(d.data[i - 1].MonthlyRentalFeeTo);
                rentalListControl(d.data[i - 1].Picture, RentalID, Title, Detail, StatusNameEN, StatusNameTH, Status, MonthlyRentalFeeFrom, MonthlyRentalFeeTo);
                $("#" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", $(this).attr("id"));
                    window.location.href = "rentalsedit";
                });
                $("#a_" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", $(this).attr("id").substring(2));
                    window.location.href = "rentalsedit";
                });
            }
            Pagination(d.total, d.per_page);
        },
        error: function (xhr, status, error) {
            alert("Error1 getRentals : " + xhr.responseText);
            alert("Error2 getRentals : " + status);
            alert("Error3 getRentals : " + error);
        }
    });
}
function getRentalsAll(page) {
    $("#divRentalList").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentalsall?page=" + page,
        success: function (d) {
            var resultLength = (Object.keys(d.data).length - 2);
            for (var i = 1; i <= resultLength; i++) {
                var RentalID = d.data[i - 1].RentalID;
                var Title = d.data[i - 1].Title.substring(0, (d.data["titleLenght"] - 3)) + "...";
                //var Detail = d.data[i - 1].Details.substring(0, (250 - 3)) + "...";
                //var Detail = d.data[i - 1].Details;
                var myDetail = "<div id='myDetail'>" + d.data[i - 1].Details + "</div>";
                var Detail = $(myDetail).text().substring(0, (250 - 3)) + "...";
                var StatusNameEN = d.data[i - 1].StatusNameEN;
                var StatusNameTH = d.data[i - 1].StatusNameTH;
                var Status = d.data[i - 1].Status;
                var MonthlyRentalFeeFrom = d.data[i - 1].MonthlyRentalFeeFrom;
                var MonthlyRentalFeeTo = d.data[i - 1].MonthlyRentalFeeTo;
                rentalListControl(d.data[i - 1].Picture, RentalID, Title, Detail, StatusNameEN, StatusNameTH, Status, MonthlyRentalFeeFrom, MonthlyRentalFeeTo);
                $("#" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", $(this).attr("id"));
                    window.location.href = "rentalsedit";
                });
                $("#a_" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", $(this).attr("id").substring(2));
                    window.location.href = "rentalsedit";
                });
            }
            Pagination(d.total, d.per_page);
        },
        error: function (xhr, status, error) {
            alert("Error1 getRentals : " + xhr.responseText);
            alert("Error2 getRentals : " + status);
            alert("Error3 getRentals : " + error);
        }
    });
}
function getRentalsByStatus(page) {
    $("#divRentalList").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentalsbystatus/rwt?page=" + page,
        success: function (d) {
            var resultLength = (Object.keys(d.data).length - 2);
            for (var i = 1; i <= resultLength; i++) {
                var RentalID = d.data[i - 1].RentalID;
                var Title = d.data[i - 1].Title.substring(0, (d.data["titleLenght"] - 3)) + "...";
                //var Detail = d.data[i - 1].Details.substring(0, (250 - 3)) + "...";
                //var Detail = d.data[i - 1].Details;
                var myDetail = "<div id='myDetail'>" + d.data[i - 1].Details + "</div>";
                var Detail = $(myDetail).text().substring(0, (250 - 3)) + "...";
                var StatusNameEN = d.data[i - 1].StatusNameEN;
                var StatusNameTH = d.data[i - 1].StatusNameTH;
                var Status = d.data[i - 1].Status;
                var MonthlyRentalFeeFrom = d.data[i - 1].MonthlyRentalFeeFrom;
                var MonthlyRentalFeeTo = d.data[i - 1].MonthlyRentalFeeTo;
                rentalListControl(d.data[i - 1].Picture, RentalID, Title, Detail, StatusNameEN, StatusNameTH, Status, MonthlyRentalFeeFrom, MonthlyRentalFeeTo);
                $("#" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", $(this).attr("id"));
                    window.location.href = "rentalsedit";
                });
                $("#a_" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", $(this).attr("id").substring(2));
                    window.location.href = "rentalsedit";
                });
            }
            Pagination(d.total, d.per_page);
        },
        error: function (xhr, status, error) {
            alert("Error1 getRentals : " + xhr.responseText);
            alert("Error2 getRentals : " + status);
            alert("Error3 getRentals : " + error);
        }
    });
}
function rentalListControl(imgPath, rentalID, Title, Detail, StatusNameEN, StatusNameTH, Status, MonthlyRentalFeeFrom, MonthlyRentalFeeTo) {
    var imgPath = "/psurentals_uploads/" + imgPath;
    var rentalListControl = "<div class='panel panel-default rentalList'>"
            + "<div class='panel-body'>"
            + "<div class='media'>"
            + "<a id='a_" + rentalID + "' class='media-left' href=''>"
            + "<img alt='' src='" + imgPath + "' class='cover' >"
            + "</a>"
            + "<div class='media-body'><h4 class='media-heading'>"
            + "<a id='" + rentalID + "' href=''>" + Title + "</a>"
            + "</h4>"
            + "<div class='monthlyfee'>"
            + "<span class='monthlyfeefrom'>" + MonthlyRentalFeeFrom + "</span>"
            + "<span class='monthlyfeeto'>" + MonthlyRentalFeeTo + "</span>"
            + "</div>"
            + Detail + "</div>"
            + "<div id='status' class='status " + Status + "'>"
            + StatusNameEN + " / " + StatusNameTH + "</div>"
            + "<br></div></div></div>";
    $("#divRentalList").append(rentalListControl);
}
function Pagination(totalData, perPage) {
    var totalPages = Math.ceil((totalData / perPage));
    $('#pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: 7,
        onPageClick: function (event, page) {
            //event.preventDefault();
            switch (activeFunction) {
                case "YourRentals":
                    getRentals(page);
                    break;
                case "WaitForApprove":
                    getRentalsByStatus(page);
                    break;
                case "InspectorAllRentals":
                    getRentalsAll(page);
                    break;
            }
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        }
    });
}


