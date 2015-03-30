var userInfo = null;
userInfo = JSON.parse(localStorage.getItem("userInfo"));
$(function () {
    var RentalID = localStorage.getItem("ucRentalListID");
    if(RentalID===null){
        window.location.href="/home";
    }else{
        getDetails(RentalID);
    }
});
function getDetails(RentalID) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getrentaldetail/" + RentalID,
        success: function (d) {
            var AvailableDate = $.format.date(new Date(d.result[0].AvailableDate), "dd MMMM yyyy");
            $("#title").html("<h3><strong>" + d.result[0].Title + "</strong></h3>");
            $("#MonthlyRentalFee").html("<strong>" + $.number(d.result[0].MonthlyRentalFeeFrom) + " - " + $.number(d.result[0].MonthlyRentalFeeTo) + "</strong> per months");
            $("#AvailableDate").html("Available from <strong>" + AvailableDate + "</strong>");

            var distanceLength = d.distance.length;
            $("#divDistance").html("");
            for (var i = 1; i <= distanceLength; i++) {
                var distance = d.distance[i - 1].Distance;
                var distanceFrom = d.distance[i - 1].ShortNameEN;
                $("#divDistance").append("<p><h4><strong>" + distance + " Km.</strong></h4> from " + distanceFrom + "</p>");
            }

            var pictureLength = d.picture.length;
            $("#divPicture").html("");
            for (var i = 1; i <= pictureLength; i++) {
                var picturePath = "/psurentals_uploads/" + d.picture[i - 1].Picture;
                $("#divPicture").append("<img src='" + picturePath + "'>");
            }
            slideShow();

            $("#detail").html(d.result[0].Details);

            $("#tb_information").append("<tr><td>Rent fee per Month</td><td>" + $.number(d.result[0].MonthlyRentalFeeFrom) + " - " + $.number(d.result[0].MonthlyRentalFeeTo) + " Baht</td></tr>");
            $("#tb_information").append("<tr><td>Lease</td><td>" + $.number(d.result[0].LeaseFrom) + " - " + $.number(d.result[0].LeaseTo) + " Month</td></tr>");
            var LeaseEndDate = $.format.date(new Date(d.result[0].LeaseEndDate), "dd MMMM yyyy");
            $("#tb_information").append("<tr><td>Lease End date</td><td>" + LeaseEndDate + "</td></tr>");
            $("#tb_information").append("<tr><td>Bond</td><td>" + $.number(d.result[0].BondFrom) + " - " + $.number(d.result[0].BondTo) + " Baht</td></tr>");
            $("#tb_information").append("<tr><td>Security bond</td><td>" + $.number(d.result[0].SecurityBondFrom) + " - " + $.number(d.result[0].SecurityBondTo) + " Baht</td></tr>");
            var HasLeaseAgreement = d.result[0].HasLeaseAgreement;
            if (HasLeaseAgreement === '1') {
                $("#tb_information").append("<tr><td>Written tenancy agreement provided?</td><td>Yes</td></tr>");
            } else {
                $("#tb_information").append("<tr><td>Written tenancy agreement provided?</td><td>No</td></tr>");
            }
            var CanDailyRental = d.result[0].CanDailyRental;
            if (CanDailyRental === '1') {
                $("#tb_information").append("<tr><td>Daily Rental</td><td>Yes</td></tr>");
            } else {
                $("#tb_information").append("<tr><td>Daily Rental</td><td>No</td></tr>");
            }
            $("#tb_information").append("<tr><td>Daily rental fee</td><td>" + $.number(d.result[0].DailyRentalFeeFrom) + " - " + $.number(d.result[0].DailyRentalFeeTo) + " Baht</td></tr>");
            $("#tb_information").append("<tr><td>Current Occupant</td><td>" + d.result[0].CurrentOccupant + "</td></tr>");
            $("#tb_information").append("<tr><td>Current Vacancy</td><td>" + d.result[0].Vacancy + "</td></tr>");
            $("#tb_information").append("<tr><td>Bathrooms</td><td>" + d.result[0].NumOfBathrooms + "</td></tr>");

            var utilitiesLength = d.utilities.length;
            var utilities = "";
            for (var i = 1; i <= utilitiesLength; i++) {
                utilities += d.utilities[i - 1].OptionNameEN + ",<br>";
            }
            $("#tb_information").append("<tr><td>Utilities Included in Rent</td><td>" + utilities + "</td></tr>");
            
            $("#tb_information").append("<tr><td>Water Rate</td><td>" + $.number(d.result[0].WaterRate) + "</td></tr>");
            $("#tb_information").append("<tr><td>Power Rate</td><td>" + $.number(d.result[0].PowerRate) + "</td></tr>");

            var whitegoodLength = d.whitegood.length;
            var whitegood = "";
            for (var i = 1; i <= whitegoodLength; i++) {
                whitegood += d.whitegood[i - 1].OptionNameEN + ",<br>";
            }

            $("#tb_information").append("<tr><td>White Goods Provided</td><td>" + whitegood + "</td></tr>");

            $("#tb_information").append("<tr><td>Current number of female tenants</td><td>" + d.result[0].FemaleTenant + "</td></tr>");
            $("#tb_information").append("<tr><td>Current number of male tenants</td><td>" + d.result[0].MaleTenant + "</td></tr>");
            $("#tb_information").append("<tr><td>Preferred Gender</td><td>" + d.result[0].PreferGenderEN + "</td></tr>");
            $("#tb_information").append("<tr><td>Smoking</td><td>" + d.result[0].SmokingEN + "</td></tr>");
            $("#tb_information").append("<tr><td>Pets</td><td>" + d.result[0].PetEN + "</td></tr>");
            
//            if (userInfo.isAuthentication) {
//                $("#ContactDetail").html("URL : <a href='"+ d.result[0].URL +"'>"+ d.result[0].URL +"</a>");
//            }else{
//                $("#ContactDetail").html("<a href='/login'>Sign in </a> as a student to view the provider's contact details.");
//            }
            $("#ContactDetail").html("");
            $("#ContactDetail").append("<p><strong>Provider Name :</strong> "+ d.result[0].FirstName + " " + d.result[0].LastName +"</p>");
            $("#ContactDetail").append("<p><strong>Email :</strong> "+ d.result[0].Email + "</p>");
            $("#ContactDetail").append("<p><strong>Mailing Address :</strong> "+ d.result[0].MailingAddress + "</p>");
            $("#ContactDetail").append("<p><strong>Telephone Number :</strong> "+ d.result[0].TelephoneNumber + "</p>");
            $("#ContactDetail").append("<strong>URL :</strong> <a href='"+ d.result[0].URL +"'>"+ d.result[0].URL +"</a>");
        },
        error: function (xhr, status, error) {
            alert("Error1 getDetails : " + xhr.responseText);
            alert("Error2 getDetails : " + status);
            alert("Error3 getDetails : " + error);
        }
    });
}
function slideShow() {
    Galleria.loadTheme('js/galleria/themes/classic/galleria.classic.min.js');
    Galleria.run('.galleria', {responsive: true, height: 0.5625});
}
