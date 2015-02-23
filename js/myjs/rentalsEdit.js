var rooms = [];
var bedrooms = [];
var pictures = [];
var RentalID = localStorage.getItem("RentalID");
$(function () {
    getUtilitiesIncludedInRent();
    getWhiteGoogdsProvided();
    getOtherFacilities();
    getPreferredGender();
    getPerferredTenant();
    getSmoking();
    getPets();
    getStatus();
    getProvider();
    getRentalDataEdit();
    $("#btn_backtolist").click(function (event) {
        event.preventDefault();
        window.location.href = "rentalslist";
    });
    updateRental();
});
function updateRental() {
    $("#frmRentalsUpdate").submit(function (event) {
        event.preventDefault();
        Pace.restart();
        $("#submit").text("Updateing.....");
        $("#submit").attr('disabled', 'disabled');
        $("#txtRoomsList").val(rooms);
        $("#txtBedroomsList").val(bedrooms);
        $("#txtImageList").val(pictures);
        $.ajax({
            type: "POST",
            dataType: "json",
            data: $("#frmRentalsUpdate").serialize(),
            url: "updaterental/" + RentalID,
            success: function (d) {
                //alert("Data Updated.");
                //Pace.stop();
                location.reload();
            },
            error: function (xhr, status, error) {
                alert("Error1 newRentals : " + xhr.responseText);
                alert("Error2 newRentals : " + status);
                alert("Error3 newRentals : " + error);
                $("#submit").removeAttr('disabled');
            }
        });
    });
}
function dateTimePicker() {
    $("#txtAvailableFrom").datepicker();
    $("#txtAvailableFrom").datepicker("option", "dateFormat", "dd/mm/yy");
    $("#txtLeaseEndDate").datepicker();
    $("#txtLeaseEndDate").datepicker("option", "dateFormat", "dd/mm/yy");
}
function getRentalDataEdit() {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentaldataedit/" + RentalID,
        success: function (d) {

            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#txtTitle").val(d.result[i - 1].Title);
                getPropertyType(d.result[i - 1].PropertyTypeID, d.result[i - 1].ID);
                $("#txtAddress").val(d.result[i - 1].Address);
                getAmphoe(d.result[i - 1].AmphoeID);
                $AvailableDate = d.result[i - 1].AvailableDate.split('-');
                $AvailableDateNew = $AvailableDate[2] + "/" + $AvailableDate[1] + "/" + $AvailableDate[0];
                $("#txtAvailableFrom").datepicker();
                $("#txtAvailableFrom").datepicker("option", "dateFormat", "dd/mm/yy");
                $("#txtAvailableFrom").datepicker('setDate', $AvailableDateNew);
                $("#txtRentalFeeFrom").val(d.result[i - 1].MonthlyRentalFeeFrom);
                $("#txtRentalFeeTo").val(d.result[i - 1].MonthlyRentalFeeTo);
                $("#txtLeaseFrom").val(d.result[i - 1].LeaseFrom);
                $("#txtLeaseTo").val(d.result[i - 1].LeaseTo);
                $LeaseEndDate = d.result[i - 1].LeaseEndDate.split('-');
                $LeaseEndDateNew = $LeaseEndDate[2] + "/" + $LeaseEndDate[1] + "/" + $LeaseEndDate[0];
                $("#txtLeaseEndDate").datepicker();
                $("#txtLeaseEndDate").datepicker("option", "dateFormat", "dd/mm/yy");
                $("#txtLeaseEndDate").datepicker('setDate', $LeaseEndDateNew);
                $("#txtBondFrom").val(d.result[i - 1].BondFrom);
                $("#txtBondTo").val(d.result[i - 1].BondTo);
                $("#txtSecurityBondFrom").val(d.result[i - 1].SecurityBondFrom);
                $("#txtSecurityBondTo").val(d.result[i - 1].SecurityBondTo);
                $("input:radio[name=rdbWritenLease][value=" + d.result[i - 1].HasLeaseAgreement + "]").click();
                $("input:radio[name=rdbCanDailyRental][value=" + d.result[i - 1].CanDailyRental + "]").click();
                $("#txtRentFeePerDayFrom").val(d.result[i - 1].DailyRentalFeeFrom);
                $("#txtRentFeePerDayTo").val(d.result[i - 1].DailyRentalFeeTo);
                getBedroomFurnished(d.result[i - 1].BedroomFurnishing);
                $("#txtBathrooms").val(d.result[i - 1].NumOfBathrooms);
                $("#txtWaterRate").val(d.result[i - 1].WaterRate);
                $("#txtPowerRate").val(d.result[i - 1].PowerRate);
                $("#txtOccupantsCurrent").val(d.result[i - 1].CurrentOccupant);
                $("#txtOccupantsVacancy").val(d.result[i - 1].Vacancy);
                $("#txtCurrentNumberOfMaleTenants").val(d.result[i - 1].MaleTenant);
                $("#txtCurrentNumberOffemaleTenants").val(d.result[i - 1].FemaleTenant);
                $("#" + d.result[i - 1].PreferGender).prop('checked', true);
                $("#ddlSmoking option[value='" + d.result[i - 1].Smoking + "']").attr("selected", "selected");
                $("#ddlPets option[value='" + d.result[i - 1].Pet + "']").attr("selected", "selected");
                $("#ddlProvider option[value='" + d.result[i - 1].ProviderID + "']").attr("selected", "selected");
                $("#ddlStatus option[value='" + d.result[i - 1].Status + "']").attr("selected", "selected");
                $("#txtDescription").val(d.result[i - 1].Details);
                $("#txtURL").val(d.result[i - 1].URL);
            }
            var distanceLength = d.distance.length;
            for (var i = 1; i <= distanceLength; i++) {
                $("#txtDistanceTo").val(d.distance[i - 1].Distance);
            }
            dateTimePicker();
            getRooms();
            getBedroomsAvailable();
            var roomLength = d.rooms.length;
            for (var i = 1; i <= roomLength; i++) {
                var RoomsID = d.rooms[i - 1].OID;
                var RoomsName = d.rooms[i - 1].OptionNameEN + " / " + d.rooms[i - 1].OptionNameTH;
                var RoomsAvailable = d.rooms[i - 1].Avaliable;
                rooms.push(RoomsID + "-" + RoomsName + "-" + RoomsAvailable);
                showRoomsSelect();
                deleteRoomSelected();
            }

            var bedroomLength = d.bedrooms.length;
            for (var i = 1; i <= bedroomLength; i++) {
                var bedroomsID = d.bedrooms[i - 1].OID;
                var bedroomsName = d.bedrooms[i - 1].OptionNameEN + " / " + d.bedrooms[i - 1].OptionNameTH;
                var bedroomsAvailable = d.bedrooms[i - 1].Avaliable;
                bedrooms.push(bedroomsID + "-" + bedroomsName + "-" + bedroomsAvailable);
                showBedroomsSelect();
                deleteBedroomSelected();
            }

            addRoomSelected();
            addBedroomSelected();


            var utilitiesLength = d.utilities.length;
            for (var i = 1; i <= utilitiesLength; i++) {
                $("#" + d.utilities[i - 1].OID).prop('checked', true);
            }

            var whitegoodLength = d.whitegood.length;
            for (var i = 1; i <= whitegoodLength; i++) {
                $("#" + d.whitegood[i - 1].OID).prop('checked', true);
            }

            var facilityLength = d.facility.length;
            for (var i = 1; i <= facilityLength; i++) {
                $("#" + d.facility[i - 1].OID).prop('checked', true);
            }

            var preferredtenantLength = d.preferredtenant.length;
            for (var i = 1; i <= preferredtenantLength; i++) {
                $("#" + d.preferredtenant[i - 1].OID).prop('checked', true);
            }

            var pictureLength = d.picture.length;
            for (var i = 1; i <= pictureLength; i++) {
                //$("#" + d.picture[i-1].OID).prop('checked', true);
                pictures.push(d.picture[i - 1].Picture);
                $("#upload_thumbnail").append("<div id='div_" + d.picture[i - 1].Picture + "' class='col-xs-2 col-md-2'><a href='' class='thumbnail'>" +
                        "<img id='" + d.picture[i - 1].Picture + "' src='/psurentals_uploads/" + d.picture[i - 1].Picture + "' alt=''></a></div>");
                $("#" + d.picture[i - 1].Picture).click(function (event) {
                    event.preventDefault();
                    //alert($(this).attr("id"));
                    var pictureID=$(this).attr("id");
                    $.confirm({
                        text: "Are you sure you want to delete this Picture?",
                        confirm: function (button) {
                            // do something
//                            $.ajax({
//                                type: "DELETE",
//                                dataType: "json",
//                                url: "deleterentals/" + encodeURIComponent(RentalID),
//                                success: function (d) {
//                                    getRentals();
//                                },
//                                error: function (xhr, status, error) {
//                                    alert("Error1 : " + xhr.responseText);
//                                    alert("Error2 : " + status);
//                                    alert("Error3 : " + error);
//                                }
//                            });
                            //var c_value = $(this).val();
                            //pictures.splice(c_value, 1);
                            //alert(pictureID);
                            var pictureIndex=$.inArray(pictureID,pictures);
                            pictures.splice(pictureIndex, 1);
                            $("#div_" + pictureID).remove();
                            //alert(pictureIndex);
                        },
                        cancel: function (button) {
                            // do something
                        },
                        confirmButton: "Yes I am",
                        cancelButton: "No",
                        post: true
                    });
                });
            }
            uploadFile();
        },
        error: function (xhr, status, error) {
            alert("Error1 getRentalData : " + xhr.responseText);
            alert("Error2 getRentalData : " + status);
            alert("Error3 getRentalData : " + error);
        }
    });
}
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
                                    "<img id='" + d.result + "' src='/psurentals_uploads/" + d.result + "' alt=''></a></div>");
                            $("#" + d.result).click(function (event) {
                                event.preventDefault();
                                alert($(this).attr("id"));
                            });
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
function getSmoking() {
    $("#ddlSmoking").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "smoke",
        success: function (d) {
            //$("#ddlSmoking").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlSmoking").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getSmoking();
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
            //$("#ddlPets").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlPets").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getPets();
        }
    });
}

function getStatus() {
    $("#ddlStatus").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "status",
        success: function (d) {
            //$("#ddlPets").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlStatus").append("<option value=" + d.result[i - 1].StatusCode + ">" + d.result[i - 1].StatusNameEN + " / " + d.result[i - 1].StatusNameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getStatus();
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
            //$("#ddlProvider").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlProvider").append("<option value=" + d.result[i - 1].UserID + ">" + d.result[i - 1].FirstName + " " + d.result[i - 1].LastName + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getProvider();
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
        }
    });
}
function getBedroomFurnished(BedroomFurnishing) {
    $("#ddlBedroomsFurnished").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "bedroomfurnished",
        success: function (d) {
            //$("#ddlBedroomsFurnished").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlBedroomsFurnished").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
            $("#ddlBedroomsFurnished option[value='" + BedroomFurnishing + "']").attr("selected", "selected");
        },
        error: function (xhr, status, error) {
            getBedroomFurnished();
        }
    });
}
function getProperty($PropertyTypeID, PropertyID) {
    $("#ddlProperty").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "property/" + $PropertyTypeID,
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlProperty").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].PropertyNameEN + " / " + d.result[i - 1].PropertyNameTH + "</option>");
            }
            $("#ddlProperty option[value='" + PropertyID + "']").attr("selected", "selected");
        },
        error: function (xhr, status, error) {
//            alert("Error1 getProperty : " + xhr.responseText);
//            alert("Error2 getProperty : " + status);
//            alert("Error3 getProperty : " + error);
        }
    });
}
function getPropertyType(PropertyTypeID, PropertyID) {
    $("#ddlPropertyType").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "propertytype",
        success: function (d) {
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlPropertyType").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].PropertyTypeNameEN + " / " + d.result[i - 1].PropertyTypeNameTH + "</option>");
            }
            $("#ddlPropertyType option[value='" + PropertyTypeID + "']").attr("selected", "selected");
            getProperty(PropertyTypeID, PropertyID);
            $('#ddlPropertyType').change(function () {
                var PropertyTypeID = $(this).val();
                getProperty(PropertyTypeID, PropertyID);
            });
        },
        error: function (xhr, status, error) {
            //getPropertyType();
//            alert("Error1 getPropertyType : " + xhr.responseText);
//            alert("Error2 getPropertyType : " + status);
//            alert("Error3 getPropertyType : " + error);
        }
    });
}
function getAmphoe(AmphoeID) {
    $("#ddlAmphoe").html("");
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "amphoe",
        success: function (d) {
            //$("#ddlAmphoe").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlAmphoe").append("<option value=" + d.result[i - 1].AmphoeID + ">" + d.result[i - 1].AmphoeNameEN + " / " + d.result[i - 1].AmphoeNameTH + "</option>");
            }
            $("#ddlAmphoe option[value='" + AmphoeID + "']").attr("selected", "selected");
        },
        error: function (xhr, status, error) {
            getAmphoe();
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
            //$("#ddlRooms").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlRooms").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getRooms();
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
            //$("#ddlBedroomsAvailable").append("<option value=0>-- Select / เลือก --</option>");
            var resultLength = d.result.length;
            for (var i = 1; i <= resultLength; i++) {
                $("#ddlBedroomsAvailable").append("<option value=" + d.result[i - 1].ID + ">" + d.result[i - 1].NameEN + " / " + d.result[i - 1].NameTH + "</option>");
            }
        },
        error: function (xhr, status, error) {
            getBedroomsAvailable();
        }
    });
}

function addRoomSelected() {
    $("#btnAddRooms").click(function (event) {
        event.preventDefault();

        var RoomsSelectedValue = $("#ddlRooms").val();
        var RoomsSelectedText = $("#ddlRooms option:selected").text();
        var RoomNumber = $("#txtNumberRooms").val();
        if (RoomsSelectedValue !== '0' && RoomNumber !== '') {
            var checkDuplicate = checkDuplicateRoomsSelected();
            if (checkDuplicate === false) {
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
        var action_delete = "<button id='delete' value='" + (i - 1) + "' class='btn btn-danger btn-sm'>Delete</button>";
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
        var action_delete = "<button id='delete' value='" + (i - 1) + "' class='btn btn-danger btn-sm'>Delete</button>";
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

