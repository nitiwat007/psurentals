$(function () {
    dateTimePicker();
    getPropertyType();
    getAmphoe();
    getRooms();
    getBedroomsAvailable();
    getBedroomFurnished();
    getUtilitiesIncludedInRent();
    getWhiteGoogdsProvided();
    getOtherFacilities();
    getPreferredGender();
    getPerferredTenant();
    getSmoking();
    getPets();
    getProvider();
    newRentals();
    addRoomSelected();
    addBedroomSelected();
    uploadFile();
    $("#btn_backtolist").click(function (event) {
        event.preventDefault();
        window.location.href = "rentalslist";
    });
});
function dateTimePicker() {
    $("#txtAvailableFrom").datepicker();
    $("#txtAvailableFrom").datepicker("option", "dateFormat", "dd/mm/yy");
    $("#txtLeaseEndDate").datepicker();
    $("#txtLeaseEndDate").datepicker("option", "dateFormat", "dd/mm/yy");
}
function getPropertyType() {
    $("#ddlPropertyType").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "propertytype",
        success: function (d) {
            $("#ddlPropertyType").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlPropertyType").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].PropertyTypeNameEN + " / " + d.result[i - 1].PropertyTypeNameTH + "</option>");
            }
            $('#ddlPropertyType').change(function () {
                var PropertyTypeID = $(this).val();
                getProperty(PropertyTypeID);
            });
        },
        error: function (xhr, status, error) {
            getPropertyType();
//            alert("Error1 getPropertyType : " + xhr.responseText);
//            alert("Error2 getPropertyType : " + status);
//            alert("Error3 getPropertyType : " + error);
        }
    });
}
function getProperty($PropertyTypeID) {
    $("#ddlProperty").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "property/" + $PropertyTypeID,
        success: function (d) {
            $("#ddlProperty").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlProperty").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].PropertyNameEN + " / " + d.result[i - 1].PropertyNameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
//            alert("Error1 getProperty : " + xhr.responseText);
//            alert("Error2 getProperty : " + status);
//            alert("Error3 getProperty : " + error);
        }
    });
}
function getAmphoe() {
    $("#ddlAmphoe").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "amphoe",
        success: function (d) {
            $("#ddlAmphoe").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlAmphoe").append("<option value=" + d.result[i - 1].AmphoeID + ">" + d.result[i - 1].AmphoeNameEN + " / " + d.result[i - 1].AmphoeNameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getAmphoe();
//            alert("Error1 getAmphoe : " + xhr.responseText);
//            alert("Error2 getAmphoe : " + status);
//            alert("Error3 getAmphoe : " + error);
        }
    });
}
function getRooms() {
    $("#ddlRooms").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "rooms",
        success: function (d) {
            $("#ddlRooms").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlRooms").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getRooms();
//            alert("Error1 getRooms : " + xhr.responseText);
//            alert("Error2 getRooms : " + status);
//            alert("Error3 getRooms : " + error);
        }
    });
}
function getBedroomsAvailable() {
    $("#ddlBedroomsAvailable").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "bedrooms",
        success: function (d) {
            $("#ddlBedroomsAvailable").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlBedroomsAvailable").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getBedroomsAvailable();
//            alert("Error1 getBedroomsAvailable : " + xhr.responseText);
//            alert("Error2 getBedroomsAvailable : " + status);
//            alert("Error3 getBedroomsAvailable : " + error);
        }
    });
}
function getBedroomFurnished() {
    $("#ddlBedroomsFurnished").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "bedroomfurnished",
        success: function (d) {
            $("#ddlBedroomsFurnished").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlBedroomsFurnished").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getBedroomFurnished();
//            alert("Error1 getBedroomFurnished : " + xhr.responseText);
//            alert("Error2 getBedroomFurnished : " + status);
//            alert("Error3 getBedroomFurnished : " + error);
        }
    });
}
function getUtilitiesIncludedInRent() {
    $("#divUtilities").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "utility",
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#divUtilities").append("<label class='checkbox-inline'>" +
                        "<input type='checkbox' id='" + d.result[i - 1].ID + "' name='chkUtilities[]' value='" + d.result[i - 1].ID + "'>" +
                        d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH +
                        "</label>");
            }
        },
        error: function (xhr, status, error) {
            getUtilitiesIncludedInRent();
//            alert("Error1 getUtilitiesIncludedInRent : " + xhr.responseText);
//            alert("Error2 getUtilitiesIncludedInRent : " + status);
//            alert("Error3 getUtilitiesIncludedInRent : " + error);
        }
    });
}
function getWhiteGoogdsProvided() {
    $("#divWhiteGoodsProvider").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "whitegoods",
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#divWhiteGoodsProvider").append("<label class='checkbox-inline'>" +
                        "<input type='checkbox' id='" + d.result[i - 1].ID + "' name='chkWhiteGoodsProvider[]' value='" + d.result[i - 1].ID + "'>" +
                        d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH +
                        "</label>");
            }
        },
        error: function (xhr, status, error) {
            getWhiteGoogdsProvided();
//            alert("Error1 getWhiteGoogdsProvided : " + xhr.responseText);
//            alert("Error2 getWhiteGoogdsProvided : " + status);
//            alert("Error3 getWhiteGoogdsProvided : " + error);
        }
    });
}
function getOtherFacilities() {
    $("#divOtherFacilities").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "facility",
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#divOtherFacilities").append("<label class='checkbox-inline'>" +
                        "<input type='checkbox' id='" + d.result[i - 1].ID + "' name='chkOtherFacilities[]' value='" + d.result[i - 1].ID + "'>" +
                        d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH +
                        "</label>");
            }
        },
        error: function (xhr, status, error) {
            getOtherFacilities();
//            alert("Error1 getOtherFacilities : " + xhr.responseText);
//            alert("Error2 getOtherFacilities : " + status);
//            alert("Error3 getOtherFacilities : " + error);
        }
    });
}
function getPreferredGender() {
    $("#divPreferredGender").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "gender",
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#divPreferredGender").append("<label class='radio-inline'>" +
                        "<input type='radio' id='" + d.result[i - 1].ID + "' name='rdbPreferredGender' value='" + d.result[i - 1].ID + "'>" +
                        d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH +
                        "</label>");
            }
        },
        error: function (xhr, status, error) {
            getPreferredGender();
//            alert("Error1 getPreferredGender : " + xhr.responseText);
//            alert("Error2 getPreferredGender : " + status);
//            alert("Error3 getPreferredGender : " + error);
        }
    });
}
function getPerferredTenant() {
    $("#divPreferredTenant").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "tenant",
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#divPreferredTenant").append("<div class='checkbox'><label class='checkbox'>" +
                        "<input type='checkbox' id='" + d.result[i - 1].ID + "' name='chkPreferredTenant[]' value='" + d.result[i - 1].ID + "'>" +
                        d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH +
                        "</label></div>");
            }
        },
        error: function (xhr, status, error) {
            getPerferredTenant();
//            alert("Error1 getPerferredTenant : " + xhr.responseText);
//            alert("Error2 getPerferredTenant : " + status);
//            alert("Error3 getPerferredTenant : " + error);
        }
    });
}
function getSmoking() {
    $("#ddlSmoking").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "smoke",
        success: function (d) {
            $("#ddlSmoking").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlSmoking").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getSmoking();
//            alert("Error1 getSmoking : " + xhr.responseText);
//            alert("Error2 getSmoking : " + status);
//            alert("Error3 getSmoking : " + error);
        }
    });
}
function getPets() {
    $("#ddlPets").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "pets",
        success: function (d) {
            $("#ddlPets").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlPets").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getPets();
//            alert("Error1 getPets : " + xhr.responseText);
//            alert("Error2 getPets : " + status);
//            alert("Error3 getPets : " + error);
        }
    });
}
function getProvider() {
    $("#ddlProvider").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "provider",
        success: function (d) {
            $("#ddlProvider").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlProvider").append("<option value=" + d.result[i - 1].UserID + ">" + d.result[i - 1].FirstName + " " + d.result[i - 1].LastName + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getProvider();
//            alert("Error1 getProvider : " + xhr.responseText);
//            alert("Error2 getProvider : " + status);
//            alert("Error3 getProvider : " + error);
        }
    });
}
function newRentals() {
    $("#frmRentals").submit(function (event) {
        event.preventDefault();
        $("#txtRoomsList").val(rooms);
        $("#txtBedroomsList").val(bedrooms);
        $("#txtImageList").val(pictures);
        $.ajax({
            type: "POST",
            dataType: "json",
            data: $("#frmRentals").serialize(),
            url: "newrentals",
            success: function (d) {
                alert(d.result);
            },
            error: function (xhr, status, error) {
                alert("Error1 newRentals : " + xhr.responseText);
                alert("Error2 newRentals : " + status);
                alert("Error3 newRentals : " + error);
            }
        });
    });
}
var rooms = [];
function addRoomSelected() {
    $("#btnAddRooms").click(function (event) {
        event.preventDefault();

        var RoomsSelectedValue = $("#ddlRooms").val();
        var RoomsSelectedText = $("#ddlRooms option:selected").text();
        var RoomNumber = $("#txtNumberRooms").val();
        if (RoomsSelectedValue !== '0' && RoomNumber !== '') {
            var checkDuplicate = checkDuplicateRoomsSelected();
            if (checkDuplicate == false) {
                rooms.push(RoomsSelectedValue + "-" + RoomsSelectedText + "-" + RoomNumber);
                showRoomsSelect();
                deleteRoomSelected();
            } else {
                alert("This room has been added.");
            }
        }
    });
}
function deleteRoomSelected() {
    $("table#tb_RoomsSelected button").click(function (event) {
        event.preventDefault();
        var c_value = $(this).val();
        rooms.splice(c_value, 1);
        showRoomsSelect();
        deleteRoomSelected();
    });
}
function showRoomsSelect() {
    $("#tb_RoomsSelected tbody").html("");
    var roomsLength = rooms.length;
    for (var i = 1; i <= roomsLength; i++) {
        var action_delete = "<button id='delete' value='" + (i - 1) + "' class='btn btn-small confirm'>Delete</button>";
        var rooms_split = rooms[i - 1].split("-");
        $("#tb_RoomsSelected tbody").append("<tr><td>" + i + "</td><td>" + rooms_split[1] + "</td><td>" + rooms_split[2] + "</td><td>" + action_delete + "</td></tr>");
    }
}
function checkDuplicateRoomsSelected() {
    var roomsLength = rooms.length;
    var RoomsSelectedValue = $("#ddlRooms").val();
    var Duplicated = false;
    for (var i = 1; i <= roomsLength; i++) {
        var rooms_split = rooms[i - 1].split("-");
        var hasRoomsSelectedValue = rooms_split[0];
        if (hasRoomsSelectedValue === RoomsSelectedValue) {
            Duplicated = true;
            break;
        }
    }
    return Duplicated;
}

var bedrooms = [];
function addBedroomSelected() {
    $("#btnAddBedroom").click(function (event) {
        event.preventDefault();
        var BedroomsSelectedValue = $("#ddlBedroomsAvailable").val();
        var BedroomsSelectedText = $("#ddlBedroomsAvailable option:selected").text();
        var BedroomsNumber = $("#txtNumberBedroom").val();
        if (BedroomsSelectedValue !== '0' && BedroomsNumber !== '') {
            var checkDuplicate = checkDuplicateBedroomsSelected();
            if (checkDuplicate === false) {
                bedrooms.push(BedroomsSelectedValue + "-" + BedroomsSelectedText + "-" + BedroomsNumber);
                showBedroomsSelect();
                deleteBedroomSelected();
            } else {
                alert("This bedroom has been added.");
            }
        }
    });
}
function showBedroomsSelect() {
    $("#tb_BedroomSelected tbody").html("");
    var bedroomsLength = bedrooms.length;
    for (var i = 1; i <= bedroomsLength; i++) {
        var action_delete = "<button id='delete' value='" + (i - 1) + "' class='btn btn-small confirm'>Delete</button>";
        var bedrooms_split = bedrooms[i - 1].split("-");
        $("#tb_BedroomSelected tbody").append("<tr><td>" + i + "</td><td>" + bedrooms_split[1] + "</td><td>" + bedrooms_split[2] + "</td><td>" + action_delete + "</td></tr>");
    }
}
function deleteBedroomSelected() {
    $("table#tb_BedroomSelected button").click(function (event) {
        event.preventDefault();
        var c_value = $(this).val();
        bedrooms.splice(c_value, 1);
        showBedroomsSelect();
        deleteBedroomSelected();
    });
}
function checkDuplicateBedroomsSelected() {
    var bedroomsLength = bedrooms.length;
    var BedroomsSelectedValue = $("#ddlBedroomsAvailable").val();
    var Duplicated = false;
    for (var i = 1; i <= bedroomsLength; i++) {
        var bedrooms_split = bedrooms[i - 1].split("-");
        var hasBedroomsSelectedValue = bedrooms_split[0];
        if (hasBedroomsSelectedValue === BedroomsSelectedValue) {
            Duplicated = true;
            break;
        }
    }
    return Duplicated;
}
var pictures = [];
function uploadFile() {
    $("#fileupload").change(function () {
        var file = this.files[0];
        var pictureCheckLimit = pictures.length + this.files.length
        if (pictureCheckLimit <= 9) {
            for (var i = 0; i < this.files.length; i++) {
                if (this.files[i].size <= 307200) {
                    var fd = new FormData();
                    fd.append("file", this.files[i]);
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        data: fd,
                        url: "upload",
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        success: function (d) {
                            pictures.push(d.result);
                            $("#upload_thumbnail").append("<div class='col-xs-2 col-md-2'><a href='' class='thumbnail'>" +
                                    "<img src='/psurentals_uploads/" + d.result + "' alt=''></a></div>");
                        },
                        error: function (xhr, status, error) {
                            alert("Error1 uploadFile : " + xhr.responseText);
                            alert("Error2 uploadFile : " + status);
                            alert("Error3 uploadFile : " + error);
                        }
                    });
                } else {
                    alert("Upload image Size limit is 300 KB.");
                }
            }
        } else {
            alert("Upload image Max limit is 9.");
        }
    });
}


