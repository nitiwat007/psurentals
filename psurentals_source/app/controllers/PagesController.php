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
 * Description of PageController
 *
 * @author Nontapon
 */
class PagesController extends BaseController {
    //put your code here
    
     public function searchRentalResults() { 
         /*Main Argument for Basic Search*/
        $ppttype = Input::get('ppttype');
        $near = Input::get('near');
        $fee = Input::get('fee');
        if ($fee === '') {
            $fee = 0;
        }
        //return sprintf("%s %s %s", $ppttype, $near, $fee);
        
        /*Other Arguments for Advance Search*/
         
         $rc = new RentalsControllerNR();
        /*Checking Request for select Search Method*/
        if (count(Input::all() <= 3))
        {
            //do basic search
            $searchResults = $rc->basicSearchRentals($ppttype, $near, $fee);
        } else
        {
            //do advance search
            //$searchResults = $rc->searchRentals(Request::all());
        }

        //return $searchResults;
        return View::make('result', ['rentals' => $searchResults, 'count' => count($searchResults), 'configs' => DB::table('configuration')->get()]);
    }
}