<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="/js/jquery-1.11.2.min.js"></script>   
        <script src="/js/jquery-ui/jquery-ui.js"></script>
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/bootstrap/css/jquery-ui.structure.css">
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.css">
        <link rel="stylesheet" href="/css/psurentals.css">
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/myjs/SecurityManager.js"></script>
        <script src="/js/myjs/rentalsList.js"></script>
        <script src="/js/confirm/jquery.confirm.js"></script>
        <script src="/js/fileupload/js/vendor/jquery.ui.widget.js"></script>
        <script src="/js/fileupload/js/jquery.iframe-transport.js"></script>
        <script src="/js/fileupload/js/jquery.fileupload-ui.js"></script>
        <script src="/js/jquery.twbsPagination.js"></script>
        <link href="js/pace/CenterAtom.css" rel="stylesheet" />
        <script src="js/pace/pace.js"></script>
        <script type="text/javascript">
            paceOptions = {
                ajax: true,
                startOnPageLoad: false,
                restartOnRequestAfter: false,
                elements: {
                    selectors: ['body']
                }
            };
        </script>
        <link rel="icon" type="image/ico" href="/images/title/Property.ico" />
        <title>PSU Rentals</title>
    </head>
    <body>
        <?php require('UserControl/Header.php'); ?>
        <?php require('UserControl/MainNavigation.php'); ?>
        
        <div id="mainRentals" class="container">
            <div class="row">
                <div id="divRentalRoleMenu" class="col-md-3">
                </div>
                <div  class="col-md-9">
                    <div class="panel panel-default">
                        <div id="panelHeadingList" class="panel-heading"><strong>Your Rentals / ประกาศทั้งหมดของคุณ</strong></div>
                        <div id="divRentalList" class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="divPagination" class="col-md-9 col-md-offset-3">
                    <ul id="pagination" class="pagination-sm"></ul>
                </div>
            </div>              

            <hr>
            <div class="row bottom-panel">
                <div class="col-md-4">
                    <?php include 'UserControl/About.php'; ?>
                </div>
                <div class="col-md-4">
                    <?php include 'UserControl/TermCondition.php'; ?>
                </div>
                <div class="col-md-4">
                    <?php include 'UserControl/Contact.php'; ?>
                </div>
            </div>           
            <hr>
             <?php require('UserControl/Footer.php'); ?>
        </div>
    </body>
</html>
