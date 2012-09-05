<?php

class User_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    $users_id = Zend_Auth::getInstance()->getIdentity()->id;
    $userName = Zend_Auth::getInstance()->getIdentity()->userName;

    $this->view->Message ="Good Day  ". $userName."!";
    

    }


}

