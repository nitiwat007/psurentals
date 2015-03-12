<?php

class RentalsController extends BaseController {

    public function getPropertyType() {
        $results = DB::select("select * from propertytype");
        return Response::json(array('result' => $results));
    }

    public function getProperty($PropertyTypeID) {
        $results = DB::select("select * from vproperty where PropertyTypeID='$PropertyTypeID'");
        return Response::json(array('result' => $results));
    }

    public function getAmphoe() {
        $results = DB::select("select * from vamphoeprovince vap, vcampus vc where vap.AmphoeID=vc.AmphoeID");
        return Response::json(array('result' => $results));
    }

    public function getRooms() {
        $results = DB::select("select * from vroom");
        return Response::json(array('result' => $results));
    }
    
    public function getBedroomsAvailable() {
        $results = DB::select("select * from vbedroom");
        return Response::json(array('result' => $results));
    }

    public function getBedroomFurnished() {
        $results = DB::select("select * from vbedroomfurnished");
        return Response::json(array('result' => $results));
    }

    public function getUtilityIncludedInRent() {
        $results = DB::select("select * from vutility");
        return Response::json(array('result' => $results));
    }

    public function getWhiteGoogdsProvided() {
        $results = DB::select("select * from vwhitegoods");
        return Response::json(array('result' => $results));
    }

    public function getOtherFacilities() {
        $results = DB::select("select * from vfacility");
        return Response::json(array('result' => $results));
    }

    public function getPreferredGender() {
        $results = DB::select("select * from vgender");
        return Response::json(array('result' => $results));
    }

    public function getPerferredTenant() {
        $results = DB::select("select * from vtenant");
        return Response::json(array('result' => $results));
    }

    public function getSmoking() {
        $results = DB::select("select * from vsmoke");
        return Response::json(array('result' => $results));
    }

    public function getPets() {
        $results = DB::select("select * from vpet");
        return Response::json(array('result' => $results));
    }

    public function getProvider() {
        $results = DB::select("select * from user");
        return Response::json(array('result' => $results));
    }
    
    public function getStatus() {
        $results = DB::select("select * from status where StatusGroup='r'");
        return Response::json(array('result' => $results));
    }
    
    function getCampusByAmphoe($AmphoeID) {
        $results = DB::select("select * from vcampus where AmphoeID='$AmphoeID'");
        return $results[0]->ID;
    }
    
     //NR
    private function getCampusQuery() {
        return DB::table('vcampus');
    }
    
    //NR
    function getCampus() {
        return $this->getCampusQuery()->get();
    }
    
    //NR
    function getCampusByID($CampusID) {
        return $CampusID;
        //return DB::table('vcampus')->where('ID','=',$CampusID)->first();
    }

    public function newtRentals() {

        $rid = Uuid::generate();
        $provide_id = Input::get('ddlProvider');
        $CreatedBy = Input::get('txtUsername');
        $CreatedDate = $this->get_Datetime_Now();
        $ModifiedBy = Input::get('txtUsername');
        $ModifiedDate = $this->get_Datetime_Now();
        $Title = Input::get('txtTitle');
        $Details = Input::get('txtDescription');
        $PropertyID = Input::get('ddlProperty');
        $Address = Input::get('txtAddress');
        $AmphoeID = Input::get('ddlAmphoe');
        $AvailableDate = $this->changeFormatDate(Input::get('txtAvailableFrom'));
        $MonthlyRentalFeeFrom = Input::get('txtRentalFeeFrom');
        $MonthlyRentalFeeTo = Input::get('txtRentalFeeTo');
        $LeaseFrom = Input::get('txtLeaseFrom');
        $LeaseTo = Input::get('txtLeaseTo');
        $LeaseEndDate = $this->changeFormatDate(Input::get('txtLeaseEndDate'));
        $HasLeaseAgreement = Input::get('rdbWritenLease');
        $BondFrom = Input::get('txtBondFrom');
        $BondTo = Input::get('txtBondTo');
        $SecurityBondFrom = Input::get('txtSecurityBondFrom');
        $SecurityBondTo = Input::get('txtSecurityBondTo');
        $CanDailyRental = Input::get('rdbCanDailyRental');
        $DailyRentalFeeFrom = Input::get('txtRentFeePerDayFrom');
        $DailyRentalFeeTo = Input::get('txtRentFeePerDayTo');
        $CurrentOccupant = Input::get('txtOccupantsCurrent');
        $Vacancy = Input::get('txtOccupantsVacancy');
        $BedroomFurnishing = Input::get('ddlBedroomsFurnished');
        $NumOfBathrooms = Input::get('txtBathrooms');
        $MaleTenant = Input::get('txtCurrentNumberOfMaleTenants');
        $FemaleTenant = Input::get('txtCurrentNumberOffemaleTenants');
        $PreferGender = Input::get('rdbPreferredGender');
        $Smoking = Input::get('ddlSmoking');
        $Pet = Input::get('ddlPets');
        $URL = Input::get('txtURL');
        $WaterRate = Input::get('txtWaterRate');
        $PowerRate = Input::get('txtPowerRate');
        $Status = "rwt"; //Waiting for Approve
        $RoomList = Input::get('txtRoomsList');
        $BedroomList = Input::get('txtBedroomsList');
        $ImageList = Input::get('txtImageList');
        $DistanceTo = Input::get('txtDistanceTo');

        $Utilities = Input::get('chkUtilities');
        $WhiteGoodProvidered = Input::get('chkWhiteGoodsProvider');
        $OtherFacilities = Input::get('chkOtherFacilities');
        $PreferredTenant = Input::get('chkPreferredTenant');

        $results = DB::table('rental')->insert(
                array('RentalID' => $rid
                    , 'ProviderID' => $provide_id
                    , 'CreatedBy' => $CreatedBy
                    , 'CreatedDate' => $CreatedDate
                    , 'ModifiedBy' => $ModifiedBy
                    , 'ModifiedDate' => $ModifiedDate
                    , 'Title' => $Title
                    , 'Details' => $Details
                    , 'PropertyID' => $PropertyID
                    , 'Address' => $Address
                    , 'AmphoeID' => $AmphoeID
                    , 'AvailableDate' => $AvailableDate
                    , 'MonthlyRentalFeeFrom' => $MonthlyRentalFeeFrom
                    , 'MonthlyRentalFeeTo' => $MonthlyRentalFeeTo
                    , 'LeaseFrom' => $LeaseFrom
                    , 'LeaseTo' => $LeaseTo
                    , 'LeaseEndDate' => $LeaseEndDate
                    , 'HasLeaseAgreement' => $HasLeaseAgreement
                    , 'BondFrom' => $BondFrom
                    , 'BondTo' => $BondTo
                    , 'SecurityBondFrom' => $SecurityBondFrom
                    , 'SecurityBondTo' => $SecurityBondTo
                    , 'CanDailyRental' => $CanDailyRental
                    , 'DailyRentalFeeFrom' => $DailyRentalFeeFrom
                    , 'DailyRentalFeeTo' => $DailyRentalFeeTo
                    , 'CurrentOccupant' => $CurrentOccupant
                    , 'Vacancy' => $Vacancy
                    , 'BedroomFurnishing' => $BedroomFurnishing
                    , 'NumOfBathrooms' => $NumOfBathrooms
                    , 'MaleTenant' => $MaleTenant
                    , 'FemaleTenant' => $FemaleTenant
                    , 'PreferGender' => $PreferGender
                    , 'Smoking' => $Smoking
                    , 'Pet' => $Pet
                    , 'URL' => $URL
                    , 'WaterRate' => $WaterRate
                    , 'PowerRate' => $PowerRate
                    , 'Status' => $Status
                )
        );
        $this->addRoomList($RoomList, $rid);
        $this->addBedroomList($BedroomList, $rid);
        $this->addImageList($ImageList, $rid);
        $this->addUtilitiesList($Utilities, $rid);
        $this->addWhiteGoodProvideredList($WhiteGoodProvidered, $rid);
        $this->addOtherFacilitiesList($OtherFacilities, $rid);
        $this->addPreferredTenantList($PreferredTenant, $rid);
        $this->addDistance($DistanceTo,$rid,$this->getCampusByAmphoe($AmphoeID));

        return Response::json(array('result' => $results));
    }

    function addRoomList($RoomList, $rid) {
        $pre_results_split = explode(",", $RoomList);
        for ($i = 0; $i < sizeof($pre_results_split); $i++) {
            $results_split = explode("-", $pre_results_split[$i]);
            $oid = $results_split[0];
            $amount = $results_split[2];
            $results = DB::table('rentalmultioptions')->insert(
                    array('RID' => $rid
                        , 'OID' => $oid
                        , 'Avaliable' => $amount
                    )
            );
        }
    }
    function addDistance($DistanceTo,$rid,$cid) {
        $results = DB::table('distance')->insert(
                array('RID' => $rid
                    , 'CID' => $cid
                    , 'Distance' => $DistanceTo
                )
        );
    }

    function addBedroomList($BedroomList, $rid) {
        $pre_results_split = explode(",", $BedroomList);
        for ($i = 0; $i < sizeof($pre_results_split); $i++) {
            $results_split = explode("-", $pre_results_split[$i]);
            $oid = $results_split[0];
            $amount = $results_split[2];
            $results = DB::table('rentalmultioptions')->insert(
                    array('RID' => $rid
                        , 'OID' => $oid
                        , 'Avaliable' => $amount
                    )
            );
        }
    }

    function addImageList($ImageList, $rid) {
        $pre_results_split = explode(",", $ImageList);
        for ($i = 0; $i < sizeof($pre_results_split); $i++) {
            $results = DB::table('rentalpictures')->insert(
                    array('RID' => $rid
                        , 'Picture' => $pre_results_split[$i]
                    )
            );
        }
    }

    function addUtilitiesList($UtilitiesList, $rid) {
        //$pre_results_split = explode(",", $UtilitiesList);
        for ($i = 0; $i < sizeof($UtilitiesList); $i++) {
            $oid = $UtilitiesList[$i];
            $results = DB::table('rentalmultioptions')->insert(
                    array('RID' => $rid
                        , 'OID' => $oid
                        , 'Avaliable' => 1
                    )
            );
        }
    }

    function addWhiteGoodProvideredList($WhiteGoodProvideredList, $rid) {
        //$pre_results_split = explode(",", $UtilitiesList);
        for ($i = 0; $i < sizeof($WhiteGoodProvideredList); $i++) {
            $oid = $WhiteGoodProvideredList[$i];
            $results = DB::table('rentalmultioptions')->insert(
                    array('RID' => $rid
                        , 'OID' => $oid
                        , 'Avaliable' => 1
                    )
            );
        }
    }

    function addPreferredTenantList($PreferredTenantList, $rid) {
        //$pre_results_split = explode(",", $UtilitiesList);
        for ($i = 0; $i < sizeof($PreferredTenantList); $i++) {
            $oid = $PreferredTenantList[$i];
            $results = DB::table('rentalmultioptions')->insert(
                    array('RID' => $rid
                        , 'OID' => $oid
                        , 'Avaliable' => 1
                    )
            );
        }
    }

    function addOtherFacilitiesList($OtherFacilitiesList, $rid) {
        //$pre_results_split = explode(",", $UtilitiesList);
        for ($i = 0; $i < sizeof($OtherFacilitiesList); $i++) {
            $oid = $OtherFacilitiesList[$i];
            $results = DB::table('rentalmultioptions')->insert(
                    array('RID' => $rid
                        , 'OID' => $oid
                        , 'Avaliable' => 1
                    )
            );
        }
    }

    function get_Datetime_Now() {
        $tz_object = new DateTimeZone('Asia/Bangkok');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
    }

    function changeFormatDate($dateInput) {
        $tz_object = new DateTimeZone('Asia/Bangkok');
        if($dateInput<>""){
            $arr = explode('/', $dateInput);
        $newDate = $arr[2] . '-' . $arr[1] . '-' . $arr[0];

        $datetime = new DateTime($newDate);
        $datetime->setTimezone($tz_object);
        return $datetime->format('Y\-m\-d\ h:i:s');
        }else{
            return "";
        }
        
    }

    function uploadFile() {
        $path = "";
        $filename = "";
        if (Input::hasFile('file')) {
            $path = Input::file('file')->getRealPath();
//            $name = Input::file('file')->getClientOriginalName();
//            $extension = Input::file('file')->getClientOriginalExtension();
//            $size = Input::file('file')->getSize();
            $filename = (string) Uuid::generate();
            Input::file('file')->move("../psurentals/psurentals_uploads", $filename);
            //46b65ea0-b331-11e4-8733-5fd1903d8039
            //File::delete('/psurentals_uploads/46b65ea0-b331-11e4-8733-5fd1903d8039');
        }

        return Response::json(array('result' => $filename));
    }

}
