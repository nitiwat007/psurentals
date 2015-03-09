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
    private $localAuthenProvider;
    private $localRoleProvider;
    private $localProfileProvider;
    private static $instance;

    function __construct() {
        $this->localAuthenProvider = new LocalAuthenProvider();
        $this->localRoleProvider = null;
        $this->localProfileProvider = new LocalProfileProvider();

        //ตัวอย่างการสร้าง Class และเรียกใช้แบบปกติ
        $this->authenProviders = [$this->localAuthenProvider, new PSUPKTAuthenProvider()];

        $this->profileProviders = [$this->localProfileProvider, new PSUPKTProfileProvider()];
        //
        //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
        $this->roleProviders = [$this->localRoleProvider, PSUPKTRoleProvider::getInstance()];

        //เลือกใช้โครงสร้างของข้อมูล
        $this->userInfo = new PSUUserPassport();
    }

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    //This is Main Function
    public function authentication($username, $password) {
        //step#1
        $this->authenticationLogic($username, $password);

        //if ($this->userInfo->isAuthentication) {
        //step#2 - Get User Profile from ProfileProviders
        $this->profileLogic($username, $password);

        //step#3 - Check Exist on Local User //สามารถตรวจสอบได้ทั้งฟังก์ชั่น validateuser และ getUserDetails
        if (!is_null($this->localAuthenProvider)) {
            try {
                if (!$this->validateUser($username, $password, $this->localAuthenProvider)) {
                    $this->addCurrentProfileToLocalUser();
                } else {
                    //do update local user details
                }
            } catch (Exception $ex) {
                
            }
        }
        //step#4
        $this->roleLogic($username);
        //}
        return $this->userInfo;
    }

    private function authenticationLogic($username, $password) {

        $this->userInfo->userName = $username;
        $this->userInfo->isAuthentication = FALSE;

        //วนลูปตรวจสอบกับ Authen Provider ทั้งหมดที่ลงทะเบียนไว้
        foreach ($this->authenProviders as $aprovider) {
            $isValidUser = FALSE;
            if (!is_null($aprovider)) {
                try {
                    $isValidUser = $this->validateUser($username, $password, $aprovider);
                    $this->userInfo->authenticationProviderResult = $isValidUser;
                    $this->userInfo->isAuthentication = $isValidUser;
                    $this->userInfo->authenticationProvider = get_class($aprovider);
                } catch (Exception $ex) {
                    throw new Exception($ex->getMessage());
                }
            }
            if ($isValidUser) {
                break;
            }
        }
    }

    private function profileLogic($username, $password) {
        foreach ($this->profileProviders as $pprovider) {
            $userObj = null;
            if (!is_null($pprovider)) {
                $this->userInfo->profileProvider = get_class($pprovider);
                try {
                    $userObj = $this->getUserDetails($username, $password, $pprovider);
                    $this->userInfo->profileProviderResult = $userObj;
                } catch (Exception $ex) {
                    $this->userInfo->profileProviderResult = $ex->getMessage();
                }
//                } finally {
//                    $this->userInfo->profileProvider = get_class($pprovider);
//                }

                try {
                    if (!is_null($userObj)) {
                        $this->userInfo->profileProviderResult = $userObj;
                        $this->assignUserDetailsFromProfile($userObj);
                        break;
                    }
                } catch (Exception $ex) {
                    $this->userInfo->profileProviderResult = $ex->getMessage();
                }
            }
        }
    }

    private function assignUserDetailsFromProfile($userObj) {
        if (is_a($userObj, 'UserInfo')) {
            $this->userInfo->userName = $userObj->userName;
            $this->userInfo->fullName = $userObj->fullName;
            $this->userInfo->email = $userObj->email;
            $this->userInfo->organization = $userObj->organization;
            $this->userInfo->position = $userObj->position;
            $this->userInfo->mailingAddress = $userObj->mailingAddress;
            $this->userInfo->telephone = $userObj->telephone;
            $this->userInfo->isLocalUser = $userObj->isLocalUser;
        }

        if (is_a($userObj, 'PSUUserPassport')) {
            $this->userInfo->ou = $userObj->ou;
        }
    }

    private function roleLogic($username) {
        //ตัวอย่างการสร้าง Class/Function แบบ Static และวิธีการเรียกใช้
        $roles = [];
        foreach ($this->roleProviders as $rprovider) {
            if (!is_null($rprovider)) {
                try {
                    $result = $this->getUserRoles($username, $rprovider);
                    foreach ($result as $role) {
                        array_push($roles, $role);
                    }
                } catch (Exception $exc) {
                    //do noting
                }
            }
        }
        $this->userInfo->roles = $roles;
    }

    private function addCurrentProfileToLocalUser() {
        $nameArray = explode(' ', $this->userInfo->fullName, 2);
        DB::table('user')->insert([
            'UserId' => $this->userInfo->userName,
            'IsPSUPassport' => ($this->userInfo->profileProviderResult instanceof PSUUserPassport),
            'Password' => '',
            'FirstName' => $nameArray[0],
            'LastName' => $nameArray[0],
            'Organization' => '', //$this->userInfo->organization,
            'Position' => $this->userInfo->position,
            'MailingAddress' => $this->userInfo->mailingAddress,
            'TelephoneNumber' => $this->userInfo->telephone,
            'Email' => $this->userInfo->email
        ]);
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
