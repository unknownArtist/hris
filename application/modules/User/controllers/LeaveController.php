<?php

class User_LeaveController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $form = new User_Form_Applyleave();
       $this->view->form = $form;
      //  $users_id = Zend_Auth::getInstance()->getIdentity()->id;

      //   $emp = new User_Model_Employee();
      //   $where = "users_id =". $users_id;
      //   $emp_data = $emp->fetchRow($where)->toArray(); 
      //   $emp_ID = $emp_data['ID'];

      //   if ($this->getRequest()->isPost() && $this->view->form->isValid($this->_getAllParams()))
      //  {
      //  		  $leavetype = $form->getValue('leavetype');
      //       $from = $form->getValue('from');
      //       $to = $form->getValue('to');
      //       $reason = $form->getValue('reason');

      //      $l_apply = new User_Model_Employeeleaves();
      //      $where = "employee_ID=". $emp_ID;
      //      $data = array(
      //             "leavetypes_ID" => $leavetype,
      //   					"from" => $from,
      //   					"to" => $to,
      //   					"reason" => $reason,
      //   					"employee_ID" => $emp_ID
      //            	);
      //       $l_apply->insert($data,$where);

      // }

       $form2 = new User_Form_Leavehistory();
       $this->view->form2 = $form2;

       $status = $form2->getValue('f_data');
      if($status == null)
       {
        $h_leave = new User_Model_Employeeleaves();
        $hl_data = $h_leave->fetchAll($where = null,'id DESC')->toArray(); 
        $this->view->hl_data = $hl_data;
       }
  

if ($this->getRequest()->isPost() && $this->view->form2->isValid($this->_getAllParams()))
       {
        $f_option = $form2->getValue('filter');
        if($f_option == "Status")
        {
        $status = $form2->getValue('f_data');
    
      if($status == 2)//pending
        { 
      $h_leave = new User_Model_Employeeleaves();
      $hl_data = $h_leave->fetchAll($where = "status= 1",'id DESC')->toArray(); 
      $this->view->hl_data = $hl_data;
        }

    if($status == 3)//approved
      { 
        $h_leave = new User_Model_Employeeleaves();
        $hl_data = $h_leave->fetchAll($where = "status = 2" ,'id DESC')->toArray(); 
        $this->view->hl_data = $hl_data;
      }
 
    if($status == 4)//denied
      { 
        $h_leave = new User_Model_Employeeleaves();
        $hl_data = $h_leave->fetchAll($where = "status = 3",'id DESC')->toArray(); 
        $this->view->hl_data = $hl_data;
      }

    if($status == 1)
    {
     $h_leave = new User_Model_Employeeleaves();
     $hl_data = $h_leave->fetchAll($where = null,'id DESC')->toArray(); 
     $this->view->hl_data = $hl_data;
     }
 }

 else{
   $start = $form2->getValue('start');
   $end = $form->getValue('end');
  
  // $where = "'from=$start' and 'to=$end'";
  // $h_leave = new User_Model_Employeeleaves();
  // $hl_data = $h_leave->fetchAll($where);
  // $this->view->hl_data = $hl_data; 

       }
     }

    }

public function applyLeaveAction()
{
    $form = new User_Form_Applyleave();
    $this->view->form = $form;

       $users_id = Zend_Auth::getInstance()->getIdentity()->id;

        $emp = new User_Model_Employee();
        $where = "users_id =". $users_id;
        $emp_data = $emp->fetchRow($where)->toArray(); 
        $emp_ID = $emp_data['ID'];

        if ($this->getRequest()->isPost() && $this->view->form->isValid($this->_getAllParams()))
       {
            $leavetype = $form->getValue('leavetype');
            $from = $form->getValue('from');
            $to = $form->getValue('to');
            $reason = $form->getValue('reason');

           $l_apply = new User_Model_Employeeleaves();
           $where = "employee_ID=". $emp_ID;
           $data = array(
                  "leavetypes_ID" => $leavetype,
                  "from" => $from,
                  "to" => $to,
                  "reason" => $reason,
                  "employee_ID" => $emp_ID
                  );
            $l_apply->insert($data,$where);

      }
}

}

