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
        <link rel="icon" type="image/ico" href="/images/title/Property.ico" />
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
            <div class="row">
                <div class="col-md-8">
                    <div class="well">
                        <form class="form-inline">
                            <div class="form-group">
                                <label class="" for="exampleInputEmail2"> Find a </label>
                                <select class="form-control">
                                    <option>room</option>
                                    <option>property</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="exampleInputEmail2"> near </label>
                                <select class="form-control">
                                    <option>Phuket</option>
                                    <option>Hatyai</option>
                                    <option>Trang</option>
                                    <option>Suratthani</option>
                                    <option>Pattani</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="exampleInputPassword2"> for under </label>
                                <input style='width:100px;' type="number" class="form-control"  id="exampleInputPassword2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="" for="exampleInputPassword2"> Baht / month </label>
                            </div>
                            <button type="submit" class="btn btn-default"> Search </button>
                        </form>

                    </div>
                </div>
            </div>
            <hr>
            <!--            <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Heading 1</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Heading 2</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4>Heading 3</h4>
                                    </div>
                                    <div class="panel-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                                    </div>
                                </div>
                            </div>
                        </div>-->
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
