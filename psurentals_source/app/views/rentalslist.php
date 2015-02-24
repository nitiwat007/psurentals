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
        <title>PSU Rentals</title>
    </head>
    <body>
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <img style="max-width:60px; margin-top:10px;margin-bottom:0px;" src="images/psu-logo.png">
                    </div>
                    <div class="col-md-11" style="margin-top:50px;margin-bottom:0px;">
                        <h1><strong>PSU Rentals</strong></h1>
                        <h5>Prince of Songkla University Phuket Campus</h5>
                    </div>
                </div>
            </div>
        </header>
        <div id="navbar" class="container">
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="rentalslist">Home</a>
                            </li>
                        </ul>
                        <?php include 'UserControl/LoginName.php';  ?>                        
                    </div>
                </div>
            </nav>
        </div>
        <div id="mainRentals" class="container">
            <div class="row">
                <div id="divRentalRoleMenu" class="col-md-3">
                    <!--                    <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Provider</strong></div>
                                            <div class="list-group">
                                                <a href="#" class="list-group-item">Rentals</a>
                                                <a href="#" class="list-group-item">New Rentals</a>
                                                <a href="#" class="list-group-item">Profile</a>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Inspector</strong></div>
                                            <div class="list-group">
                                                <a href="#" class="list-group-item">Wait for approve</a>
                                                <a href="#" class="list-group-item">Rentals</a>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading"><strong>Admin</strong></div>
                                            <div class="list-group">
                                                <a href="#" class="list-group-item">God</a>
                                            </div>
                                        </div>-->
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
            <div class="row">
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
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <h5>Copyright &copy; PSU Phuket 2015</h5>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
