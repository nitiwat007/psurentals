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

        <title></title>
    </head>
    <body>
        <?php require('UserControl/Header.php'); ?>
        <?php require('UserControl/MainNavigation.php'); ?>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well">
                        <form id="frmSearch" name="frmSearch" class="form-inline" action="rentals/search" method="GET" >
                            <div class="form-group">
                                <label class="" for="exampleInputEmail2"> Find a / ค้นหา </label>
                                <select name="proptype" class="form-control">
                                    <option value="1">room</option>
                                    <option value="2">property</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2"> near / ใกล้ </label>
                                <select name="near" class="form-control">
                                    <option value="1">Phuket / ภูเก็ต</option>
                                    <option value="2">Hatyai / หาดใหญ่</option>
                                    <option value="3">Trang / ตรัง</option>
                                    <option value="4">Suratthani / สุราษฎร์ธานี</option>
                                    <option value="5">Pattani / ปัตตานี</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="" for="fee"> for under / ค่าเช่าไม่เกิน </label>
                                <input name="fee" type="number" class="form-control" id="fee" placeholder="" value="1000" >
                            </div>
                            <div class="form-group">
                                <label class="" for="exampleInputPassword2"> Baht per month / บาทต่อเดือน </label>
                            </div>
                            <button type="submit" class="btn btn-default"> Search </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered col-md-12">
                        <tr>
                            <td class="col-md-6"><li><a href="#psurentals_eng1">What is PSU Rentals ?</a></li></td><td class="col-md-6"><li><a href="#psurentals_thai1">PSU Rentals คืออะไร</a></li></td>
                        </tr>
                        <tr>
                            <td><li><a href="#psurentals_eng2">What are the benefits to students?</a></li></td><td><li><a href="#psurentals_thai2">ประโยชน์สำหรับนักศึกษา</a></li></td>
                        </tr>
                        <tr>
                            <td><li><a href="#psurentals_eng3">What are the benefits to accommodation providers?</a></li></td><td><li><a href="#psurentals_thai3">ประโยชน์สำหรับผู้ให้บริการห้องเช่า</a></li></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 id="psurentals_eng1">What is PSU Rentals ?</h3>
                    <p>PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners, </p>

                    <h3 id="psurentals_eng2">What are the benefits to students?</h3>
                    <p>PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners, 
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                    </p>

                    <h3 id="psurentals_eng3">What are the benefits to accommodation providers?</h3>
                    <p>PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners, 
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                    </p>
                    <div class="text-center">
                        <h3></h3>
                        <img src="images/image1.jpg" alt="..." class="img-thumbnail">
                    </div>
                    <h3 id="psurentals_thai1">PSU Rentals คืออะไร</h3>
                    <p>PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners, </p>

                    <h3 id="psurentals_thai2">ประโยชน์สำหรับนักศึกษา</h3>
                    <p>PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners, 
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                    </p>

                    <h3 id="psurentals_thai3">ประโยชน์สำหรับผู้ให้บริการห้องเช่า</h3>
                    <p>PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners, 
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                        PSU Rentals is a website featuring vacant rooms and properties that are suitable for PSU students. Owners,
                    </p>
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
