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
      // $users = new User_Model_Employee();
    $userData = new Zend_Session_Namespace('Default');
  
    $this->view->Message ="Good Day  ". $userData->userName."!";
    }


}

