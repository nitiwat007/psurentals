<?php

class RentalsControllerNR extends BaseController {

    public function basicSearchRentals($propTypeID, $nearCampus, $rentalFeeUnder, $status) {
        $config = new ConfigurationAPIController();

       

//        if ($rentalFeeUnder === '' || ctype_space($rentalFeeUnder) ||
//                $propTypeID === '' || ctype_space($propTypeID)) {
//            throw new Exception('Invalid Arguments');
//            //App::abort(404, '');
//        } 
        
        //ตรวจสอบ Property Type ข้อมูลต้องถูกต้อง
        if ($propTypeID == '' || ctype_space($propTypeID)) {
            throw new Exception('Invalid Arguments (Property Type)');
            //App::abort(404, '');
        } 
        
        //return $rentalFeeUnder;
        //
        /*
         * นำข้อมูล NearCampus ไปหา อำเภอ เพื่อหา ที่พักในอำเภอ นั้นๆ
         * ถ้าไม่พบก็จะหาข้อมูลในทุกอำเภอ
         */
        
        $campusObj = $this->validateNearCampusID($nearCampus);
        $amphoeObj = null;
        if (!is_null($campusObj)) {
             $amphoeObj = (new AmphoeAPIController)->getAmphoeByCampusID($nearCampus);
        } else
        {
            throw new Exception('Campus not found');
        }
        
        if (is_null($amphoeObj) /* || count($amphoeObj)<= 0 */) {
            throw new Exception('Amphoe not found');
        }

      
        $amphoeID = $amphoeObj->AmphoeID;
        //return $amphoeObj->AmphoeID;
        //return var_dump($amphoeObj->AmphoeID);

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
    
    private function validateNearCampusID ($campusID) {
        if ($campusID === '' || ctype_space($campusID) || !is_numeric($campusID)) {
            $campusID = $config->getDefaultCampusID();
        }
        
        return (new CampusAPIController())->getCampusByID($campusID);
    }

}
