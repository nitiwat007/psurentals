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
        //$this->queryString = new RentalSearchQueryString();
    }

    //เตรียมข้อมูลพื้นฐานต่างๆ หลังจากรับ QueryString แล้ว
    private function relativeLookupData() {
        $this->propType = (new APIPropertyTypeController())
                ->getPropertyTypeByID(Input::get('proptype'));
        $this->campus = (new APICampusController())
                ->getCampusByID(Input::get('near'));
    }

    public function doSearch() {

        $this->relativeLookupData();
        $searchResult = (new APISearchRentalController())->SearchRental();
        //return $searchResult;
        //return json_encode($searchResult);
        //return $searchResult->toJson();
        //return Response::json(array('rentals' =>$searchResult));
        /*
          return [
          'rentals' => $searchResult->toJson(),
          'propertyType' => $this->propType,
          'campus' => $this->campus];
         */
        return View::make('result', [
                    'rentals' => $searchResult//->toJson()
//                        if (is_null($searchResult)) {
//                            //throw new Exception("Is Null")
//                            return $searchResult->paginate(0); //ดูเหมือนไม่มีประโยชน์
//                        } else {
//                            return $searchResults->paginate($this->config->getListPerPage());
//                        }
                    ,
                    'propertyType' => $this->propType,
                    'campus' => $this->campus]);
    }

}
