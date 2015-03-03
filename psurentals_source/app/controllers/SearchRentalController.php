<?php

/*
  use Illuminate\Http\Request;
  use Illuminate\Routing\Controller;
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchRentalController
 *
 * @author Nontapon
 * 
 * 
 * ส่วนจัดการการค้นหาข้อมูลห้องพัก แบบ BasicSearch และ AdvanceSearch
 * โดยใช้ข้อมูลจาก QueryString
 * 
 */
class SearchRentalController extends BaseController {

    private $config;
    private $queryString;
    private $propType;
    private $campus;

    public function __construct() {
        $this->config = new APIConfigurationController();
        $this->queryString = new RentalSearchQueryString();
    }

    //เตรียมข้อมูลพื้นฐานต่างๆ หลังจากรับ QueryString แล้ว
    private function relativeLookupData() {
        $q = $this->queryString;

        if ($q->propertyTypeID != '') {
            $this->propType = (new APIPropertyTypeController())
                    ->getPropertyTypeByID($q->propertyTypeID);
                    }

            if ($q->nearCampusID != '') {
                    $this->campus = (new APICampusController())
            ->getCampusByID($q->nearCampusID);
        }
    }


    public function doSearch() {

    $this->relativeLookupData($stype);


    return View::make('result', [
    'rentals' => function() {
    if (is_null($searchResult)) {
    return $searchResult->paginate(1);
}
return $searchResults->paginate($this->config->getListPerPage());
},
 'propertyType' => $this->propType,
 'campus' => $this->campus]);
}

private function doBasicSearch() {
//throw new Exception("Do Basic Search");
$q = $this->queryString;
//throw new Exception(sprintf("QueryString: %s %s %s", $q->propertyTypeID, $q->nearCampusID, $q->feeUnder));
$rc = new APIRentalController();
return $rc->doBasicSearch(
$q->

propertyTypeID, $q->nearCampusID, $q->feeUnder, "rap");
}

private function doAdvanceSearch() {
return $this->doBasicSearch();
}

}

