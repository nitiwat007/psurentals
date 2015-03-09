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
        <link rel="stylesheet" href="/js/jquery-ui/jquery-ui.css">
        <link rel="stylesheet" href="/css/psurentals.css">
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/js/myjs/SecurityManager.js"></script>
        <script src="/js/myjs/rentals.js"></script>
        <script src="js/confirm/jquery.confirm.js"></script>
        <script src="/js/fileupload/js/vendor/jquery.ui.widget.js"></script>
        <script src="/js/fileupload/js/jquery.iframe-transport.js"></script>
        <script src="/js/fileupload/js/jquery.fileupload-ui.js"></script>
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
        <?php require('UserControl/Header.php'); ?>
        <?php require('UserControl/MainNavigation.php'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h4>New rentals information</h4>
                                </div>
                                <div class="col-sm-6">
                                    <button type="button" id="btn_backtolist" class="btn btn-defaultg col-md-offset-10 btn-primary">
                                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="panel-body">
                            <form id="frmRentals"  name="frmRentals" class="form-horizontal">  
                                <input type="hidden" class="form-control" id="txtUsername" name="txtUsername">
                                <div class="form-group">
                                    <label for="txtTitle" class="col-sm-3 control-label" style="text-align:left">Title <br> หัวเรื่อง</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="txtTitle" name="txtTitle" placeholder="Title / หัวเรื่อง" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlPropertyType" class="col-sm-3 control-label" style="text-align:left">Property Type <br> ประเภทที่พัก</label>
                                    <div class="col-sm-5">
                                        <select id="ddlPropertyType" name="ddlPropertyType" class="form-control" >
                                            <option>-- Select / เลือก --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlProperty" class="col-sm-3 control-label" style="text-align:left">Property <br> รูปแบบที่พัก</label>
                                    <div class="col-sm-5">
                                        <select id="ddlProperty" name="ddlProperty" class="form-control" >
                                            <option>-- Select / เลือก --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtAddress" class="col-sm-3 control-label" style="text-align:left">Address <br> ที่อยู่</label>
                                    <div class="col-sm-5">
                                        <textarea id="txtAddress" name="txtAddress" class="form-control" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlAmphoe" class="col-sm-3 control-label" style="text-align:left">Amphoe <br> อำเภอ</label>
                                    <div class="col-sm-5">
                                        <select id="ddlAmphoe" name="ddlAmphoe" class="form-control" >
                                            <option>-- Select / เลือก --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtDistanceTo" class="col-sm-3 control-label" style="text-align:left">Distance(KM) to <br> ระยะทาง(กิโลเมตร)</label>
                                    <div class="col-sm-5">
                                        <input type="number" class="form-control" min="0" id="txtDistanceTo" name="txtDistanceTo" placeholder="Distance to / ระยะทาง" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtAvailableFrom" class="col-sm-3 control-label" style="text-align:left">Available from <br> ให้เช่าได้ตั้งแต่วันที่</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="txtAvailableFrom" name="txtAvailableFrom" placeholder="Available from / ให้เช่าได้ตั้งแต่วันที่" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtRentalFeeFrom" class="col-sm-3 control-label" style="text-align:left">Rental fee per month(Baht) <br> ค่าเช่าต่อเดือน(บาท)</label>
                                    <div class="col-sm-2">
                                        <label for="txtRentalFeeFrom" class="col-sm-9 control-label" style="text-align:left">From / ตั้งแต่</label>
                                        <input type="number" class="form-control" min="0" id="txtRentalFeeFrom" name="txtRentalFeeFrom" placeholder="From" >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="txtRentalFeeTo" class="col-sm-9 control-label" style="text-align:left">To / ถึง</label>
                                        <input type="number" class="form-control" min="0" id="txtRentalFeeTo" name="txtRentalFeeTo" placeholder="To" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtLeaseFrom" class="col-sm-3 control-label" style="text-align:left">Lease(Month) <br> ระยะเวลาเช่าไม่น้อยกว่า(เดือน)</label>
                                    <div class="col-sm-2">
                                        <label for="txtLeaseFrom" class="col-sm-9 control-label" style="text-align:left">From / ตั้งแต่</label>
                                        <input type="number" class="form-control" min="0" id="txtLeaseFrom" name="txtLeaseFrom" placeholder="From" >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="txtLeaseTo" class="col-sm-9 control-label" style="text-align:left">To / ถึง</label>
                                        <input type="number" class="form-control" min="0" id="txtLeaseTo" name="txtLeaseTo" placeholder="To" >
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtLeaseEndDate" class="col-sm-3 control-label" style="text-align:left">Leade end date <br> วันสุดท้ายที่ให้เช่า</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="txtLeaseEndDate" name="txtLeaseEndDate" placeholder="Leade end date / วันสุดท้ายที่ให้เช่า">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtBondFrom" class="col-sm-3 control-label" style="text-align:left">Bond(Baht) <br> ค่ามัดจำ(บาท)</label>
                                    <div class="col-sm-2">
                                        <label for="txtBondFrom" class="col-sm-9 control-label" style="text-align:left">From / ตั้งแต่</label>
                                        <input type="number" class="form-control" min="0" id="txtBondFrom" name="txtBondFrom" placeholder="From" >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="txtBondTo" class="col-sm-9 control-label" style="text-align:left">To / ถึง</label>
                                        <input type="number" class="form-control" min="0" id="txtBondTo" name="txtBondTo" placeholder="To" >
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="txtSecurityBondFrom" class="col-sm-3 control-label" style="text-align:left">Security Bond(Baht) <br> ค่าประกันความเสียหาย(บาท)</label>
                                    <div class="col-sm-2">
                                        <label for="txtSecurityBondFrom" class="col-sm-9 control-label" style="text-align:left">From / ตั้งแต่</label>
                                        <input type="number" class="form-control" min="0" id="txtSecurityBondFrom" name="txtSecurityBondFrom" placeholder="From" >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="txtSecurityBondTo" class="col-sm-9 control-label" style="text-align:left">To / ถึง</label>
                                        <input type="number" class="form-control" min="0" id="txtSecurityBondTo" name="txtSecurityBondTo" placeholder="To" >
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="rdbWritenLease" class="col-sm-3 control-label" style="text-align:left">Written Lease agreement provider <br> มีสัญญาเช่าเป็นลายลักษณ์อักษรหรือไม่</label>
                                    <div class="col-sm-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbWritenLease" id="rdbWritenLeaseYes" value="1"> Yes / มี
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbWritenLease" id="rdbWritenLeaseNo" value="0"> No / ไม่มี
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbCanDailyRental" class="col-sm-3 control-label" style="text-align:left">Can daily rental <br> สามารถเช่าเป็นรายวันได้</label>
                                    <div class="col-sm-4">
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbCanDailyRental" id="rdbCanDailyRentalYes" value="1"> Yes / ได้
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="rdbCanDailyRental" id="rdbCanDailyRentalNo" value="0"> No / ไม่ได้
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtRentFeePerDayFrom" class="col-sm-3 control-label" style="text-align:left">Rent fee per day(Baht) <br> ค่าเช่าต่อวัน(บาท)</label>
                                    <div class="col-sm-2">
                                        <label for="txtRentFeePerDayFrom" class="col-sm-9 control-label" style="text-align:left">From / ตั้งแต่</label>
                                        <input type="number" class="form-control" min="0" id="txtRentFeePerDayFrom" name="txtRentFeePerDayFrom" placeholder="From" >
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="txtRentFeePerDayTo" class="col-sm-9 control-label" style="text-align:left">To / ถึง</label>
                                        <input type="number" class="form-control" min="0" id="txtRentFeePerDayTo" name="txtRentFeePerDayTo" placeholder="To" >
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="ddlRooms" class="col-sm-3 control-label" style="text-align:left">Rooms <br> ลักษณะของห้องพัก</label>
                                    <div class="col-sm-4">
                                        <select id="ddlRooms" name="ddlRooms" class="form-control">
                                            <option>-- Select / เลือก--</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" min="0" id="txtNumberRooms" name="txtNumberRooms" placeholder="Number">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" name="btnAddRooms" id="btnAddRooms" class="btn btn-sm btn-success">Add</button>
                                    </div>                                   
                                </div>
                                <input type="hidden" class="form-control" id="txtRoomsList" name="txtRoomsList">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label" style="text-align:left"></label>                                   
                                    <div class="col-sm-7">                                       
                                        <table id="tb_RoomsSelected" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Rooms</th>
                                                    <th>Amount</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="ddlBedroomsAvailable" class="col-sm-3 control-label" style="text-align:left">Bedrooms available <br> เตียงที่ว่าง</label>
                                    <div class="col-sm-4">
                                        <select id="ddlBedroomsAvailable" name="ddlBedroomsAvailable" class="form-control">
                                            <option>-- Select / เลือก--</option>
                                        </select>                                       
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="number" min="0" class="form-control" min="0" id="txtNumberBedroom" name="txtNumberBedroom" placeholder="Number" >
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" name="btnAddBedroom" id="btnAddBedroom" class="btn btn-sm btn-success">Add</button>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="txtBedroomsList" name="txtBedroomsList">
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label" style="text-align:left"></label>                                   
                                    <div class="col-sm-7">                                       
                                        <table id="tb_BedroomSelected" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Bedrooms</th>
                                                    <th>Amount</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="ddlBedroomsFurnished" class="col-sm-3 control-label" style="text-align:left">Bedrooms Furnished <br> เฟอร์นิเจอร์สำหรับห้องนอน</label>
                                    <div class="col-sm-5">
                                        <select id="ddlBedroomsFurnished" name="ddlBedroomsFurnished" class="form-control">
                                            <option>-- Select / เลือก--</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtBathrooms" class="col-sm-3 control-label" style="text-align:left">Bathrooms <br> จำนวนห้องน้ำ</label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" id="txtBathrooms" name="txtBathrooms" placeholder="Bathrooms / จำนวนห้องน้ำ" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chkUtilities" class="col-sm-3 control-label" style="text-align:left">Utilities included in Rent <br> สาธารณูปโภคที่รวมในค่าเช่า</label>
                                    <div id="divUtilities" class="col-sm-8">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtWaterRate" class="col-sm-3 control-label" style="text-align:left">Water Rate(Per unit) <br> ค่าน้ำ(ต่อหน่วย)</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtWaterRate" name="txtWaterRate" placeholder="Water Rate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtPowerRate" class="col-sm-3 control-label" style="text-align:left">Power Rate(Per unit) <br> ค่าไฟ(ต่อหน่วย)</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" id="txtPowerRate" name="txtPowerRate" placeholder="Power Rate">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chkWhiteGoodsProvider" class="col-sm-3 control-label" style="text-align:left">White Goods provided <br> อุปกรณ์เครื่องใช้ในบ้าน</label>
                                    <div id="divWhiteGoodsProvider" class="col-sm-8">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chkOtherFacilities" class="col-sm-3 control-label" style="text-align:left">Other Facilities <br> สิ่งอำนวยความสะดวกอื่น ๆ</label>
                                    <div id="divOtherFacilities" class="col-sm-8">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtOccupants" class="col-sm-3 control-label" style="text-align:left">Occupants <br> จำนวนผู้อาศัย</label>
                                    <div class="col-sm-2">
                                        <label for="txtOccupantsCurrent" class="col-sm-9 control-label" style="text-align:left">Current</label>
                                        <input type="number" class="form-control" min="0" id="txtOccupantsCurrent" name="txtOccupantsCurrent" placeholder="Current">
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="txtOccupantsCurrent" class="col-sm-9 control-label" style="text-align:left">Vacancy</label>
                                        <input type="number" class="form-control" min="0" id="txtOccupantsVacancy" name="txtOccupantsVacancy" placeholder="Vacancy">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtCurrentNumberOfMaleTenants" class="col-sm-3 control-label" style="text-align:left">Current number of male tenants<br> จำนวนผู้ชายที่อาศัยอยู่</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" min="0" id="txtCurrentNumberOfMaleTenants" name="txtCurrentNumberOfMaleTenants" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtCurrentNumberOffemaleTenants" class="col-sm-3 control-label" style="text-align:left">Current number of female tenants<br> จำนวนผู้หญิงที่อาศัยอยู่</label>
                                    <div class="col-sm-2">
                                        <input type="number" class="form-control" min="0" id="txtCurrentNumberOffemaleTenants" name="txtCurrentNumberOffemaleTenants" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="rdbPreferredGender" class="col-sm-3 control-label" style="text-align:left">Preferred Gender <br> ต้องการผู้เช่าที่เป็น</label>
                                    <div id="divPreferredGender" class="col-sm-8">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="chkPreferredTenant" class="col-sm-3 control-label" style="text-align:left">Preferred Tenant <br> ต้องการกลุ่มผู้เช่าที่เป็น</label>
                                    <div id="divPreferredTenant" class="col-sm-8">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlSmoking" class="col-sm-3 control-label" style="text-align:left">Smoking <br> การสูบบุหรี่</label>
                                    <div class="col-sm-5">
                                        <select id="ddlSmoking" name="ddlSmoking" class="form-control">
                                            <option>-- Select --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlPets" class="col-sm-3 control-label" style="text-align:left">Pets <br> สัตว์เลี้ยง</label>
                                    <div class="col-sm-5">
                                        <select id="ddlPets" name="ddlPets" class="form-control">
                                            <option>-- Select --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtDescription" class="col-sm-3 control-label" style="text-align:left">Description <br> รายละเอียด</label>
                                    <div class="col-sm-8">
                                        <textarea id="txtDescription" name="txtDescription" class="form-control" rows="12" placeholder="Description / รายละเอียด"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="txtURL" class="col-sm-3 control-label" style="text-align:left">URL <br> ลิงค์ที่เกี่ยวข้อง</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="txtURL" name="txtURL" placeholder="URL / ลิงค์ที่เกี่ยวข้อง">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="fileupload" class="col-sm-3 control-label" style="text-align:left">Photo(s)(Max = 9) <br> ภาพประกอบไม่เกิน 9 ภาพ</label>
                                    <div class="col-sm-8">
                                        <input id="fileupload" type="file" class="form-control" name="files[]" multiple>
                                        <input type="hidden" class="form-control" id="txtImageList" name="txtImageList">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-3 control-label" style="text-align:left"></label>
                                    <div id="upload_thumbnail" class="col-sm-8">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlProvider" class="col-sm-3 control-label" style="text-align:left">Provider</label>
                                    <div class="col-sm-5">
                                        <select id="ddlProvider" name="ddlProvider" class="form-control">
                                            <option>-- Select --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ddlProvider" class="col-sm-3 control-label" style="text-align:left"></label>
                                    <div class="col-sm-5">
                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
            <?php require('UserControl/Footer.php'); ?>
        </div>
    </body>
</html>
