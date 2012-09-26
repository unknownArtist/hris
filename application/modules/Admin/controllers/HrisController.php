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

    public function approvalAction()
    {
        // action body
    }


}















