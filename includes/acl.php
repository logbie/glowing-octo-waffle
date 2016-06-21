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
        $wgGroupPermissions['blah']['edit'] = "true";
        return $wgGroupPermissions;
    }
}