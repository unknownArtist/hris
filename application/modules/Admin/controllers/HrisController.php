<?php

class Admin_HrisController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function addEmployeeAction()
    {
        $form = new Admin_Form_AddEmployee();
        $this->view->form = $form;
       if($this->getRequest()->isPost())
        {
             $formData = $this->getRequest()->getPost();
         
                if ($form->isValid($formData)) 
                {

        $request = $this->getRequest();
        $this->view->request = $request;
        $save = $request->save;
        $this->view->save = $save;
        if(!empty($save)){

             $u_data = array(
                              "userName" => $form->getValue('userName'),
                              "password" => $form->getValue('password'),
                              "email" => $form->getValue('email'),
                              "role" => $form->getValue('role'),
                              "status" => 1
                             );

        $user = new Dashboard_Model_Login();
        $user->insert($u_data);
       
         $user_data = $user->fetchRow($where = null,'id DESC','1,0')->toArray();
         $user_ID = $user_data['id'];
  
            $date = new Zend_Date();
           
            $data = array(
                  "firstName" => $form->getValue('firstName'),
                  "LastName" => $form->getValue('LastName'),
                  "gender" => $form->getValue('gender'),
                  "startDate" => $date->get('YYYY-MM-dd'),
                  "basic" => $form->getValue('b_salary'),
                  "hourlyRate" => $form->getValue('h_rate'),
                  "nonTaxableAllowences" => $form->getValue('non_tax'),
                  "grossSalary" => $form->getValue('g_salary'),
                  "OT" => $form->getValue('ot_app'),
                  "HolidayAPP" => $form->getValue('h_app'),
                  "SSS" => $form->getValue('sss'),
                  "health" => $form->getValue('p_health'),
                  "excludeFromPayroll" => $form->getValue('exc'),
                  "nightDiff" => $form->getValue('nt_app'),
                  "withholdingTax" => $form->getValue('w_tax'),
                  "Pagibig" => $form->getValue('p_big'),
                  "company_ID" => 1,
                  "positions_ID" => $form->getValue('emp_position'),
                  "employeetaxstatus_ID" => $form->getValue('tax_status'),
                  "epmloyeestatus_ID" => $form->getValue('emp_status'),
                  "employeesalarytype_ID" => $form->getValue('salary'),
                  "departments_id" => $form->getValue('emp_dep'),
                  "teams_ID" => $form->getValue('emp_team'),
                  "users_ID" => $user_ID,
                  "shift_id" => $form->getValue('shift_ID')
                  );

        $emp = new User_Model_Employee();
        $emp->insert($data);

        }

        $save_add = $request->save_add;
        $this->view->save_add = $save_add;
        if(!empty($save_add)){
            $u_data = array(
                              "userName" => $form->getValue('userName'),
                              "password" => $form->getValue('password'),
                              "email" => $form->getValue('email'),
                              "role" => $form->getValue('role'),
                              "status" => 1
                             );

        $user = new Dashboard_Model_Login();
        $user->insert($u_data);
       
         $user_data = $user->fetchRow($where = null,'id DESC','1,0')->toArray();
         $user_ID = $user_data['id'];
  
            $date = new Zend_Date();
           
            $data = array(
                  "firstName" => $form->getValue('firstName'),
                  "LastName" => $form->getValue('LastName'),
                  "gender" => $form->getValue('gender'),
                  "startDate" => $date->get('YYYY-MM-dd'),
                  "basic" => $form->getValue('b_salary'),
                  "hourlyRate" => $form->getValue('h_rate'),
                  "nonTaxableAllowences" => $form->getValue('non_tax'),
                  "grossSalary" => $form->getValue('g_salary'),
                  "OT" => $form->getValue('ot_app'),
                  "HolidayAPP" => $form->getValue('h_app'),
                  "SSS" => $form->getValue('sss'),
                  "health" => $form->getValue('p_health'),
                  "excludeFromPayroll" => $form->getValue('exc'),
                  "nightDiff" => $form->getValue('nt_app'),
                  "withholdingTax" => $form->getValue('w_tax'),
                  "Pagibig" => $form->getValue('p_big'),
                  "company_ID" => 1,
                  "positions_ID" => $form->getValue('emp_position'),
                  "employeetaxstatus_ID" => $form->getValue('tax_status'),
                  "epmloyeestatus_ID" => $form->getValue('emp_status'),
                  "employeesalarytype_ID" => $form->getValue('salary'),
                  "departments_id" => $form->getValue('emp_dep'),
                  "teams_ID" => $form->getValue('emp_team'),
                  "users_ID" => $user_ID,
                  "shift_id" => $form->getValue('shift_ID')
                  );

        $emp = new User_Model_Employee();
        $emp->insert($data);

        }

        // $cancel = $request->cancel;
        // $this->view->cancel = $cancel;
        //if(!empty($cancel)){
          // $this->_redirect('/Admin/hris/index');
          //   echo "cancel is pressed";
       // }
    }
}
    }

    public function companyBrandingInformationAction()
    {
        // $compLogo = new Admin_Form_CompanyLogo();
        // $this->view->compLogo = $compLogo;
        // die();
        $company = new Admin_Model_Company();
        $form    = new Admin_Form_BrandCompInfo();
        $this->view->form  = $form;
       
        if($this->getRequest()->isPost())
        {
             $formData = $this->getRequest()->getPost();
                
                if ($form->isValid($formData)) 
                {
                    $company = new Admin_Model_Company();
                    $company->insert($form->getValues());
                    $this->view->successMsg = "Company information updated";

                }else
                {
                    $form->populate($formData);
                    echo "invalid Data";
                }
        }else
        {
            
            $form->populate($company->fetchRow(null, 'ID DESC')->toArray());   
       
    }
    }

    public function uploadLogoAction()
    {

        if ($this->_request->isPost()) {

            $formData = $this->_request->getPost();

            if ($form->isValid($formData)) {

                

                $uploadedData = $form->getValues();
                

              echo "Coupon Uploaded!";
            

            } else {

                $form->populate($formData);

            }
        }
        
    }

    public function companySettingsAction()
    {
        // action body
    }

    public function holidayConfigurationAction()
    {
        // action body
    }

    public function addHolidayAction()
    {
        $form = new Admin_Form_AddHolidayForm();
        $addholidayinsert = new Admin_Model_AddholidayModel();

        $this->view->form = $form;

         if($this->getRequest()->isPost())
        {
             $formData = $this->getRequest()->getPost();
                
                if ($form->isValid($formData)) 
                {
                    $addholidayinsert->insert($form->getValues());
                    $this->view->successMsg = "Holiday Added";
                }
        
    }
}

    public function approvalAction()
    {
        // action body
         $p_leave = new User_Model_Employeeleaves();
         $p_data = $p_leave->fetchAll($where = "status = 1",'ID DESC')->toArray(); 
         $this->view->p_data = $p_data;
        
    }

    public function leaveAcceptedAction()
    {
    $p_leave = new User_Model_Employeeleaves();
    $where = "ID=" .$this->_request->getParam('ID');
    $data = array(
           "status" => 2
            );
      $p_leave->update($data, $where);

    }

    public function leaveRejectedAction()
    {

    $form = new Admin_Form_RejectReason();
    $form->setMethod('post')->setAction( $this->getHelper('url')->url(array('controller' => 'hris', 'action' => 'leave-rejected')) );
    $this->view->form = $form;
    $where = "ID=" .$this->_request->getParam('ID');
    $p_leave = new User_Model_Employeeleaves();
    if($this->getRequest()->isPost())
        {
             $formData = $this->getRequest()->getPost();
                
                if ($form->isValid($formData)) 
                {
                    $reason = $form->getValue('statusReason');
                }
            }

    
    $data = array(
           "status" => 3,
           "statusReason" => $reason
            );
      $p_leave->update($data, $where);
      //$this->_redirect('/Admin/hris/approval/');

    }

public function listEmployeeAction()
{
  $emp = new User_Model_Employee();
  $emp_list = $emp->fetchAll($where = null,'ID DESC')->toArray(); 
  $this->view->emp_list = $emp_list; 
}

     public function editEmployeeAction()
    {
      $form = new Admin_Form_EditEmployee();
      $form->setMethod('post')->setAction( $this->getHelper('url')->url(array('controller' => 'hris', 'action' => 'edit-employee')) );
        $this->view->form = $form;
       if($this->getRequest()->isPost())
        {
             $formData = $this->getRequest()->getPost();
         
                if ($form->isValid($formData)) 
                {
            
            $u_data = array(
                              "userName" => $form->getValue('userName'),
                              "email" => $form->getValue('email'),
                              "role" => $form->getValue('role')
                             );

            $user = new Dashboard_Model_Login();
            $where = "ID=" .$this->_request->getParam('ID');
            $user->update($u_data,$where);
           
          
            $date = new Zend_Date();
           
            $data = array(
                  "ID" => $form->getValue('ID'),
                  "firstName" => $form->getValue('firstName'),
                  "middleName" => $form->getValue('middleName'),
                  "LastName" => $form->getValue('LastName'),
                  "nickName" => $form->getValue('nickName'),
                  "spouseName" => $form->getValue('spouseName'),
                  "gender" => $form->getValue('gender'),
                  "startDate" => $date->get('YYYY-MM-dd'),
                  "dateofBirth" => $form->getValue('dateofBirth'),
                  "maritalStatus" => $form->getValue('maritalStatus'),
                  "phone" => $form->getValue('phone'),
                  "mobile" => $form->getValue('mobile'),
                  "picture" => $form->getValue('picture'),
                  "address" => $form->getValue('address'),
                  "district" => $form->getValue('district'),
                  "city" => $form->getValue('city'),
                  "emergencyContactName" => $form->getValue('emergencyContactName'),
                  "emergencyContactRelation" => $form->getValue('emergencyContactRelation'),
                  "emergencyContactPhone" => $form->getValue('emergencyContactPhone'),
                  "emergencyContactMobile" => $form->getValue('emergencyContactMobile'),
                  "basic" => $form->getValue('basic'),
                  "hourlyRate" => $form->getValue('hourlyRate'),
                  "nonTaxableAllowences" => $form->getValue('nonTaxableAllowences'),
                  "taxableAllowances" => $form->getValue('taxableAllowances'),
                  "grossSalary" => $form->getValue('grossSalary'),
                  //"OT" => $form->getValue('OT'),
                  "HolidayAPP" => $form->getValue('h_app'),
                  "SSS" => $form->getValue('SSS'),
                  "health" => $form->getValue('health'),
                  "excludeFromPayroll" => $form->getValue('excludeFromPayroll'),
                  "Pagibig" => $form->getValue('Pagibig'),
                  "positions_ID" => $form->getValue('positions_ID'),
                  "employeetaxstatus_ID" => $form->getValue('employeetaxstatus_ID'),
                  "epmloyeestatus_ID" => $form->getValue('epmloyeestatus_ID'),
                  "employeesalarytype_ID" => $form->getValue('employeesalarytype_ID'),
                  "teams_ID" => $form->getValue('teams_ID')
                  );
<<<<<<< HEAD

        $emp = new User_Model_Employee();
        $where = "ID=" .$this->_request->getParam('ID');
        $emp->update($data,$where);

} 

}
 else{ 
      $where = "ID=" .$this->_request->getParam('ID');                                               
       $empObj= new User_Model_Employee(); 
       $row=$empObj->fetchRow($where); 
       $form->populate($row->toArray()); 
      // $this->view->populate=$form; 
    
      $where = "id=" .$row['users_id'];                                               
       $userObj= new Dashboard_Model_Login(); 
       $row=$userObj->fetchRow($where); 
       $form->populate($row->toArray()); 
       $this->view->populate=$form; 
 
                                                        
                                                } 

}


public function employeehoursAction()
    {

          $db = Zend_Db::factory('Pdo_Mysql', array(
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'hris'
            ));

      $from = $_POST['from'];
      $to = $_POST['to'];

      if(empty($from))
      {
        $sql = 'SELECT employee.firstName, timekeeping.punchIn, timekeeping.lunchOut, timekeeping.lunchIn, timekeeping.punchOut
                FROM timekeeping
                INNER JOIN employee ON timekeeping.employee_ID = employee.ID
                ORDER BY timekeeping.punchIn DESC';
        $m_data = $db->fetchAll($sql);
        $this->view->punch = $m_data;
      }

      else
      {

        
          $sql = "SELECT employee.firstName, timekeeping.punchIn, timekeeping.lunchOut, timekeeping.lunchIn, timekeeping.punchOut
                  FROM timekeeping
                  INNER JOIN employee ON timekeeping.employee_ID = employee.ID
                  WHERE timekeeping.punchIn BETWEEN '$from' AND '$to'
                  ORDER BY timekeeping.punchIn DESC
                  ";

        $m_data = $db->fetchAll($sql);
        $this->view->punch = $m_data;
       }


    }




=======
>>>>>>> 93bfdfc0eb5847a6b45355af39407eae41fdaf76

        $emp = new User_Model_Employee();
        $where = "ID=" .$this->_request->getParam('ID');
        $emp->update($data,$where);

} 

}
 else{ 
      $where = "ID=" .$this->_request->getParam('ID');                                               
       $empObj= new User_Model_Employee(); 
       $row=$empObj->fetchRow($where); 
       $form->populate($row->toArray()); 
      // $this->view->populate=$form; 
    
      $where = "id=" .$row['users_id'];                                               
       $userObj= new Dashboard_Model_Login(); 
       $row=$userObj->fetchRow($where); 
       $form->populate($row->toArray()); 
       $this->view->populate=$form; 
 
                                                        
                                                } 

}
}
















