<?php

class Admin_Form_RejectReason extends Zend_Form
{
  	public function init()
    {
    
    	//$this->setAction('Admin/hris/leave-rejected/ID/' );
        //$this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
    

        $statusReason = new Zend_Form_Element_Text('statusReason');
        $statusReason->setLabel('Reason');

        $submit  = new Zend_Form_Element_Submit('submit');

        $this->addElements(array($statusReason, $submit));

    }
    
}