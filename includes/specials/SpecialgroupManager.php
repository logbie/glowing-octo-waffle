<?php
/**
 * Created by PhpStorm.
 * User: ke5cr
 * Date: 6/21/2016
 * Time: 10:12 PM
 */

class groupManager extends SpecialPage {

    function __construct() {
        parent::__construct( 'admin-group' );
    }

    function getGroupName() {
        return 'admin';
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