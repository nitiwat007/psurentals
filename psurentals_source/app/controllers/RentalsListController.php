<?php

class RentalsListController extends BaseController {

    public function getRentals() {
        $results = DB::select("select RentalID,Title,CreatedDate from rental where Status<>'rdl' order by CreatedDate desc");
        return Response::json(array('result' => $results));
    }
    
    public function getRentalDetail($RentalID) {
        $results = DB::select("select * from vrental, user where vrental.ProviderID=user.UserID and RentalID='$RentalID'");
        $distance = DB::select("select * from vdistance where RentalID='$RentalID'");
        $picture = DB::select("select * from rentalpictures where RID='$RentalID'");
        $WhiteGood = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=2");
        $Utilities = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=1");
        $PreferTanant = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=4");
        $Room = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=10");
        $Bedroom = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=8");
        return Response::json(array('result' => $results, 'distance' => $distance, 'picture' => $picture, 'whitegood' => $WhiteGood, 'utilities' => $Utilities, 'prefertanant' => $PreferTanant, 'room' => $Room, 'bedroom' => $Bedroom));
    }
    
    public function getRentalPage($username) {
        $APIConfigurationController=new APIConfigurationController();
        $getListPerPage=$APIConfigurationController->getListPerPage();
        $titleLenght = $APIConfigurationController->getLimitTitleLength();
        $descLenght = $APIConfigurationController->getLimitDescriptionLength();
        $results = DB::table('vrental')->join('vrentalcover', 'vrental.RentalID', '=', 'vrentalcover.RID')->where('Status','<>','rdl')->where('CreatedBy','=',$username)->orderBy('ModifiedDate')->paginate($getListPerPage);       
        $results["titleLenght"]=$titleLenght;
        $results["descLenght"]=$descLenght;
        return $results;
    } 
    public function getRentalAll() {
        $APIConfigurationController=new APIConfigurationController();
        $getListPerPage=$APIConfigurationController->getListPerPage();
        $titleLenght = $APIConfigurationController->getLimitTitleLength();
        $descLenght = $APIConfigurationController->getLimitDescriptionLength();
        $results = DB::table('vrental')->join('vrentalcover', 'vrental.RentalID', '=', 'vrentalcover.RID')->orderBy('ModifiedDate')->paginate($getListPerPage);       
        $results["titleLenght"]=$titleLenght;
        $results["descLenght"]=$descLenght;
        return $results;
    } 

    public function getRentalByStatus($status) {
        $APIConfigurationController=new APIConfigurationController();
        $getListPerPage=$APIConfigurationController->getListPerPage();
        $titleLenght = $APIConfigurationController->getLimitTitleLength();
        $descLenght = $APIConfigurationController->getLimitDescriptionLength();
        $results = DB::table('vrental')->join('vrentalcover', 'vrental.RentalID', '=', 'vrentalcover.RID')->where('Status','=',$status)->orderBy('ModifiedDate')->paginate($getListPerPage);       
        $results["titleLenght"]=$titleLenght;
        $results["descLenght"]=$descLenght;
        return $results;
    }
    
    public function deleteRentals($RentalID) {
        $results = DB::update("update rental set Status='rdl' where RentalID='$RentalID'");
        return Response::json(array('result' => $results));
    }

    public function getRentalDataEdit($RentalID) {
        $results = DB::select("select * from vrental vr, vproperty vpt where vr.PropertyID=vpt.ID and vr.RentalID='$RentalID'");
        $distance = DB::select("select * from vdistance where rentalID='$RentalID'");
        $rooms = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=10");
        $bedrooms = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=8");
        $Utilities = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=1");
        $WhiteGood = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=2");
        $Facility = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=3");
        $PreferredTenant = DB::select("select * from vrentalmultioptions where RID='$RentalID' and OptionTypeID=4");
        $Picture = DB::select("select * from rentalpictures where RID='$RentalID'");
        $Campus = DB::select("select vc.ID as CampusID,vc.ShortNameEN,vc.ShortNameTH, vc.ProvinceCode as ProvinceCode from vrental vr, vcampus vc where vr.AmphoeID=vc.AmphoeID and vr.RentalID='$RentalID'");
        return Response::json(array('result' => $results, 'distance' => $distance
                    , 'rooms' => $rooms, 'bedrooms' => $bedrooms
                    , 'utilities' => $Utilities, 'whitegood' => $WhiteGood
                    , 'facility' => $Facility, 'preferredtenant' => $PreferredTenant, 'picture' => $Picture, 'campus' => $Campus));
    }

    public function updateRental($RentalID) {

        $provide_id = Input::get('ddlProvider');
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
        $Status = Input::get('ddlStatus'); //Waiting for Approve
        if($Status==null){
            $Status=Input::get('txtStatus');
        }
        $RoomList = Input::get('txtRoomsList');
        $BedroomList = Input::get('txtBedroomsList');
        $ImageList = Input::get('txtImageList');
        $DistanceTo = Input::get('txtDistanceTo');

        $Utilities = Input::get('chkUtilities');
        $WhiteGoodProvidered = Input::get('chkWhiteGoodsProvider');
        $OtherFacilities = Input::get('chkOtherFacilities');
        $PreferredTenant = Input::get('chkPreferredTenant');

        $results = DB::table('rental') ->where('RentalID', $RentalID)->update(
                array('ProviderID' => $provide_id
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
        
//        $results = DB::update("update rental set "
//                        . "ProviderID='$provide_id' "
//                        . ",ModifiedBy='$ModifiedBy' "
//                        . ",ModifiedDate='$ModifiedDate' "
//                        . ",Title='$Title' "
//                        . ",Details='$Details' "
//                        . ",PropertyID='$PropertyID' "
//                        . ",Address='$Address' "
//                        . ",AmphoeID='$AmphoeID' "
//                        . ",AvailableDate='$AvailableDate' "
//                        . ",MonthlyRentalFeeFrom='$MonthlyRentalFeeFrom' "
//                        . ",MonthlyRentalFeeTo='$MonthlyRentalFeeTo' "
//                        . ",LeaseFrom='$LeaseFrom' "
//                        . ",LeaseTo='$LeaseTo' "
//                        . ",LeaseEndDate='$LeaseEndDate' "
//                        . ",HasLeaseAgreement='$HasLeaseAgreement' "
//                        . ",BondFrom='$BondFrom' "
//                        . ",BondTo='$BondTo' "
//                        . ",SecurityBondFrom='$SecurityBondFrom' "
//                        . ",SecurityBondTo='$SecurityBondTo' "
//                        . ",CanDailyRental='$CanDailyRental' "
//                        . ",DailyRentalFeeFrom='$DailyRentalFeeFrom' "
//                        . ",DailyRentalFeeTo='$DailyRentalFeeTo' "
//                        . ",CurrentOccupant='$CurrentOccupant' "
//                        . ",Vacancy='$Vacancy' "
//                        . ",BedroomFurnishing='$BedroomFurnishing' "
//                        . ",NumOfBathrooms='$NumOfBathrooms' "
//                        . ",MaleTenant='$MaleTenant' "
//                        . ",FemaleTenant='$FemaleTenant' "
//                        . ",PreferGender='$PreferGender' "
//                        . ",Smoking='$Smoking' "
//                        . ",Pet='$Pet' "
//                        . ",URL='$URL' "
//                        . ",WaterRate='$WaterRate' "
//                        . ",PowerRate='$PowerRate' "
//                        . ",Status='$Status' "
//                        . "where RentalID='$RentalID'");

        $this->updateRoomList($RoomList, $RentalID);
        $this->updateBedroomList($BedroomList, $RentalID);
        $this->updateUtilitiesList($Utilities, $RentalID);
        $this->updateOtherFacilitiesList($OtherFacilities, $RentalID);
        $this->updateWhiteGoodProvideredList($WhiteGoodProvidered, $RentalID);
        $this->updatePreferredTenantList($PreferredTenant, $RentalID);
        $this->updateImageList($ImageList, $RentalID);
        $this->updateDistance($DistanceTo,$RentalID,$this->getCampusByAmphoe($AmphoeID));

        $this->updateRoomList($RoomList, $RentalID);
        $this->updateBedroomList($BedroomList, $RentalID);
        return Response::json(array('result' => $results));
    }

    function getCampusByAmphoe($AmphoeID) {
        $results = DB::select("select * from vcampus where AmphoeID='$AmphoeID'");
        return $results[0]->ID;
    }

    function updateDistance($DistanceTo, $rid, $cid) {

        $resultsDelete = DB::delete("delete from distance where RID='$rid' and CID='$cid'");
        $results = DB::table('distance')->insert(
                array('RID' => $rid
                    , 'CID' => $cid
                    , 'Distance' => $DistanceTo
                )
        );
    }

    function updateRoomList($RoomList, $rid) {

        $roomsResult = $this->getRooms();
        for ($i = 0; $i < sizeof($roomsResult); $i++) {
            $roomsID = $roomsResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalmultioptions where RID='$rid' and OID='$roomsID'");
        }
        if ($RoomList != "") {
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
    }

    function updateBedroomList($BedroomList, $rid) {

        $bedroomsResult = $this->getBedroomsAvailable();
        for ($i = 0; $i < sizeof($bedroomsResult); $i++) {
            $bedroomsID = $bedroomsResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalmultioptions where RID='$rid' and OID='$bedroomsID'");
        }

        if ($BedroomList != "") {
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
    }

    function updateUtilitiesList($UtilitiesList, $rid) {

        $UtilitiesListResult = $this->getUtilityIncludedInRent();
        for ($i = 0; $i < sizeof($UtilitiesListResult); $i++) {
            $UtilitiesListID = $UtilitiesListResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalmultioptions where RID='$rid' and OID='$UtilitiesListID'");
        }
        if ($UtilitiesList != "") {
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
    }

    function updateWhiteGoodProvideredList($WhiteGoodProvideredList, $rid) {

        $WhiteGoodProvideredListResult = $this->getWhiteGoogdsProvided();
        for ($i = 0; $i < sizeof($WhiteGoodProvideredListResult); $i++) {
            $WhiteGoodProvideredListID = $WhiteGoodProvideredListResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalmultioptions where RID='$rid' and OID='$WhiteGoodProvideredListID'");
        }

        if ($WhiteGoodProvideredList != "") {
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
    }

    function updateOtherFacilitiesList($OtherFacilitiesList, $rid) {

        $OtherFacilitiesListResult = $this->getOtherFacilities();
        for ($i = 0; $i < sizeof($OtherFacilitiesListResult); $i++) {
            $OtherFacilitiesListID = $OtherFacilitiesListResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalmultioptions where RID='$rid' and OID='$OtherFacilitiesListID'");
        }

        if ($OtherFacilitiesList != "") {
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
    }

    function updatePreferredTenantList($PreferredTenantList, $rid) {

        $PreferredTenantListResult = $this->getPerferredTenant();
        for ($i = 0; $i < sizeof($PreferredTenantListResult); $i++) {
            $PreferredTenantListID = $PreferredTenantListResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalmultioptions where RID='$rid' and OID='$PreferredTenantListID'");
        }

        if ($PreferredTenantList != "") {
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
    }

    function getRooms() {
        $results = DB::select("select * from vroom");
        return $results;
    }

    public function getBedroomsAvailable() {
        $results = DB::select("select * from vbedroom");
        return $results;
    }

    public function getUtilityIncludedInRent() {
        $results = DB::select("select * from vutility");
        return $results;
    }

    public function getWhiteGoogdsProvided() {
        $results = DB::select("select * from vwhitegoods");
        return $results;
    }

    public function getOtherFacilities() {
        $results = DB::select("select * from vfacility");
        return $results;
    }

    public function getPerferredTenant() {
        $results = DB::select("select * from vtenant");
        return $results;
    }

    public function getRentalPicture($rid) {
        $results = DB::select("select * from rentalpictures where RID='$rid'");
        return $results;
    }

    function updateImageList($ImageList, $rid) {

        $ImageListResult = $this->getRentalPicture($rid);
        for ($i = 0; $i < sizeof($ImageListResult); $i++) {
            //$$ImageListResultID = $ImageListResult[$i]->ID;
            $resultsDelete = DB::delete("delete from rentalpictures where RID='$rid'");
        }

        $pre_results_split = explode(",", $ImageList);
        for ($i = 0; $i < sizeof($pre_results_split); $i++) {
            $results = DB::table('rentalpictures')->insert(
                    array('RID' => $rid
                        , 'Picture' => $pre_results_split[$i]
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

    public function test() {

        $test = Input::get('test');
        return Response::json(array('result' => $test));
    }

}
