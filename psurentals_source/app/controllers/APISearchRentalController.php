<?php

class APISearchRentalController extends BaseController {

    const DEFAULT_ORDER = '';

    private $config;
    //private $queryString;

    private $searchType;

    public function getSearchType() {
        return (empty($this->searchType)) ? SearchType::None : $this->searchType;
    }

    public function __construct() {
        $this->config = new APIConfigurationController();
        //$this->queryString = new RentalSearchQueryString();
        $this->searchType = SearchType::None;
    }

    //รับข้อมูลจาก QueryString
    private function retriveQueryString() {
        $q = new RentalSearchArgument(); //queryString
        $q->propertyTypeID = Input::get('proptype');
        $q->nearCampusID = Input::get('near');
        $q->feeUnder = Input::get('fee');
        $q->orderBy = Input::get('order');

        return $q;
    }

    //ตรวจสอบว่าจะเป็นการค้นหาแบบใด
    private function selectSearchType($queryStringObj) {
        $q = $queryStringObj;
        $stype = SearchType::None;

        if (is_null($q)) {
            return SearchType::None;
        }

        /* Can do search ? */
        if (($q->propertyTypeID != '') &&
                ($q->nearCampusID != '')) {

            $stype = SearchType::Basic;

            //some code to decide Advance search
        }
        return $stype;
    }

    public function SearchRental() {
        $q = $this->retriveQueryString();
        //throw new Exception(sprintf("QueryString: %s %s %s", $q->propertyTypeID, $q->nearCampusID, $q->feeUnder));

        $this->searchType = $this->selectSearchType($q);
        $searchResults = null;

        switch ($this->searchType) {
            case true: //must do first

            case SearchType::Basic:
                $searchResults = $this->doBasicSearch($q);
                break;
            case SearchType::Advance:
                $searchResults = $this->doAdvanceSearch($q);
                break;
            default:
                $searchResults = $this->doBasicSearch($q); //เอาออกด้วย
                $searchResults = null;
        }
    }

    //For Route
    public function forceBasicSearch($propTypeID, $nearCampus, $rentalFeeUnder, $status) {
        $q = new RentalSearchArgument(); //queryString
        $q->propertyTypeID = $propTypeID;
        $q->nearCampusID = $nearCampus;
        $q->setFeeUnder($rentalFeeUnder);
        $q->orderBy = $this->DEFAULT_ORDER;
        $q->setRentalStatus($status);

        $stype = $this->selectSearchType($q);
        if ($stype === SearchType::None) {
            throw new Exception("Cannot do BasicSearch");
        }

        return doBasicSearch($q);
    }

    private function doBasicSearch(RentalSearchArgument $args) {
        

        /*
         * Main Query
         */
        $query = DB::table('vrental')
                ->join('vrentalcover', 'vrental.RentalID', '=', 'vrentalcover.RID');
        /*
          if ($rentalFeeUnder > 0) {
          $query = $query->Where(function($q) use ($rentalFeeUnder, $propTypeID, $amphoeID, $status) {
          $q->Where('MonthlyRentalFeeFrom', '<=', $rentalFeeUnder)
          ->where('MonthlyRentalFeeTo', '>=', $rentalFeeUnder)
          ->where('PropertyTypeID', '=', $propTypeID)
          ->where('AmphoeID', '=', $amphoeID);
          if ($status != "*") {
          $q->where('Status', '=', $status);
          }
          })

          ->orWhere(function($q) use ($rentalFeeUnder, $propTypeID, $amphoeID, $status) {
          $q->Where('MonthlyRentalFeeFrom', '<=', $rentalFeeUnder)
          ->Where('MonthlyRentalFeeTo', '<=', $rentalFeeUnder)
          ->where('PropertyTypeID', '=', $propTypeID)
          ->where('AmphoeID', '=', $amphoeID);
          if ($status != "*") {
          $q->where('Status', '=', $status);
          }
          });
          }
         */
        //return $query->select("*")->paginate($config->getListPerPage());
        //return $query->select('vrental.*' , 'vrentalcover.Picture')->get();
        //return Response::json(array('result' => $results));
        return $query->select("*");
    }

    private function doAdvanceSearch(RentalSearchArgument $args) {
        return $this->doBasicSearch($args);
    }

    private function createSearchArguments($queryString, $searchType) {
        $q = $queryString;
        
        //$args = ((RentalSearchArgument) $q);
        switch ($searchType) {
            case SearchType::Advance:
            case SearchType::Basic:
                $campusObj = $this->validateNearCampusID($nearCampus);
                $amphoeObj = null;
                if (!is_null($campusObj)) {
                    //$amphoeObj = (new APIAmphoeController)->getAmphoeByCampusID($nearCampus);
                    $amphoeObj = $campusObj->amphoe;
                } else {
                    throw new Exception('Campus not found');
                }

                if (is_null($amphoeObj) /* || count($amphoeObj)<= 0 */) {
                    throw new Exception('Amphoe not found');
                }


                $amphoeID = $amphoeObj->AmphoeID;
                //return $amphoeObj->AmphoeID;
                //return var_dump($amphoeObj->AmphoeID);
                break;
        }

        return true;
    }

    public function getRentalCoverImage($rentalID) {
        $pictureObj = DB::table('rentalpictures')
                ->where('RID', '=', $rentalID)
                ->orderby('IsCover', 'desc')
                ->first();

        if (is_null($pictureObj)) {
            return "#";
        }

        return $pictureObj->Picture;
    }

    private function validateNearCampusID($campusID) {
        if ($campusID === '' || ctype_space($campusID) || !is_numeric($campusID)) {
            $campusID = $config->getDefaultCampusID();
        }

        return (new APICampusController())->getCampusByID($campusID);
    }

}
