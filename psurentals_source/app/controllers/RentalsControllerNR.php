<?php

class RentalsControllerNR extends BaseController {


    private function getApprovedRentals($filter, $orderby, $orderdirection) {
		
        $whereStatement = "Status <> 'rap'";
        if (!($filter == '' || ctype_space($filter)))
            $whereStatement = $whereStatement . " and " . $filter;
        
        $results = DB::select("select * from vrental 
                where ? order by ? ?", array($filter,  $orderby, $orderdirection));
                
        return Response::json(array('result' => $results));
    }

    public function basicSearchRentals($propertyTypeID, $nearCampus, $rentalFeeUnder) {
        
        if ($nearCampus == '' || ctype_space($nearCampus) ||
            $rentalFeeUnder == '' || ctype_space($rentalFeeUnder) ||
            $propertyTypeID == '' || ctype_space($propertyTypeID))
        {
               App::abort(404, 'Invalid Arguments');
        }
    
        $amphoeObj = DB::table('vcampus')
                                    ->where('id','=',$nearCampus)
                                    ->select('AmphoeID')
                                    ->first();
        
        if (is_null($amphoeObj) /*|| count($amphoeObj)<= 0*/) 
            App::abort(404, 'Campus not found');
        
        $amphoeID = $amphoeObj->AmphoeID;
        //return $amphoeObj->AmphoeID;
        //return var_dump($amphoeObj->AmphoeID);
       
        $results = DB::table('vrental')
                            ->where('PropertyTypeID', '=', $propertyTypeID)
                            ->where('AmphoeID','=', $amphoeID)
                            ->Where('MonthlyRentalFeeFrom', '<=',$rentalFeeUnder)
                            ->Where('MonthlyRentalFeeTo', '>=',$rentalFeeUnder)
                            ->get();
        return  $results; 
        //return Response::json(array('result' => $results));
    }
}

?>
