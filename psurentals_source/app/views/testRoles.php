<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of testRoles
 *
 * @author Nontapon
 */
/*
 * //Method 1
  $pc = new ProviderAPIController();

  echo $pc->IsInRoles(['admin1', 'user1'], ['user2','admin']);
 * *
 *
 */

//$pc = new PSUPKTProvider();
//echo $pc->IsInRoles(['admin1', 'user2'], ['user2','admin']);


/*
 * //Method 2
  if (PSUPKTProvider::getInstance() instanceof iProvider) {
  //echo ((iProvider)Provider)::IsInRoles(['admin1', 'user2'], ['user2','admin']);
  echo PSUPKTProvider::getRoles('nontapon.r');
  echo "<br />";
  echo PSUPKTProvider::IsInRoles(['admin1', 'user2'], ['user2','admin']);
  }
 */

try {
    /*
     * SecurityAPIController สำหรับ Authen และ GetRoles
     * ให้เป็นตัวกลางในการจัดการเรื่องความปลอดภัย
     * เราจะกำหนด AuthenProvider และ RoleProvider
     * ไว้ในนั้น เพื่อให้สามารถปรับเปลี่ยนรุ่นของ Providers ให้ง่ายในอนาคต
     * ถ้า Authen ไม่สำเร็จ จะได้รับ error message ทาง UI ต้องดักจับ
     * error และรายงานผล เช่น Login ไม่สำเร็จ
     * ถ้า Authen สำหรับ จะดึงข้อมูล Roles มาด้วย
     */


    /*
     * จำลองการ Login สำหรับหรือไม่ ให้แก้ไขที่ AuthenProvider
     */
    $sm = new SecurityAPIController('nontapon.r', 'password');
    echo var_dump($sm->getUserInfo());
    
    //echo ("<p />");
    //echo $sm->getUserInfo()->roles;
    //echo var_dump($sm->getUserInfo()->roles);
    //echo ("Print roles<br />");
    
    //ตัวข้อมูลให้เป็น Array ยังไงอ่ะ ตอนนี้ติด Error ตรงนี้แหละ
    /*foreach ($sm->getUserInfo()->roles  as $key => $value) {
        echo (var_dump($key) . "<br />");
    }
    /*
    foreach ($sm->getUserInfo()->roles as $role) {
        echo ($role->role_name_eng . "<br />");
    }*/
    echo ("<p />");
    //echo var_dump($sm->isInRoles(['admin', 'user1']));
    
} catch (Exception $ex) {
    echo ($ex);
    //echo "Login Failed or Cannot get Roles";
}
