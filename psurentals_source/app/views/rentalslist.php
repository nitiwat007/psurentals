<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/jquery-1.11.2.min.js"></script>   
        <script src="js/jquery-ui/jquery-ui.js"></script>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="js/jquery-ui/jquery-ui.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/myjs/rentalsList.js"></script>
        <script src="js/confirm/jquery.confirm.js"></script>
        <script src="js/fileupload/js/vendor/jquery.ui.widget.js"></script>
        <script src="js/fileupload/js/jquery.iframe-transport.js"></script>
        <script src="js/fileupload/js/jquery.fileupload-ui.js"></script>
        <title>PSU Rentals</title>
    </head>
    <body>
        <header>
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
        <div class="container">
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
                                <a href="#">Home</a>
                            </li>
                            <li>
                                <a href="#">Menu2</a>
                            </li>
                            <li>
                                <a href="#">Menu3</a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right" style="margin-right:20px;">
                            <li><a href="../navbar/">Login or Register</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <h3><strong>Rentals Information</strong></h3>
                    <table id="tb_rentalsList" class="table table-condensed table-hover">
                        <thead>
                            <tr>
                                <td colspan="3">
                                    <button type="button" id="btn_newrentals" class="btn btn-defaultg col-md-offset-11 btn-success">
                                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> New
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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