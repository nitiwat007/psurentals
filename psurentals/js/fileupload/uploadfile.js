$(function () {

});
function upload() {
    var settings = {
        url: "upload",
        dragDrop: true,
        fileName: "myfile",
        returnType: "json",
        onSuccess: function (files, data, xhr)
        {
            alert((data));
        },
        showDelete: true,
        deleteCallback: function (data, pd)
        {
            for (var i = 0; i < data.length; i++)
            {
                $.post("delete", {op: "delete", name: data[i]},
                function (resp, textStatus, jqXHR)
                {
                    //Show Message  
                    $("#status").append("<div>File Deleted</div>");
                });
            }
            pd.statusbar.hide(); //You choice to hide/not.

        }
    };
    var uploadObj = $("#mulitplefileuploader").uploadFile(settings);
}

