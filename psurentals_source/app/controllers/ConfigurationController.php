<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConfigurationController
 *
 * @author Nontapon
 */
class ConfigurationController extends BaseController {
    //put your code here
    public function getDefaultCampusID() {
        $obj = DB::table('configuration')
                ->where('KeyName', '=', 'DefaultCampus')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            App::abort(404, 'Default Campus not found');
        }
        return $obj->KeyValue;
    }
    
    public function getListPerPage() {
        $obj = DB::table('configuration')
                ->where('KeyName', '=', 'ListPerPage')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            App::abort(404, 'Cannot get default of number items on page');
        }
        return $obj->KeyValue;
    }
    
    public function getLimitTitleLength() {
        $obj = DB::table('configuration')
                ->where('KeyName', '=', 'LimitTitleLength')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            return 999;
        }
        return $obj->KeyValue;
    }
    
    public function getLimitDescriptionLength() {
        $obj = DB::table('configuration')
                ->where('KeyName', '=', 'LimitDescriptionLength')
                ->select('KeyValue')->first();
        if (is_null($obj)){
            return 999;
        }
        return $obj->KeyValue;
    }
}
