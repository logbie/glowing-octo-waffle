<?php

/**
 * Created by PhpStorm.
 * User: ke5cr
 * Date: 6/23/2016
 * Time: 9:18 PM
 */


use MediaWiki\accessControl;


class usergroupmanagerpage extends SpecialPage
{

    public function __construct() {
        parent::__construct( 'usergroupmanager' );
    }

    public function getGroupName()
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


        $user = $this->getUser();
        $request = $this->getRequest();
        $out = $this->getOutput();
        $this->showUserGroups();
        $out->getOutput();



        $wikitext = 'Hello world!';
        $output->addWikiText( $wikitext );
    }

    protected function showUserGroups(){
        $this->getOutput()->addHTML(
            xml::openElement(
                'form',
                [
                    'method' => 'post',
                    'action' => $this->getPageTitle()->getLocalURL(),
                    'name' => "showGroups",
                    'id' => 'showGroupsForm'
                ]
            ) .
            xml::closeElement( 'form' )
        );
    }

}