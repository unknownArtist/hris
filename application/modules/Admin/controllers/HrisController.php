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
}

















