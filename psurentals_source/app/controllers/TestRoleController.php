<?php

class TestRoleController extends BaseController {

    public function isInRoles($username, $role) {
        $config = new ConfigurationAPIController();
        $app_key = $config->getApplicationKey();
        $role_provider_url = $config->getRoleProviderURL();

        $url = $role_provider_url . "/" . $app_key . "/" . $username;
        $content = file_get_contents($url);
        $json = json_decode($content, true);

        $isInRoles = false;
        foreach ($json["result"] as $value) {
            if ($value["role_name_eng"] == $role) {
                $isInRoles = true;
            }
        }
        return Response::json(['result' => $isInRoles]);
    }

}
