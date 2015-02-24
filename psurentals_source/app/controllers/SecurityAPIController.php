<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
 * SecurityAPIController สำหรับ Authen และ GetRoles
 * ให้เป็นตัวกลางในการจัดการเรื่องความปลอดภัย
 * เราจะกำหนด AuthenProvider และ RoleProvider
 * ไว้ในนั้น เพื่อให้สามารถปรับเปลี่ยนรุ่นของ Providers ให้ง่ายในอนาคต
 * ถ้า Authen ไม่สำเร็จ จะได้รับ error message ทาง UI ต้องดักจับ
 * error และรายงานผล เช่น Login ไม่สำเร็จ
 * ถ้า Authen สำหรับ จะดึงข้อมูล Roles มาด้วย
 */

class SecurityAPIController extends BaseController {

    private $userInfo;
    private $authenProviders;
    private $roleProvider;

    function __construct() {
        //ตัวอย่างการสร้าง Class และเรียกใช้แบบปกติ
        $this->authenProviders = [new PSUPKTAuthenProvider()];
        
        //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
        $this->roleProvider = PSUPKTRoleProvider::getInstance();
    }
    
    //function __construct($username, $password) {
//        //Local Authentication
//        $this->userInfo = null;
//        
//        
//        if (is_null($this->userInfo)) {
//            //Remote Authentication
//            //ตัวอย่างการสร้าง Class แบบปกติ
//            $this->authenProvider = (new PSUPKTAuthenProvider());
//            $this->userInfo = $this->authentication($username, $password, $this->authenProvider);
//        }
//        
//        //Authentication Result, if success get User Roles
//        if (is_null($this->userInfo)) {
//            App::abort(401, 'Authentication Failed');
//        } else {
//            //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
//            $this->roleProvider = PSUPKTRoleProvider::getInstance();
//            //$userInfo->roles = [];
//            $this->userInfo->roles = $this->getUserRoles($username, $this->roleProvider);
//        }
//        
//        //Write UserInfo to Session
//        Session[""] = $this->userInfo;
    //}
    
    public function authentication($username, $password) {
         //Local Authentication
        $this->userInfo = null;
        
        foreach ($this->authenProviders as $aprovider) {
            $this->userInfo = $this->providerAuthentication($username, $password, $aprovider);
            
            if (! is_null($this->userInfo)) {
                break;
            }
        }
        
        if (is_null($this->userInfo)) {
            //Remote Authentication
            //ตัวอย่างการสร้าง Class แบบปกติ
            $this->userInfo = $this->providerAuthentication($username, $password, $this->authenProvider);
        }
        
        if (! is_null($this->userInfo)) {
            //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
            
            //$userInfo->roles = [];
            $this->userInfo->roles = $this->getUserRoles($username, $this->roleProvider);
        }
        
        return $this->userInfo;
    }
    
    private function providerAuthentication($username, $password, iAuthentication $provider) {

        return $provider->ValidateUser($username, $password);
    }

    private function getUserRoles($username, iProvider $provider) {
        return $provider->getRoles($username);
    }

    public function getUserInfo() {
        if (is_null($this->userInfo)) {
            App::abort(404, 'Cannot get User Info.');
        }
        return $this->userInfo;
    }
    
    public function isInRoles($roles) {
        return $this->roleProvider->isInRoles($this->user->roles, $roles);
    }
    

}
