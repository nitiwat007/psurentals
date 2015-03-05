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
        <script src="/js/myjs/detail.js"></script>
        <title>Rental Details</title>
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
                                    <h3 class="panel-title">Property Type</h3>
                                </div>
                                <div class="panel-body">
                                    <p>9,999 per months</p>
                                    <p>Available from 01-01-2015</p>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-8">
                            <p><h4><strong>UniResort Student Accommodation</strong></h4></p>
                            <p>5-bedroom shared house • Kellett Street • Auchenflower 4066</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="galleria">
                                <img src="/images/room/1.jpg" data-title="My title" data-description="My description">
                                <img src="/images/room/2.jpg" data-title="Another title" data-description="My <em>HTML</em> description">
                                <img src="/images/room/3.jpg" data-title="Another title" data-description="My <em>HTML</em> description">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Distance</strong></h3>
                                </div>
                                <div class="panel-body">
                                    <p><h4><strong>40 km</strong></h4> from Airport</p>
                                    <p><h4><strong>30 km</strong></h4> from Talang</p>
                                    <p><h4><strong>20 km</strong></h4> from Patong</p>
                                    <p><h4><strong>10 km</strong></h4> from Kathu</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-7">
                            <h4><strong>Detail</strong></h4>
                            <p>Excellent Location! 

                                Property Info: 5 rooms upper level with 1 kitchen and 1 bathroom, modern facilities, walking distance to bus stops and 10 minutes walking to train station. 

                                Bedrooms: 5 Bedrooms 
                                Bathrooms: 1 Bathroom 

                                Common Areas: Modern, comfortable furniture. Large Lounge/Dining Area, Internal communal laundry. 

                                Available Rooms: 

                                Room 1: Single room, $170/w, available 21/01/2015 
                                Room 2: Single room, extra large, $175/w, available 23/01/2015
                                Room 3: Single room, extra large, $175/w, available 23/01/2015
                                Room 4: Single room, $175/w, available 29/01/2015 
                                Room 5: Single room, $175/w, available 02/02/2015 

                                Common Areas: Modern, comfortable furniture. Large Lounge/Dining Area, Internal communal laundry. 

                                Your Room Includes: Fully furnished with Single Bed, Desk, Chair, Paper Bin, and Hard Wired Smoke Detector. 

                                Rent Includes: Electricity, Furniture, Gardening, Gas, Internet and Water. 

                                Improving our Services to Our Resident Customers 
                                The service offering below which is included in your rent has been carefully designed with the aim of enhancing your living experience with THE PAD and will include the following: 
                                • Professional monthly room cleaning 
                                • Provision of a linen pack (bed sheets x 2 & pillow cases x 2); 
                                • Replacement of the linen pack once a month (this is a collection and delivery service only and will not include making of the beds) 
                                • Professional laundry services to wash the linen pack; 
                                • The ability to utilise our electronic payments system on-line to afford greater convenience to pay rent; and 
                                • Pastoral care and consideration welfare and accommodation standards in accordance with Federal Government’s Education Industry National Code of Practice 

                                Your Room Includes: Fully furnished with Single Bed, Desk, Chair, Paper Bin, and Hard Wired Smoke Detector. 

                                Rent Includes: Electricity, Furniture, Gardening, Gas, Internet and Water. 

                                Education Facility Close by: 
                                UQ (St Lucia) (Chancellors Place, St Lucia) 3. 6 km (15 mins) 

                                Shopping Close by: 10min to Toowong Village Shopping Centre (Lissner Street) 
                                Also IGA, Newsagent, Takeaway shops, Restaurants, Bakery, Banks & Australia Post. 

                                Public Transport: (Zones Travelled In: 1-2) 
                                Bus Route To City Approximately 10 to 15 minutes, Route 470 & 475.</p>
                            <br>
                            <h4><strong>Contact Detail</strong></h4>
                            <p>
                                Sign in as a student to view the provider's contact details.
                            </p>
                        </div>
                        <div class="col-lg-5">
                            <table class="table table-striped" style="border: 1px solid #ddd;
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
                                <tr><td>Rent fee per Month</td><td>50 - 100 Baht</td></tr>
                                <tr><td>Lease</td><td>9 Month</td></tr>
                                <tr><td>Lease End date</td><td>31-01-2015</td></tr>
                                <tr><td>Bond</td><td>5000 Baht</td></tr>
                                <tr><td>Security bond</td><td>5000 Baht</td></tr>
                                <tr><td>Written tenancy agreement provided?</td><td>Yes</td></tr>
                                <tr><td>Daily Rental</td><td>Yes</td></tr>
                                <tr><td>Rent fee per day</td><td>500 Baht</td></tr>
                                <tr><td>Room</td><td></td></tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <?php include 'UserControl/SideInformation.php'; ?>
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
            <?php require 'UserControl/Footer.php'; ?>
        </div>
    </body>
</html>
