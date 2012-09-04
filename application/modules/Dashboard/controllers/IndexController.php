<?php

class Dashboard_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */

    }

    public function indexAction()
    {

        // $dd = new Dashboard_Model_Login();
        // print_r($dd->fetchAll()->toArray());
        $this->view->form = new Dashboard_Form_Login();

    }


}

