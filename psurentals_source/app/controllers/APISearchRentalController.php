<?php

class APISearchRentalController extends BaseController {

    private $config;
    private $searchType;

    public function getSupportedSearchRentalOrder() {
        return [
            "Newest" => SearchRentalOrderBy::Newest,
            "Cheapest" => SearchRentalOrderBy::Cheapest
        ];
        //key => value
    }

    public function getSearchType() {
        return (empty($this->searchType)) ? SearchType::None : $this->searchType;
    }

    public function __construct() {
        $this->config = new APIConfigurationController();
        $this->searchType = SearchType::None;
    }

    //รับข้อมูลจาก QueryString เพียงอย่างเดียว ค่อยไปตรวจสอบที่ฟังก์ชั่นอื่น
    private function retriveQueryString() {
        //$q = new RentalSearchQueryString(); 
        $args = new RentalSearchArgument(); //inherit queryString
        $args->setPropertyTypeID(Input::get('proptype'));
        $args->setNearCampusID(Input::get('near'));
        $args->setFeeUnder(Input::get('fee'));
        //throw new Exception(Input::get('fee') . "   ". $args->getFeeUnder());
        $args->setOrderBy(Input::get('order'));
        $args->setPageSize(Input::get('pageSize'));
        $args->setRentalStatus(Input::get('status'));
        //throw new Exception(Input::get('pageSize'));
        //throw new Exception($q->getPageSize());
        return $args;
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
        $args = $this->retriveQueryString();
        //throw new Exception(sprintf("QueryString: %s %s %s", $q->propertyTypeID, $q->nearCampusID, $q->feeUnder));

        $this->searchType = $this->selectSearchType($args);
        $searchResults = null;

        switch ($this->searchType) {
            case true: //must do first

            case SearchType::Basic:
                //throw new Exception("Basic Search");
                $searchQuery = $this->doBasicSearchQuery($args);

                break;
            case SearchType::Advance:
                //throw new Exception("Advance Search");
                $searchQuery = $this->doAdvanceSearchQuery($args);
                break;
            default:
                //$searchResults = $this->doBasicSearchQuery($q); //เอาออกด้วย
                $searchQuery = null;
        }

        if (is_null($searchQuery))
            return null;

        return $this->orderSearchResult($searchQuery, $args);
    }

    private function orderSearchResult($searchQuery, $args) {
        //throw new Exception($args->getFeeUnder());
        switch ($args->getOrderBy()) {
            case SearchRentalOrderBy::Newest:
                $searchQuery = $searchQuery->orderBy('ModifiedDate', 'desc');
                //throw new Exception("Order by Newest");
                break;
            case SearchRentalOrderBy::Cheapest:
                $searchQuery = $searchQuery->orderBy('MonthlyRentalFeeFrom')->orderBy('ModifiedDate', 'desc');
                //throw new Exception("Order by Cheapest");
                break;
        }
        return $searchQuery->select('vrental.*', 'vrentalcover.Picture as CoverImage')
                        ->paginate($args->getPageSize());
    }

    //For Route //ยังไม่มีการเรียกใช้จาก APIRoute 
    public function forceBasicSearch($propTypeID, $nearCampus, $rentalFeeUnder, $status) {
        $args = new RentalSearchArgument(); //queryString
        $args->setPropertyTypeID($propTypeID);
        $args->setNearCampusID($nearCampus);
        $args->setFeeUnder($rentalFeeUnder);
        $args->setOrderBy($his->config->getDefaultSearchRentalOrder());
        $args->setRentalStatus($status);

        $stype = $this->selectSearchType($args);
        if ($stype === SearchType::None) {
            throw new Exception("Cannot do BasicSearch");
        }

        return $this->orderSearchResult($this->doBasicSearchQuery($args), $args);
    }

    private function doBasicSearchQuery(RentalSearchArgument $args) {

        function queryBuinder($args, &$q) {
            $campus = $args->getCampus();
            $amphoe = (is_null($campus)) ? null : $campus->amphoe;

            if (!is_null($amphoe)) {
                $q = $q->where('AmphoeID', '=', $amphoe->ID);
            }
            if ($args->getRentalStatus() != RentalStatus::All) {
                $q->where('Status', '=', $args->getRentalStatus());
            }
            $err = $args->getPropertyTypeID();
            //if (!empty($err))
            if (!empty($err)) {
                $q->where('PropertyTypeID', '=', $args->getPropertyTypeID());
            }
//            if (!empty($args->getPropertyTypeID())) {
//                $q->where('PropertyTypeID', '=', $args->getPropertyTypeID());
//            }
        }

        $this->validateArguments($args, SearchType::Basic);

        /*
         * Main Query
         */
        $query = DB::table('vrental')
                ->leftjoin('vrentalcover', 'vrental.RentalID', '=', 'vrentalcover.RID');

        if ($args->getFeeUnder() > 0) {
            $query = $query->Where(function($q) use ($args) {
                        queryBuinder($args, $q);
                        $q->Where('MonthlyRentalFeeFrom', '<=', $args->getFeeUnder())
                        ->where('MonthlyRentalFeeTo', '>=', $args->getFeeUnder());
                    })
                    ->orWhere(function($q) use ($args) {
                queryBuinder($args, $q);
                $q->Where('MonthlyRentalFeeFrom', '<=', $args->getFeeUnder())
                ->Where('MonthlyRentalFeeTo', '<=', $args->getFeeUnder());
            });
        }




        //return $query->select("*")->paginate($config->getListPerPage());
        //return $query->select('vrental.*' , 'vrentalcover.Picture')->get();
        //return Response::json(array('result' => $results));
        //return $query->where('MonthlyRentalFeeTo','>',99999)->paginate($args->getPageSize());
        //return $query->paginate($args->getPageSize());
        return $query; //->select('vrental.*', 'vrentalcover.Picture as CoverImage')->paginate($args->getPageSize());
    }

    private function doAdvanceSearchQuery(RentalSearchArgument $args) {

        $this->validateArguments($args, SearchType::Advance);

        return $this->doBasicSearchQuery($args);
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

    private function validateArguments(RentalSearchArgument &$args, $searchType) {
        switch ($searchType) {
            case SearchType::Advance:
            case SearchType::Basic:
                $campusObj = $this->validateNearCampusID($args->getNearCampusID());
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
                //throw new Exception("Order by ". $args->getOrderBy());
                $orderBy = $this->validateOrderBy($args->getOrderBy());
                //throw new Exception("Order by ". $orderBy);
                break;
        }

        return true;
    }

    private function validateNearCampusID($campusID) {
        if ($campusID === '' || ctype_space($campusID) || !is_numeric($campusID)) {
            $campusID = $this->config->getDefaultCampusID();
        }

        return (new APICampusController())->getCampusByID($campusID);
    }

    private function validateOrderBy($value) {
        //throw new Exception($value);
        if ($value === '' || ctype_space($value) || empty($value)) {
            $value = $this->config->getDefaultSearchRentalOrder();
        }
        //throw new Exception($value);
        return in_array($value, $this->getSupportedSearchRentalOrder()) ? $value : '';
    }

}
