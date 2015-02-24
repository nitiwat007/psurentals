//$(document).ready(function () {
//    Galleria.loadTheme('js/galleria/themes/classic/galleria.classic.min.js');
//    Galleria.run('.galleria', {responsive:true,height:0.5625});
//    
//});

$(function () {
    var rid = $("#hrentalID").val(); //reference query string name "rentalID"

    if (rid.trim() == "") //get from localStorage
    {
        var rental = JSON.parse(localStorage.getItem("currentRental"));
        alert(rental.Title + rental.PropertyNameEN + rental.ProvinceNameEN);
    }
    alert(rid);

});
