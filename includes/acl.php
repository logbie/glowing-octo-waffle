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
    public function loadUserGroups($wgGroupPermissions){
        $wgGroupPermissions['trusted']['edit'] = "true";
        $wgGroupPermissions['Tori']['edit'] = "true";
        return $wgGroupPermissions;
    }
}