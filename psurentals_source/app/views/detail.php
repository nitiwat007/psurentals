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
        <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/psurentals.css">
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/galleria/galleria-1.4.2.js"></script>
        <script src="/js/numberFormat/jquery.number.js"></script>
        <script src="/js/dateFormat/jquery-dateFormat.js"></script>
        <script src="/js/myjs/detail.js"></script>
        <link href="/js/pace/CenterAtom.css" rel="stylesheet" />
        <script src="/js/pace/pace.js"></script>
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
        <input id='hrentalID' type="hidden" value="<?= Input::get('rentalID') ?>" />

        <?php require('UserControl/Header.php'); ?>
        <?php require('UserControl/MainNavigation.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Property Type</strong></h3>
                                </div>
                                <div class="panel-body">
                                     <p id="MonthlyRentalFee"></p>
                                     <p id="AvailableDate"></p>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-8">
                            <p id="title"></p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div id="divPicture" class="galleria">

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Estimated Distance</strong></h3>
                                </div>
                                <div id="divDistance" class="panel-body">

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <h4><strong>Detail</strong></h4>
                            <p id="detail"></p>
                            <br>
                            <h4><strong>Contact Detail</strong></h4>
                            <p id="ContactDetail">
                                
                            </p>
                        </div>
                        <div class="col-lg-6">
                            <table id="tb_information" class="table table-striped" style="border: 1px solid #ddd;
                                   border-radius: 4px;
                                   border-collapse: separate;
                                   border-spacing: 0;
                                   overflow: hidden;
                                   font-size: 85%;
                                   color: #666;
                                   float: right;
                                   margin-left: 10px;
                                   margin-bottom: 10px;">
                                <tr><td colspan="2"><strong>Information</strong></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php include 'UserControl/SideInformation.php'; ?>
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
            <?php require 'UserControl/Footer.php'; ?>
        </div>
    </body>
</html>
