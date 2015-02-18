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
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/jquery.twbsPagination.js"></script>
        <script src="js/myjs/result.js"></script>

        <title></title>
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
                                <a href="#">Menu1</a>
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
            888
            <?php
            /*
                $ppttype = ($_GET['ppttype']==="")? 1 : $_GET['ppttype'];
                $near = ($_GET['near']==="")? 1 : $_GET['near'];
                $fee = ($_GET['fee']==="")? 0 : $_GET['fee'];
               
                
                
                $json = file_get_contents(printf("/rentals/%u/%u/%u", $ppttype, $near, $fee ));
                $data = json_decode($json, TRUE);
                
                echo $data;*/
            
             foreach (($rentals) as $rental) { ?>
                 
            <span>** <?= $rental->RentalID; ?></span>
            <?php 
               }
            ?>
            999
            <div class="row">
                <div class="col-md-12">
                    <h3><strong>Search Result</strong></h3>
                    <p>Your search for rooms near <em>PSU Phuket</em> returned <strong><?= $count; ?> matches</strong>.</p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <form class="form-inline">
                        <div class="form-group">
                            <label class="" for="order">Order by</label>
                            <select id="order" name="order" class="form-control">
                                <option>Cheapest</option>
                                <option>Newest</option>
                            </select>
                        </div>                           
                    </form>
                    <br>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img alt="" src="images/logoPsu90.png" style="width: 90px; height: 90px; border: 1px #e4e4e4 solid; border-radius:2px;">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">UniResort Student Accommodation</a></h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
                                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. 
                                    Donec lacinia congue felis in faucibus.
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img alt="" src="images/logoPsu90.png" style="width: 90px; height: 90px; border: 1px #e4e4e4 solid; border-radius:2px;">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">UniResort Student Accommodation</a></h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
                                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. 
                                    Donec lacinia congue felis in faucibus.
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="media">
                                <a class="media-left" href="#">
                                    <img alt="" src="images/logoPsu90.png" style="width: 90px; height: 90px; border: 1px #e4e4e4 solid; border-radius:2px;">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">UniResort Student Accommodation</a></h4>
                                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. 
                                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. 
                                    Donec lacinia congue felis in faucibus.
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <h5><strong>SCAM WARNING</strong></h5>
                    <hr>
                    <p>
                        <strong>Do not </strong>transfer money without inspecting the property and meeting the provider.
                    </p>
                    <br>
                    <h5><strong>Helpful Information</strong></h5>
                    <hr>
                    <p>
                        Contact us for information on your options, as well as advice on any issues that might arise during your tenancy.
                    </p>
                    <h5><strong>Top 5 Tips</strong></h5>
                    <hr>
                    <p>
                        1. Contact us for information on your options, as well as advice on any issues that might arise during your tenancy.
                    </p>
                    <p>
                        2. Contact us for information on your options, as well as advice on any issues that might arise during your tenancy.
                    </p>
                    <p>
                        3. Contact us for information on your options, as well as advice on any issues that might arise during your tenancy.
                    </p>
                    <p>
                        4. Contact us for information on your options, as well as advice on any issues that might arise during your tenancy.
                    </p>
                    <p>
                        5. Contact us for information on your options, as well as advice on any issues that might arise during your tenancy.
                    </p>
                </div>
            </div>
            <ul id="pagination-demo" class="pagination-sm"></ul>
            <hr>         
            <div class="row">
                <div class="col-md-4">
                    <h2>About</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                    <a class="btn btn-default" href="#">More Info</a>
                </div>
                <div class="col-md-4">
                    <h2>Term & Condition</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                    <a class="btn btn-default" href="#">More Info</a>
                </div>
                <div class="col-md-4">
                    <h2>Contact</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                    <a class="btn btn-default" href="#">More Info</a>
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
