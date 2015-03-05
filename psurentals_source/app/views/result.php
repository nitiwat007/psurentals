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
                    Your search for <strong>
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
                            //$campus = (new APICampusController())->getCampusByID(Input::get('near'));
                            if (!is_null($campus)) {
                                echo sprintf("%s (%s)", $campus->ShortNameEN, $campus->ShortNameTH);
                            } else {
                                echo "PSU (มหาวิทยาลัยสงขลานครินทร์)";
                            }
                            ?>
                        </strong> 
                        returned <strong>

                            <?php
                            // $rentals เป็นข้อมูลที่ส่งมาจาก Controller
                            if (is_null($rentals)) {
                                echo '0';
                            } else {
                                echo $rentals->getTotal();
                            }
                            ?></strong> matches.
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-9">
                    <form class="form-inline" action="/rentals/search" method="GET" >
                        <div class="form-group">
                           
                            <input type="hidden" name="proptype" value="<?= Input::get('proptype'); ?>">
                            <input type="hidden" name="near" value="<?=  Input::get('near'); ?>">
                            <input type="hidden" name="fee" value="<?= Input::get('fee'); ?>">
                            <input type="hidden" name="status" value="<?= Input::get('status'); ?>">
                            <label class="" for="order">Order by</label>
                           
                            <select id="order" name="order" class="form-control" onchange="this.form.submit()">
                                <?php foreach ($orders as $k => $o) { ?>
                                <option value="<?= $o ?>" <?= (Input::get('order')==$o)?'selected=selected' : '' ?>><?= $k ?></option>
                                <?php } ?>
                            </select>
                        </div>                           
                    </form>
                    <br>
                    <?php require 'UserControl/RentalList.php'; ?>
                </div>

                <div class="col-md-3">
                    <?php include 'UserControl/SideInformation.php'; ?>
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