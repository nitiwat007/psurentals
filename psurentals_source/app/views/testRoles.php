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
$pc = new ProviderAPIController();

echo $pc->IsInRoles(['admin1', 'user1'], ['user2','admin']);
 * *
 *
 */

$pc = new PSUPKTProvider();
echo $pc->IsInRoles(['admin1', 'user2'], ['user2','admin']);