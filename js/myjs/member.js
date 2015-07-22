/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getMember() {
    $('#divPagination').html('');
    $('#divPagination').html('<ul id="pagination" class="pagination-sm"></ul>');
    $("#divRentalList").html("");
    
    $.ajax({
        type: "GET",
        dataType: "json",
        url: "getmemberall?page=1",
        success: function (d) {
            $("#panelHeadingList").html("<strong>Member / สมาชิก" + " (" + d.total + " Results)</strong>");
            var resultLength = (Object.keys(d.data).length);
            for (var i = 1; i <= resultLength; i++) {
                
            }
            Pagination(d.total, d.per_page);
        },
        error: function (xhr, status, error) {
            alert("Error1 getMember : " + xhr.responseText);
            alert("Error2 getMember : " + status);
            alert("Error3 getMember : " + error);
        }
    });
}

