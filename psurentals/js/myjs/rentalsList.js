$(function () {
    getRentals();

    $("#btn_newrentals").click(function (event) {
        event.preventDefault();
        window.location.href = "rentals";
    });
});
function getRentals() {
    $("#tb_rentalsList tbody").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentals",
        success: function (d) {

            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                var RentalID = d.result[i - 1].RentalID;
                var action_delete = "<button id='delete' value='" + RentalID + "' class='btn btn-small confirm btn-xs btn-danger'>Delete</button>";
                var action_edit = "<button id='edit' value='" + RentalID + "' class='btn btn-small confirm btn-xs btn-warning'>Edit</button>";
                $("#tb_rentalsList tbody").append("<tr><td>" + i + "</td><td>" + d.result[i - 1].Title + "</td><td>" + action_delete + " " + action_edit + "</td></tr>");
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
                    }else if(cid === "edit"){
                        localStorage.setItem("RentalID", $(this).val());
                        window.location.href = "rentalsedit";
                    }
                });

            }
        },
        error: function (xhr, status, error) {
            alert("Error1 getRentals : " + xhr.responseText);
            alert("Error2 getRentals : " + status);
            alert("Error3 getRentals : " + error);
        }
    });
}


