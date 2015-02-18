<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <script src="js/jquery-1.11.2.min.js"></script> 
        <link rel="stylesheet" href="css/uploadfile.css">
        <script src="js/fileupload/js/vendor/jquery.ui.widget.js"></script>
        <script src="js/fileupload/js/jquery.iframe-transport.js"></script>
        <script src="js/fileupload/js/jquery.fileupload.js"></script>
        <script src="js/fileupload/jquery.uploadfile.js"></script>
        <script src="js/myjs/fileupload.js"></script>
        <title>jQuery File Upload Example</title>
        <style>
            .bar {
                height: 18px;
                background: green;
            }
        </style>
    </head>
    <body>
        Scroll Issue:

        <div id="mulitplefileuploader">Upload</div>

        <div id="status"></div>
        <script>
            $(document).ready(function ()
            {
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
            });
        </script>
    </body>
</html>