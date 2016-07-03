<?php
/**
 * Created by PhpStorm.
 * User: ke5cr
 * Date: 6/20/2016
 * Time: 8:03 PM
 */

namespace MediaWiki;


class accessControl
{
    public function loadUserGroups($wgGroupPermissions)
    {

        $usrfile = "./includes/user/usrgroups.json";
        #preform inital setup

        if (!file_exists($usrfile)) {


            $usrgroupsfile = fopen($usrfile, "w+");
            $usrgroupsarray = json_encode($wgGroupPermissions, JSON_PRETTY_PRINT);

            $result = fwrite($usrgroupsfile, $usrgroupsarray);

            fclose($usrgroupsfile);
        }
        {

            unset($wgGroupPermissions);
            $usrgroupsarray = file_get_contents($usrfile, "w+");
            $wgGroupPermissions = json_decode($usrgroupsarray, true);

        }
   


        #$usrgroups = fopen("./includes/user/usrgroups.json", "w+");

        $wgGroupPermissions['trusted']['edit'] = "true";
        $wgGroupPermissions['Tori']['edit'] = "true";
        return $wgGroupPermissions;
    }
}