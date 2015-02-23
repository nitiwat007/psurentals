$(function () {
    getRentals();
    $("#btn_newrentals").click(function (event) {
        event.preventDefault();
        window.location.href = "rentals";
    });
});
function getRentals(page) {
    $("#tb_rentalsList tbody").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentalspage?page=" + page,
        success: function (d) {
            $("#divRentalList").html("");
            var resultLength = (Object.keys(d.data).length - 2);
            for (var i = 1; i <= resultLength; i++) {
                var RentalID = d.data[i - 1].RentalID;
                var Title = d.data[i - 1].Title.substring(0, (d.data["titleLenght"] - 3)) + "...";
                var Detail = d.data[i - 1].Details.substring(0, (250 - 3)) + "...";
                rentalListControl(d.data[i - 1].Picture, RentalID, Title, Detail);
                $("#" + RentalID).click(function (event) {
                    event.preventDefault();
                    localStorage.setItem("RentalID", RentalID);
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
function rentalListControl(imgPath, rentalID, Title, Detail) {

    var imgPath = "/psurentals_uploads/" + imgPath;
    var rentalListControl = "<div class='panel panel-default rentalList'>"
            + "<div class='panel-body'>"
            + "<div class='media'>"
            + "<a class='media-left' href='#'><img alt='' src='" + imgPath + "' class='cover' >"
            + "</a>"
            + "<div class='media-body'><h4 class='media-heading'>"
            + "<a id='" + rentalID + "' href=''>" + Title + "</a>"
            + "</h4>" + Detail + "</div><br></div></div></div>";
    $("#divRentalList").append(rentalListControl);
}
function Pagination(totalData, perPage) {
    var totalPages = Math.ceil((totalData / perPage));
    $('#pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: 7,
        onPageClick: function (event, page) {
            getRentals(page);
            //window.location.href = "#header";
            $('body,html').animate({
                scrollTop: 0
            }, 500);
        }
    });
}
//function getRole(){
//    $.ajax({
//        type: "GET",
//        dataType: "json",
//        url: "http://api.phuket.psu.ac.th/roleprovider/service/getroles/ee49eee0-8c02-11e4-8d14-3d05c02b9d37/nitiwat.t",
//        success: function (d) {
//            alert(d.result[0].role_name_thai);
//        },
//        error: function (xhr, status, error) {
//            getSmoking();
////            alert("Error1 getSmoking : " + xhr.responseText);
////            alert("Error2 getSmoking : " + status);
////            alert("Error3 getSmoking : " + error);
//        }
//    });
//}


