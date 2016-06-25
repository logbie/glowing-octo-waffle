<?php

/**
 * Created by PhpStorm.
 * User: ke5cr
 * Date: 6/23/2016
 * Time: 9:18 PM
 */
class usergroupmanagerpage extends SpecialPage
{

    function __construct() {
        parent::__construct( 'usergroupmanager' );
    }

    function getGroupName()
    {
        return "admin";
    }

    function execute( $par ) {
        $request = $this->getRequest();
        $output = $this->getOutput();
        $this->setHeaders();

        # Get request data from, e.g.
        $param = $request->getText( 'param' );

        # Do stuff
        # ...
        $wikitext = 'Hello world!';
        $output->addWikiText( $wikitext );
    }
}