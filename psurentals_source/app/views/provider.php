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
        <script src="js/myjs/provider.js"></script>
        <script src="js/fileupload/js/vendor/jquery.ui.widget.js"></script>
        <script src="js/fileupload/js/jquery.iframe-transport.js"></script>
        <script src="js/fileupload/js/jquery.fileupload-ui.js"></script>
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
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h4>Add New Property</h4></div>
                        <div class="panel-body">
                            <form class="form-horizontal">                               
                                <div class="form-group">
                                    <label for="txtTitle" class="col-sm-3 control-label" style="text-align:left">Title <br> หัวเรื่อง</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="txtTitle" placeholder="Title / หัวเรื่อง">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlPropertyType" class="col-sm-3 control-label" style="text-align:left">Property Type <br> ประเภทที่พัก</label>
                                    <div class="col-sm-5">
                                        <select id="ddlPropertyType" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Type A</option>
                                            <option>Type B</option>
                                            <option>Type C</option>
                                            <option>Type D</option>
                                            <option>Type E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlProperty" class="col-sm-3 control-label" style="text-align:left">Property <br> รูปแบบที่พัก</label>
                                    <div class="col-sm-5">
                                        <select id="ddlProperty" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Type A</option>
                                            <option>Type B</option>
                                            <option>Type C</option>
                                            <option>Type D</option>
                                            <option>Type E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtAddress" class="col-sm-3 control-label" style="text-align:left">Address <br> ที่อยู่</label>
                                    <div class="col-sm-5">
                                        <textarea id="txtAddress" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlAmphoe" class="col-sm-3 control-label" style="text-align:left">Amphoe <br> อำเภอ</label>
                                    <div class="col-sm-5">
                                        <select id="ddlAmphoe" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Amphoe A</option>
                                            <option>Amphoe B</option>
                                            <option>Amphoe C</option>
                                            <option>Amphoe D</option>
                                            <option>Amphoe E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtDistanceTo" class="col-sm-3 control-label" style="text-align:left">Distance to <br> ระยะทาง</label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control" id="txtDistanceTo" placeholder="Distance to / ระยะทาง">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtAvailableFrom" class="col-sm-3 control-label" style="text-align:left">Available from <br> ให้เช่าได้ตั้งแต่วันที่</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="txtAvailableFrom" placeholder="Available from / ให้เช่าได้ตั้งแต่วันที่">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtRentalFeeMin" class="col-sm-3 control-label" style="text-align:left">Rental fee per month <br> ค่าเช่าต่อเดือน</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtRentalFeeMin" placeholder="Min">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtRentalFeeMax" placeholder="Max">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtLease" class="col-sm-3 control-label" style="text-align:left">Lease <br> ระยะเวลาเช่าไม่น้อยกว่า</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtLeaseMin" placeholder="Min">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtLeaseMax" placeholder="Max">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtLeadeEndDate" class="col-sm-3 control-label" style="text-align:left">Leade end date <br> วันสุดท้ายที่ให้เช่า</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="txtLeadeEndDate" placeholder="Leade end date / วันสุดท้ายที่ให้เช่า">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtBondMin" class="col-sm-3 control-label" style="text-align:left">Bond <br> ค่ามัดจำ</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtBondMin" placeholder="Min">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtBondMax" placeholder="Max">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtSecurityBondMin" class="col-sm-3 control-label" style="text-align:left">Security Bond <br> ค่าประกันความเสียหาย</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtSecurityBondMin" placeholder="Min">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtSecurityBondMax" placeholder="Max">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbWritenLease" class="col-sm-3 control-label" style="text-align:left">Written Lease agreement provider <br> มีสัญญาเช่าเป็นลายลักษณ์อักษรหรือไม่</label>
                                    <div class="col-sm-2">
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbWritenLease" id="rdbWritenLeaseYes" value="option1"> Yes / มี
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbWritenLease" id="rdbWritenLeaseNo" value="option2"> No / ไม่มี
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbCanDailyRental" class="col-sm-3 control-label" style="text-align:left">Can daily rental <br> สามารถเช่าเป็นรายวันได้</label>
                                    <div class="col-sm-3">
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbCanDailyRental" id="rdbCanDailyRentalYes" value="option1"> Yes / ได้
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbCanDailyRental" id="rdbCanDailyRentalNo" value="option2"> No / ไม่ได้
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtRentFeePerDayMin" class="col-sm-3 control-label" style="text-align:left">Rent fee per day <br> ค่าเช่าต่อวัน</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtRentFeePerDayMin" placeholder="Min">
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtRentFeePerDayMax" placeholder="Max">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlRooms" class="col-sm-3 control-label" style="text-align:left">Rooms <br> ลักษณะของห้องพัก</label>
                                    <div class="col-sm-5">
                                        <select id="ddlRooms" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Rooms A</option>
                                            <option>Rooms B</option>
                                            <option>Rooms C</option>
                                            <option>Rooms D</option>
                                            <option>Rooms E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlBedroomsAvailable" class="col-sm-3 control-label" style="text-align:left">Bedrooms available <br> เตียงที่ว่าง</label>
                                    <div class="col-sm-5">
                                        <select id="ddlBedroomsAvailable" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Bedrooms A</option>
                                            <option>Bedrooms B</option>
                                            <option>Bedrooms C</option>
                                            <option>Bedrooms D</option>
                                            <option>Bedrooms E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlBedroomsFurnished" class="col-sm-3 control-label" style="text-align:left">Bedrooms Furnished <br> เฟอร์นิเจอร์สำหรับห้องนอน</label>
                                    <div class="col-sm-5">
                                        <select id="ddlBedroomsFurnished" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Bedrooms A</option>
                                            <option>Bedrooms B</option>
                                            <option>Bedrooms C</option>
                                            <option>Bedrooms D</option>
                                            <option>Bedrooms E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtBathrooms" class="col-sm-3 control-label" style="text-align:left">Bathrooms <br> จำนวนห้องน้ำ</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="txtBathrooms" placeholder="Bathrooms / จำนวนห้องน้ำ">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbUtilities" class="col-sm-3 control-label" style="text-align:left">Utilities included in Rent <br> สาธารณูปโภคที่รวมในค่าเช่า</label>
                                    <div class="col-sm-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbUtilities1" value="option1"> ค่าน้ำ
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbUtilities2" value="option2"> ค่าไฟ
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbUtilities3" value="option3"> ค่าอินเตอร์เน็ต
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbUtilities4" value="option3"> ค่าโทรศัพท์
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbWhiteGoodsProvider" class="col-sm-3 control-label" style="text-align:left">White Goods provided <br> อุปกรณ์เครื่องใช้ในบ้าน</label>
                                    <div class="col-sm-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider1" value="option1"> TV
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider2" value="option2"> เครื่องซักผ้า
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider3" value="option3"> ไมโครเวฟ
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider4" value="option3"> เครื่องทำน้ำอุ่น
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbOtherFacilities" class="col-sm-3 control-label" style="text-align:left">Other Facilities <br> สิ่งอำนวยความสะดวกอื่น ๆ</label>
                                    <div class="col-sm-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider1" value="option1"> สวนสาธารณะ
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider2" value="option2"> สระว่ายน้ำ
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="rdbWhiteGoodsProvider3" value="option3"> Fitness
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtOccupants" class="col-sm-3 control-label" style="text-align:left">Occupants <br> จำนวนผู้อาศัย</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtOccupantsCurrent" placeholder="Current">
                                    </div>
                                    <div class="col-sm-2">              
                                        <input type="number" class="form-control" id="txtOccupantsVacancy" placeholder="Vacancy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtCurrentNumberOfMaleTenants" class="col-sm-3 control-label" style="text-align:left">Current number of male tenants<br> จำนวนผู้ชายที่อาศัยอยู่</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtCurrentNumberOfMaleTenants" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtCurrentNumberOffemaleTenants" class="col-sm-3 control-label" style="text-align:left">Current number of female tenants<br> จำนวนผู้หญิงที่อาศัยอยู่</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtCurrentNumberOffemaleTenants" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbPreferredGender" class="col-sm-3 control-label" style="text-align:left">Written Lease agreement provider <br> มีสัญญาเช่าเป็นลายลักษณ์อักษรหรือไม่</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbPreferredGenderMale" id="rdbWritenLeaseYes" value="option1"> Male / ผู้ชาย
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbPreferredGenderFemale" id="rdbWritenLeaseNo" value="option2"> Female / ผู้หญิง
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbPreferredGenderNo" id="rdbWritenLeaseNo" value="option2"> No Preference/ ไม่เจาะจง
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chkPreferredTenant" class="col-sm-3 control-label" style="text-align:left">Preferred Tenant <br> ต้องการกลุ่มผู้เช่าที่เป็น</label>
                                    <div class="col-sm-9">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                นักศึกษาปริญญาตรี (Undergraduate Student)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                บัณฑิตศึกษา (Postgraduate Student)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                อาจารย์และพนักงานมหาวิทยาลัย (University Staff)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                ผู้ที่มาเยี่ยมชมหาวิทยาลัย (Visiting Academic)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                ศิษย์เก่า (Alumni)
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">
                                                ไม่เจาะจง (No Preference)
                                            </label>
                                        </div>                                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlSmoking" class="col-sm-3 control-label" style="text-align:left">Smoking <br> การสูบบุหรี่</label>
                                    <div class="col-sm-5">
                                        <select id="ddlSmoking" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Smoking A</option>
                                            <option>Smoking B</option>
                                            <option>Smoking C</option>
                                            <option>Smoking D</option>
                                            <option>Smoking E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlPets" class="col-sm-3 control-label" style="text-align:left">Pets <br> สัตว์เลี้ยง</label>
                                    <div class="col-sm-5">
                                        <select id="ddlPets" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Pets A</option>
                                            <option>Pets B</option>
                                            <option>Pets C</option>
                                            <option>Pets D</option>
                                            <option>Pets E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtDescription" class="col-sm-3 control-label" style="text-align:left">Description <br> รายละเอียด</label>
                                    <div class="col-sm-8">
                                        <textarea id="txtDescription" class="form-control" rows="12" placeholder="Description / รายละเอียด"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtURL" class="col-sm-3 control-label" style="text-align:left">Title <br> หัวเรื่อง</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtURL" placeholder="URL / ลิงค์ที่เกี่ยวข้อง">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtFile" class="col-sm-3 control-label" style="text-align:left">Photo(s)(Max = 9) <br> ภาพประกอบไม่เกิน 9 ภาพ</label>
                                    <div class="col-sm-8">
                                        <input id="fileupload" type="file" class="form-control" name="files[]" multiple>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlProvider" class="col-sm-3 control-label" style="text-align:left">Provider</label>
                                    <div class="col-sm-5">
                                        <select id="ddlProvider" class="form-control">
                                            <option>-- Select --</option>
                                            <option>Provider A</option>
                                            <option>Provider B</option>
                                            <option>Provider C</option>
                                            <option>Provider D</option>
                                            <option>Provider E</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlProvider" class="col-sm-3 control-label" style="text-align:left"></label>
                                    <div class="col-sm-5">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
