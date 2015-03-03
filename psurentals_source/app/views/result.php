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
        <script src="/js/jquery.twbsPagination.js"></script>
        <script src="/js/myjs/result.js"></script>

        <title>Search Results</title>
    </head>
    <body>
        <?php require('UserControl/Header.php'); ?>
        <?php require('UserControl/MainNavigation.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Search</h3>
                    <p>Your search for <strong>
                            <?php
                            if (is_null($propertyType)) {
                                echo "Unknown Type";
                            } else {
                                echo sprintf("%s (%s)", $propertyType->PropertyTypeNameEN, $propertyType->PropertyTypeNameTH);
                            }
                            ?>
                        </strong>
                        near 
                        <strong>
                            <?php
                            $campus = (new APICampusController())->getCampusByID(Input::get('near'));
                            if (!is_null($campus)) {
                                echo sprintf("%s (%s)", $campus->ShortNameEN, $campus->ShortNameTH);
                            } else {
                                echo "PSU (มหาวิทยาลัยสงขลานครินทร์)";
                            }
                            ?>
                        </strong> 
                        returned <strong> <?= $rentals->getTotal(); ?></strong> matches.</p>
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
                    <?php
                    /* $ppttype = ($_GET['ppttype']==="")? 1 : $_GET['ppttype'];
                      $near = ($_GET['near']==="")? 1 : $_GET['near'];
                      $fee = ($_GET['fee']==="")? 0 : $_GET['fee'];
                      $json = file_get_contents(printf("/rentals/%u/%u/%u", $ppttype, $near, $fee ));
                      $data = json_decode($json, TRUE); */
                    ?>

                    <?php require 'UserControl/RentalList.php'; ?>
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
            <?php
            foreach ($_GET as $key => $value) {
                $rentals->appends([$key => $value]);
            }
            echo $rentals->links();
            ?>
            <!--            <ul id="pagination-demo" class="pagination-sm"></ul>-->
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
            <?php require 'UserControl/Footer.php'; ?>
        </div>
    </body>
</html>