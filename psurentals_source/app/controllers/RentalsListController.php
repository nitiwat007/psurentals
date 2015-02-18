<?php

class RentalsListController extends BaseController {

    public function getRentals() {
        $results = DB::select("select RentalID,Title,CreatedDate from rental where Status<>'rdl' order by CreatedDate desc");
        return Response::json(array('result' => $results));
    }
    
    public function deleteRentals($RentalID) {
        $results = DB::update("update rental set Status='rdl' where RentalID='$RentalID'");
        return Response::json(array('result' => $results));
    }
    
    public function getRentalDataEdit($RentalID) {
        $results = DB::select("select * from vrental vr, vproperty vpt where vr.PropertyID=vpt.ID and vr.RentalID='$RentalID'");
        return Response::json(array('result' => $results));
    }
    
}
