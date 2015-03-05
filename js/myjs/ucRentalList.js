$(function () {
    $(".title").click(function(event){
        event.preventDefault();
        var RentalID=$(this).attr("id");
        localStorage.setItem("ucRentalListID",RentalID);
        window.location.href="/detail";
    });
});

