$(function () {
    getRentalDataEdit();
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
function getRentalDataEdit() {
    var RentalID = localStorage.getItem("RentalID");
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
            }
            var distanceLength = d.distance.length;
            for (var i = 1; i <= distanceLength; i++) {
                $("#txtDistanceTo").val(d.distance[i - 1].Distance);
            }
            dateTimePicker();

        },
        error: function (xhr, status, error) {
            alert("Error1 getRentalData : " + xhr.responseText);
            alert("Error2 getRentalData : " + status);
            alert("Error3 getRentalData : " + error);
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
            alert("Error1 getProperty : " + xhr.responseText);
            alert("Error2 getProperty : " + status);
            alert("Error3 getProperty : " + error);
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
            getPropertyType();
            alert("Error1 getPropertyType : " + xhr.responseText);
            alert("Error2 getPropertyType : " + status);
            alert("Error3 getPropertyType : " + error);
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
            $("#ddlAmphoe").append("<option value=0>-- Select / เลือก --</option>");
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


