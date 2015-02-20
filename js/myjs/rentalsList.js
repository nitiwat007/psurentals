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

            var resultLength = d.data.length;
            for (var i = 1; i <= resultLength; i++) {
                var RentalID = d.data[i - 1].RentalID;
                var no=i;
                if(page>1){
                    no=i+(d.from-1)
                };
                var action_delete = "<button id='delete' value='" + RentalID + "' class='btn btn-small confirm btn-xs btn-danger'>Delete</button>";
                var action_edit = "<button id='edit' value='" + RentalID + "' class='btn btn-small confirm btn-xs btn-warning'>Edit</button>";
                $("#tb_rentalsList tbody").append("<tr><td>" + no + "</td><td>" + d.data[i - 1].Title + "</td><td>" + action_delete + " " + action_edit + "</td></tr>");
                $("table#tb_rentalsList button").click(function (event) {
                    event.preventDefault();
                    var cid = $(this).attr('id');
                    if (cid === "delete") {
                        $.confirm({
                            text: "Are you sure you want to delete ?",
                            confirm: function (button) {
                                // do something
                                $.ajax({
                                    type: "DELETE",
                                    dataType: "json",
                                    url: "deleterentals/" + encodeURIComponent(RentalID),
                                    success: function (d) {
                                        getRentals();
                                        Pagination(d.total, d.per_page);
                                    },
                                    error: function (xhr, status, error) {
                                        alert("Error1 : " + xhr.responseText);
                                        alert("Error2 : " + status);
                                        alert("Error3 : " + error);
                                    }
                                });
                            },
                            cancel: function (button) {
                                // do something
                            },
                            confirmButton: "Yes I am",
                            cancelButton: "No",
                            post: true
                        });
                    } else if (cid === "edit") {
                        localStorage.setItem("RentalID", $(this).val());
                        window.location.href = "rentalsedit";
                    }
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
function Pagination(totalData, perPage) {
    var totalPages = Math.ceil((totalData / perPage));
    $('#pagination').twbsPagination({
        totalPages: totalPages,
        visiblePages: 7,
        onPageClick: function (event, page) {
            getRentals(page);
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


