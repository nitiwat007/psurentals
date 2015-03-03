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
        //$q = new RentalSearchQueryString(); 
        $q = new RentalSearchArgument(); //queryString
        $q->setPropertyTypeID(Input::get('proptype'));
        $q->setNearCampusID(Input::get('near'));
        $q->setFeeUnder(Input::get('fee'));
        $q->setOrderBy(Input::get('order'));
        $q->setPageSize(Input::get('pageSize'));
        //throw new Exception(Input::get('pageSize'));
        //throw new Exception($q->getPageSize());
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
        if (($q->getPropertyTypeID() != '') &&
                ($q->getNearCampusID() != '')) {

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
                //throw new Exception("Basic Search");
                $searchResults = $this->doBasicSearch($q);
                
                break;
            case SearchType::Advance:
                //throw new Exception("Advance Search");
                $searchResults = $this->doAdvanceSearch($q);
                break;
            default:
                //$searchResults = $this->doBasicSearch($q); //เอาออกด้วย
                $searchResults = null;
        }
        
        return $searchResults;
    }

    //For Route
    public function forceBasicSearch($propTypeID, $nearCampus, $rentalFeeUnder, $status) {
        $q = new RentalSearchArgument(); //queryString
        $q->setPropertyTypeID($propTypeID);
        $q->setNearCampusID($nearCampus);
        $q->setFeeUnder($rentalFeeUnder);
        $q->setOrderBy(self::DEFAULT_ORDER);
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
        //return $query->where('MonthlyRentalFeeTo','>',99999)->paginate($args->getPageSize());
        
        return $query->paginate($args->getPageSize());
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
