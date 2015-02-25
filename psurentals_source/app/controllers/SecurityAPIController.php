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
    private $roleProviders;
    private $profileProviders;
    private static $instance;

    function __construct() {
        //ตัวอย่างการสร้าง Class และเรียกใช้แบบปกติ
        $this->authenProviders = [new LocalAuthenProvider(), new PSUPKTAuthenProvider()]; //new LocalAuthenProvider(), 

        $this->profileProviders = [new PSUPKTProfileProvider()]; //new LocalProfileProvider(), 

        //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
        $this->roleProviders = [PSUPKTRoleProvider::getInstance()];
        
        //เลือกใช้โครงสร้างของข้อมูล
        $this->userInfo = new PSUUserPassport();
       
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
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
        
        //return md5($password);
        $this->authenticationLogic($username, $password);
        
        if ($this->userInfo->isAuthentication) {
            $this->profileLogic($username, $password);
            $this->roleLogic($username);
        }
        return $this->userInfo;
    }

    private function authenticationLogic($username, $password) {
        
        $this->userInfo->userName = $username;
        $this->userInfo->isAuthentication = FALSE;

        //วนลูปตรวจสอบกับ Authen Provider ทั้งหมดที่ลงทะเบียนไว้
        foreach ($this->authenProviders as $aprovider) {
            try {
                $result = $this->validateUser($username, $password, $aprovider);
                $this->userInfo->authenticationProviderResult = $result;
                if ($result) {
                    $this->userInfo->isAuthentication = TRUE;
                    $this->userInfo->authenticationProvider = get_class($aprovider);
                    break;
                }
            } catch (Exception $ex) {
                //do noting
                //echo $ex->getTraceAsString();
                $this->userInfo->successAuthenticationProvider = 'Cannot Access Provider';
            }
        }
        //return Response::json(['userInfo' => $this->userInfo]);
    }
   
    private function profileLogic($username, $password) {
        foreach ($this->profileProviders as $pprovider) {
            try {
                $result = $this->getUserDetails($username, $password, $pprovider);
                $this->userInfo->profileProvider = get_class($pprovider);
                $this->userInfo->profileProviderResult = $result;
            } catch (Exception $ex) {
                $this->userInfo->profileProvider = get_class($pprovider);
                $this->userInfo->profileProviderResult =  'Error from Provider';
            }
            
            try {
                if (is_null($result)) {
                    
                    $this->userInfo->profileProviderResult = $result;
                    
                    if (is_a($result, 'UserInfo')) {
                        $this->userInfo->userName = $result->userName;
                        $this->userInfo->fullName = $result->fullName;
                        $this->userInfo->email = $result->email;
                        $this->userInfo->organization = $result->organization;
                        $this->userInfo->position = $result->position;
                        $this->userInfo->mailingAddress = $result->mailingAddress;
                        $this->userInfo->telephone = $result->telephone;
                        $this->userInfo->isLocalUser = $result->isLocalUser;
                    }
                    
                    if (is_a($result, 'PSUUserPassport')) {
                        $this->userInfo->ou = $result->ou;
                    }
                    break;
                }
            } catch (Exception $ex) {
                //echo $ex->getTraceAsString();
                $this->userInfo->profileProviderResult = 'Data Error';
            }
        }
    }

    private function roleLogic($username) {
        //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
        $roles = [];
        foreach ($this->roleProviders as $rprovider) {
            try {
                $result = $this->getUserRoles($username, $rprovider);
                foreach ($result as $role) {
                    array_push($roles, $role);
                }
            } catch (Exception $exc) {
                //do noting
            }
        }
        $this->userInfo->roles = $roles;
    }
    
    private function addLocalUser() {
        //DB::table('user')->in
    }

    public function authenticationJSON($username, $password) {
        return Response::json(['userInfo' => $this->authentication($username, $password)]);
    }

    private function validateUser($username, $password, iAuthentication $provider) {
        return $provider->ValidateUser($username, $password);
    }

    private function getUserDetails($username, $password, iProfileProvider $provider) {
        return $provider->getUserDetails($username, $password);
    }

    private function getUserRoles($username, iRoleProvider $provider) {
        return $provider->getRoles($username);
    }

    public function getUserInfo() {
        if (is_null($this->userInfo)) {
            App::abort(404, 'Cannot get User Info.');
        }
        return $this->userInfo;
    }

    public static function isInRoles($userInfo, $rolesNameEN) {
        $result = FALSE;
        foreach (SecurityAPIController::getInstance()->roleProviders as $rprovider) {
            $result = $rprovider->isInRoles($userInfo->name, $rolesNameEN);
            if ($result) {
                break;
            }
        }
        return $result;
    }

    public function isInRolesJSON($userName, $rolesNameEN) {
        $userInfo = new UserInfo();
        $userInfo->name = $userName;
        return Response::json(['IsInRoles' => SecurityAPIController::isInRoles($userInfo, $rolesNameEN)]);
    }
}