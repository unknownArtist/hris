<?php

class User_Form_Applyleave extends Zend_Form
{

    public function init()
    {
        
        $this->setMethod('post');
        $this->setAction('/User/leave/apply-leave');
             //->setAttrib('id', '');
     $leavetypes = new User_Model_Leavetypes();

     $leave_list = $leavetypes->getLeaveList();
     $leavetype = new Zend_Form_Element_Select('leavetype');
     $leavetype->setLabel('Leave Type:')
               ->addMultiOptions($leave_list);
     $this->addElement($leavetype);
        
     $from = new Zend_Form_Element_Text('from');
     $from->setLabel('from')
          ->setAttribs(array('id'=>'datepicker'));
     $this->addElement($from);
       
     $to = new Zend_Form_Element_Text('to');
     $to->setLabel('to')
        ->setAttribs(array('id'=>'datepicker'));
     $this->addElement($to);

    $reason = new Zend_Form_Element_Textarea('reason');
    $reason->setLabel("Reason")
           ->setAttrib('cols', '40')
           ->setAttrib('rows', '4');
    $this->addElement($reason);
       
    $apply = new Zend_Form_Element_Submit('apply');
    $this->addElement($apply);

    }


}

