<?php

class Admin_Form_EditEmployee extends Zend_Form
{

    public function init()
    {
    
    	$genderOptions = array('Male'=>'Male','Female'=>'Female');
      $maritalOptions = array('Single'=>'Single','Married'=>'Married', 'Widow / Widower'=>'Widow / Widower', 'Seperated by Law'=>'Seperated by Law');
        
    	//$this->setAction('/Admin/hris/add-employee/ID');
    	$this->setMethod('post');

        $employee_no        = new Zend_Form_Element_Text('ID');
        $employee_no->setLabel('*Employee No')
                       ->addFilter('StripTags')
                       ->setRequired(true);
                      
        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('*First Name')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));

        $middleName = new Zend_Form_Element_Text('middleName');
        $middleName->setLabel('Middle Name')
                        ->setRequired(false)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));

        $LastName = new Zend_Form_Element_Text('LastName');
        $LastName->setLabel('*Last Name')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));


        $nickName = new Zend_Form_Element_Text('nickName');
        $nickName->setLabel('Nick Name')
                        ->setRequired(false)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));


        $spouseName = new Zend_Form_Element_Text('spouseName');
        $spouseName->setLabel("Spouse's Name")
                        ->setRequired(false)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));

        $gender        = new Zend_Form_Element_Select('gender');
        $gender->setLabel('Gender')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($genderOptions); 
        $gender->class = "btn btn-small dropdown-toggle";

        $dateofBirth = new Zend_Form_Element_Text('dateofBirth');
        $dateofBirth->setLabel('*Date of Birth')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty');
        $dateofBirth->setAttribs(array('id'=>'datepicker'));

        $maritalStatus        = new Zend_Form_Element_Select('maritalStatus');
        $maritalStatus->setLabel('*Marital Status')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($maritalOptions); 
        $maritalStatus->class = "btn btn-small dropdown-toggle";

        $phone        = new Zend_Form_Element_Text('phone');
        $phone->setLabel('Tel No')
                       ->addFilter('StripTags')
                       ->setRequired(false);

        $mobile        = new Zend_Form_Element_Text('mobile');
        $mobile->setLabel('Mobile No')
                       ->addFilter('StripTags')
                       ->setRequired(false);
        //////////////////////Account Information/////////////////////////////////
		    $userName = new Zend_Form_Element_Text('userName');
        $userName->setLabel('*User Name')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));


        $email        = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                       ->addErrorMessage('Valid Email is required')
                       ->addValidator('NotEmpty')
                       ->addValidator('EmailAddress');  


        // $showPassword        = new Zend_Form_Element_Checkbox('showPassword');
        // $showPassword->setLabel('Show Password');


         $roletypes = new Admin_Model_EmpRole();

         $role_list = $roletypes->getroleList();

        $role        = new Zend_Form_Element_Select('role');
        $role->setLabel('*User Role')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($role_list);
                       // ->addMultiOptions(array(
                       // 	'Accountant'=>'Accountant',
                       // 	'Company Admin'=>'Company Admin',
                       // 	'Employee'=>'Employee',
                       // 	'HR'=>'HR',
                       // 	'Manager'=>'Manager'));
      $picture        = new Zend_Form_Element_File('picture');
      $picture->setLabel('User Image:')
                   //->addFilter('Rename', APPLICATION_PATH.'/../public/images/' .md5(rand(1,10)).time().'.jpg')
                      //->setDestination(APPLICATION_PATH.'/../public/images')
                      ->addValidator('Count', false) // ensure only 1 file
                      ->addValidator('Size', false, 8097152) // limit to 6MB
                      ->addValidator('Extension', false, 'jpg,jpeg,png,gif');

//////////////////////////////////Address Information////////////////////////////////////////
                      ////////Present Address//////////////
        $add        = new Zend_Form_Element_Text('address');
        $add->setLabel('Address :')
                       ->addFilter('StripTags')
                       ->setRequired(false);

        $district       = new Zend_Form_Element_Text('district');
        $district->setLabel('District :')
                       ->addFilter('StripTags')
                       ->setRequired(false);

        $town        = new Zend_Form_Element_Text('city');
        $town->setLabel('Town /City')
                       ->addFilter('StripTags')
                       ->setRequired(false);

     
        ////////////////////Emergency Contact////////////////////////////////

        $e_name        = new Zend_Form_Element_Text('emergencyContactName');
        $e_name->setLabel('Name of Contact Person:')
                       ->addFilter('StripTags')
                       ->setRequired(false);

        $e_relation        = new Zend_Form_Element_Text('emergencyContactRelation');
        $e_relation->setLabel('Relationship to Employee:')
                       ->addFilter('StripTags')
                       ->setRequired(false);
        $e_landline       = new Zend_Form_Element_Text('emergencyContactPhone');
        $e_landline->setLabel('Landline :')
                       ->addFilter('StripTags')
                       ->setRequired(false);

        $e_mobile        = new Zend_Form_Element_Text('emergencyContactMobile');
        $e_mobile->setLabel('Mobile :')
                       ->addFilter('StripTags')
                       ->setRequired(false);
        //////////////////////////////Government Numbers///////////////////////////////////////
        $sss = new Zend_Form_Element_Radio('SSS');

        $sss->setLabel('Has SSS:')

              ->addMultiOptions(array(

                  1 => 'True',

                  0 => 'False'

                  ));


        $p_health = new Zend_Form_Element_Radio('health');

        $p_health->setLabel('Has Philhealth:')

              ->addMultiOptions(array(

                  1 => 'True',

                  0 => 'False'

                  ));
           

            $taxtypes = new  User_Model_TaxStatus();

            $tax_list = $taxtypes->getEmpStatusList();

       
        $tax_status        = new Zend_Form_Element_Select('employeetaxstatus_ID');
        $tax_status->setLabel('Tax Status')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($tax_list);
                    
        $p_big = new Zend_Form_Element_Radio('Pagibig');

        $p_big->setLabel('Has Pagibig:')

              ->addMultiOptions(array(

                  1 => 'True',

                  0 => 'False'

                  ));
///////////////////////Employee Information///////////////////////////
            $positiontypes = new Admin_Model_Positions();

            $position_list = $positiontypes->getpositionList();


        $emp_position        = new Zend_Form_Element_Select('positions_ID');
        $emp_position->setLabel('Employee Position')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($position_list);
                    

            $salarytypes = new Admin_Model_SalaryType();

            $salary_list = $salarytypes->getsalaryList();

        $salary        = new Zend_Form_Element_Select('employeesalarytype_ID');
        $salary->setLabel('*Salary')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($salary_list);
                 
           
         $h_check = new Zend_Form_Element_Checkbox('h_check');
         $h_check->setAttribs(array('id'=>'h_check'));
           $hourly_rate        = new Zend_Form_Element_Text('hourlyRate');
           $hourly_rate->setLabel('Hourly Rate')
                        ->addFilter('StripTags');
           $hourly_rate->setAttribs(array('id'=>'h_rate'));

            $teamtypes = new  User_Model_Teams();

            $team_list = $teamtypes->getTeamList();

        $emp_team        = new Zend_Form_Element_Select('teams_ID');
        $emp_team->setLabel('*Employee Team')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($team_list);
            

        $b_salary        = new Zend_Form_Element_Text('basic');
        $b_salary->setLabel('Basic Salary')
                       ->addFilter('StripTags')
                       ->setRequired(true);


        $non_tax       = new Zend_Form_Element_Text('nonTaxableAllowences');
        $non_tax->setLabel('Non-Taxable Allowance')
                       ->addFilter('StripTags')
                       ->setRequired(true);


        $tax        = new Zend_Form_Element_Text('taxableAllowances');
        $tax->setLabel('Taxable Allowance')
                       ->addFilter('StripTags')
                       ->setRequired(true);


        $g_salary        = new Zend_Form_Element_Text('grossSalary');
        $g_salary->setLabel('Gross Salary')
                       ->addFilter('StripTags')
                       ->setRequired(true);

            $empstatustypes = new  User_Model_EmpStatus();

            $status_list = $empstatustypes->getstatusList();
        $emp_status        = new Zend_Form_Element_Select('epmloyeestatus_ID');
        $emp_status->setLabel('Employee Status')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($status_list);
                     

        // $manager        = new Zend_Form_Element_Text('manager');
        // $manager->setLabel('Manager :')
        //                ->addFilter('StripTags')
        //                ->setRequired(false);

       
      
         $exc = new Zend_Form_Element_Checkbox('excludeFromPayroll');
         $exc->setLabel('Exclude User From Payroll');


     
        $save = new Zend_Form_Element_Submit('save');
        $save->setOptions(array('class'=>'btn-small'));

           $this->addElements(array(
            $employee_no,
            $firstName,
            $middleName,
            $LastName,
            $nickName,
            $spouseName,
            $gender,
            $dateofBirth,
            $maritalStatus,
            $phone,
            $mobile,
            $userName,
            $email,
            $role,
            $picupload,
            $add,
            $district,
            $town,
            $e_name,
            $e_relation,
            $e_landline,
            $e_mobile,
            $sss,
            $p_health,
            $tax_status,
            $p_big,
            $emp_position,
            $salary,
            $hourly_rate,
            $h_check,
            $emp_team,
            $manager,
            $b_salary,
            $non_tax,
            $tax,
            $g_salary,
            $emp_status,
            $exc,
            $save
            ));
   
    }


}