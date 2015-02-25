<?php

class RentalsControllerNR extends BaseController {

//    private function getApprovedRentals($filter, $orderby, $orderdirection) {
//        $whereStatement = "Status = 'rap'";
//        if (!($filter == '' || ctype_space($filter))) {
//            $whereStatement = $whereStatement . " and " . $filter;
//        }
//
//        $results = DB::select("select * from vrental 
//                where ? order by ? ?", array($filter, $orderby, $orderdirection));
//
//        return Response::json(array('result' => $results));
//    }

    public function basicSearchRentals($propTypeID, $nearCampus, $rentalFeeUnder, $status) {
        $config = new ConfigurationAPIController();

        if ($nearCampus === '' || ctype_space($nearCampus) || !is_numeric($nearCampus)) {
            $nearCampus = $config->getDefaultCampusID();
        }

        if ($rentalFeeUnder === '' || ctype_space($rentalFeeUnder) ||
                $propTypeID === '' || ctype_space($propTypeID)) {
            App::abort(404, 'Invalid Arguments');
        }

        $amphoeObj = DB::table('vcampus')
                        ->where('id', '=', $nearCampus)
                        ->select('AmphoeID')->first();

        if (is_null($amphoeObj) /* || count($amphoeObj)<= 0 */) {
            App::abort(404, 'Campus not found');
        }

        $amphoeID = $amphoeObj->AmphoeID;
        //return $amphoeObj->AmphoeID;
        //return var_dump($amphoeObj->AmphoeID);

        $query = DB::table('vrental')
                ->join('vrentalcover', 'vrental.RentalID', '=', 'vrentalcover.RID');

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
        
        return $query->select("*")->paginate($config->getListPerPage());
        //return $query->select('vrental.*' , 'vrentalcover.Picture')->get();
        //return Response::json(array('result' => $results));
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

}
