<?php

class RentalsControllerNR extends BaseController {

     public function Index() {
         
        $ppttype = Input::get('ppttype');
        $near = Input::get('near');
        $fee = Input::get('fee');
        
        //return sprintf("%s %s %s", $ppttype, $near, $fee);
               
        $searchResults = $this->basicSearchRentals($ppttype, $near, $fee);
        
        //return $searchResults;
        
        return View::make('result', ['rentals' => $searchResults, 'count' => count($searchResults)]);
    }
    

    private function getApprovedRentals($filter, $orderby, $orderdirection) {
		
        $whereStatement = "Status <> 'rap'";
        if (!($filter == '' || ctype_space($filter)))
        {
            $whereStatement = $whereStatement . " and " . $filter;
        }
        
        $results = DB::select("select * from vrental 
                where ? order by ? ?", array($filter,  $orderby, $orderdirection));
                
        return Response::json(array('result' => $results));
    }

    public function basicSearchRentals($propTypeID, $nearCampus, $rentalFeeUnder) {
        if ($nearCampus === '' || ctype_space($nearCampus) ||
            $rentalFeeUnder === '' || ctype_space($rentalFeeUnder) ||
            $propTypeID === '' || ctype_space($propTypeID))
        {
               App::abort(404, 'Invalid Arguments');
        }
    
        $amphoeObj = DB::table('vcampus')
                                    ->where('id','=',$nearCampus)
                                    ->select('AmphoeID')
                                    ->first();
        
        if (is_null($amphoeObj) /*|| count($amphoeObj)<= 0*/) {
            App::abort(404, 'Campus not found');
        }
        
        $amphoeID = $amphoeObj->AmphoeID;
        //return $amphoeObj->AmphoeID;
        //return var_dump($amphoeObj->AmphoeID);
       
        $results = DB::table('vrental')
                            ->where('PropertyTypeID', '=', $propTypeID)
                            ->where('AmphoeID','=', $amphoeID)
                            ->Where('MonthlyRentalFeeFrom', '<=',$rentalFeeUnder)
                            ->Where('MonthlyRentalFeeTo', '>=',$rentalFeeUnder)
                            ->get();
        /* @var $results type */
        return  $results; 
        //return Response::json(array('result' => $results));
    }
}
