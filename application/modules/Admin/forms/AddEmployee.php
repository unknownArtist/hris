<?php

class Admin_Form_AddEmployee extends Zend_Form
{

    public function init()
    {
    
    	$genderOptions = array('Male'=>'Male','Female'=>'Female');
        
    	$this->setAction('/Admin/hris/add-employee/');
    	$this->setMethod('post');

        // $employee_no        = new Zend_Form_Element_Text('ID');
        // $employee_no->setLabel('Employee No')
        //                ->addFilter('StripTags')
        //                ->setRequired(true);
                      
        $firstName = new Zend_Form_Element_Text('firstName');
        $firstName->setLabel('First Name')
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

        $LastName = new Zend_Form_Element_Text('LastName');
        $LastName->setLabel('Last Name')
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



        $gender        = new Zend_Form_Element_Select('gender');
        $gender->setLabel('Gender')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                       ->addMultiOptions($genderOptions); 
        $gender->class = "btn btn-small dropdown-toggle";

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


         $password = new Zend_Form_Element_Password('password');
         $password->setRequired(TRUE)
                  ->setLabel('Password')
                  ->addFilter('StripTags')
                  ->addFilter('StringTrim');

         $ConfirmPassword = new Zend_Form_Element_Password('confirmPassword');
         $ConfirmPassword->setRequired(TRUE)
                 ->setLabel('Confirm Password')
                  ->addFilter('StripTags')
                  ->addValidator(new Zend_Validate_Identical('password'))
                  ->setErrorMessages(array('pass' => 'Password does not match'))
                  ->addFilter('StringTrim');

        $email        = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                       ->addErrorMessage('Valid Email is required')
                       ->addValidator('NotEmpty')
                       ->addValidator('EmailAddress');  


        $showPassword        = new Zend_Form_Element_Checkbox('showPassword');
        $showPassword->setLabel('Show Password');


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


        //////////////////////////////Employee Information///////////////////////////////////////
            $positiontypes = new Admin_Model_Positions();

            $position_list = $positiontypes->getpositionList();


        $emp_position        = new Zend_Form_Element_Select('emp_position');
        $emp_position->setLabel('Employee Position')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($position_list);
                       // ->addMultiOptions(array(
                       //  'BA'=>'BA',
                       //  'Business Analyst'=>'Business Analyst',
                       //  'CSR'=>'CSR',
                       //  'HR Trainee'=>'HR Trainee',
                       //  'IT'=>'IT',
                       //  'Manager'=>'Manager',
                       //  'Operations Officer'=>'Operations Officer',
                       //  'Programmer'=>'Programmer',
                       //  'salesman'=>'salesman',
                       //  'Secretary'=>'Secretary',
                       //  'Tambay'=>'Tambay',
                       //  'Others'=>'Others',

                       //  ));

            $salarytypes = new Admin_Model_SalaryType();

            $salary_list = $salarytypes->getsalaryList();

        $salary        = new Zend_Form_Element_Select('salary');
        $salary->setLabel('*Salary')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($salary_list);
                       // ->addMultiOptions(array(
                       //  'Contractual'=>'Contractual',
                       //  'Daily'=>'Daily',
                       //  'Hourly'=>'Hourly',
                       //  'Monthly'=>'Monthly'));

           $hourly_rate        = new Zend_Form_Element_Text('h_rate');
           $hourly_rate->setLabel('Hourly Rate')
                        ->addFilter('StripTags')
                       ->setRequired(true);

            $teamtypes = new  User_Model_Teams();

            $team_list = $teamtypes->getTeamList();

        $emp_team        = new Zend_Form_Element_Select('emp_team');
        $emp_team->setLabel('*Employee Team')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($team_list);
                       // ->addMultiOptions(array(
                       //  'Management'=>'Management',
                       //  'Operation'=>'Operation',
                       //  'Orica'=>'Orica',
                       //  'Pasig'=>'Pasig',
                       //  'IT'=>'IT',
                       //  'Head Office'=>'Head Office'));
            $deptypes = new User_Model_Departments();

            $dep_list = $deptypes->getdepList();

        $emp_dep        = new Zend_Form_Element_Select('emp_dep');
        $emp_dep->setLabel('*Employee Department')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($dep_list);
                       // ->addMultiOptions(array(
                       //  'Management'=>'Management',
                       //  'Operation'=>'Operation',
                       //  'Orica'=>'Orica',
                       //  'Pasig'=>'Pasig',
                       //  'IT'=>'IT',
                       //  'Head Office'=>'Head Office'));

        $b_salary        = new Zend_Form_Element_Text('b_salary');
        $b_salary->setLabel('Basic Salary')
                       ->addFilter('StripTags')
                       ->setRequired(true);


        $non_tax       = new Zend_Form_Element_Text('non_tax');
        $non_tax->setLabel('Non-Taxable Allowance')
                       ->addFilter('StripTags')
                       ->setRequired(true);


        $tax        = new Zend_Form_Element_Text('tax');
        $tax->setLabel('Taxable Allowance')
                       ->addFilter('StripTags')
                       ->setRequired(true);


        $g_salary        = new Zend_Form_Element_Text('g_salary');
        $g_salary->setLabel('Gross Salary')
                       ->addFilter('StripTags')
                       ->setRequired(true);

            $empstatustypes = new  User_Model_EmpStatus();

            $status_list = $empstatustypes->getstatusList();
        $emp_status        = new Zend_Form_Element_Select('emp_status');
        $emp_status->setLabel('Employee Status')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($status_list);
                       // ->addMultiOptions(array(
                       //  'Probationary'=>'Probationary',
                       //  'Regular'=>'Regular',
                       //  'Officer'=>'Officer',
                       //  'Freelance'=>'Freelance',
                       //  'Terminated'=>'Terminated',
                       //  'Resigned'=>'Resigned',
                       //  'Contractual'=>'Contractual',
                       //  'Retired'=>'Retired',
                       //  'End of Contract'=>'End of Contract',

                       //  ));

            $taxtypes = new  User_Model_TaxStatus();

            $tax_list = $taxtypes->getEmpStatusList();

       
        $tax_status        = new Zend_Form_Element_Select('tax_status');
        $tax_status->setLabel('Tax Status')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($tax_list);
                       // ->addMultiOptions(array(
                       //  'S'=>'S',
                       //  'S1'=>'S1',
                       //  'S2'=>'S2',
                       //  'S3'=>'S3',
                       //  'S4'=>'S4',
                       //  'ME'=>'ME',
                       //  'ME1'=>'ME1',
                       //  'ME2'=>'ME2',
                       //  'ME3'=>'ME3',
                       //  'ME4'=>'ME4',


                       //  ));

        $ot_app = new Zend_Form_Element_Radio('ot_app');

        $ot_app->setLabel('OT Applicable:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));

        $nt_app = new Zend_Form_Element_Radio('nt_app');

        $nt_app->setLabel('Is Night Difference Applicable:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));
        $h_app = new Zend_Form_Element_Radio('h_app');

        $h_app->setLabel('Is Holiday Applicable:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));

        $w_tax = new Zend_Form_Element_Radio('w_tax');

        $w_tax->setLabel('Has Withholding Tax:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));

        $p_big = new Zend_Form_Element_Radio('p_big');

        $p_big->setLabel('Has Pagibig:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));

        $sss = new Zend_Form_Element_Radio('sss');

        $sss->setLabel('Has SSS:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));


        $p_health = new Zend_Form_Element_Radio('p_health');

        $p_health->setLabel('Has Philhealth:')

              ->addMultiOptions(array(

                  'True' => 'True',

                  'False' => 'False'

                  ));

         $exc = new Zend_Form_Element_Checkbox('exc');
         $exc->setLabel('Exclude User From Payroll');


            $shifttypes = new User_Model_Shift();

            $shift_list = $shifttypes->getshiftList();

       
        $shift_ID       = new Zend_Form_Element_Select('shift_ID');
        $shift_ID->setLabel('Shift ID')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addMultiOptions($shift_list);
     
        // $save = new Zend_Form_Element_Submit('save');
        // $save->setOptions(array('class'=>'btn-small'));

           $this->addElements(array(
           // $employee_no,
            $firstName,
            $LastName,
            $gender,
            $userName,
            $password,
            $email,
            $showPassword,
            $role,
            $emp_position,
            $salary,
            $hourly_rate,
            $emp_team,
            $emp_dep,
            $b_salary,
            $non_tax,
            $tax,
            $g_salary,
            $emp_status,
            $tax_status,
            $ot_app,
            $nt_app,
            $h_app,
            $w_tax,
            $p_big,
            $sss,
            $p_health,
            $exc,
            $shift_ID
            ));
    $this->addElement('submit', 'save', array( 
        'label' => 'Save', 
        'decorators' => array( 
            'ViewHelper', 
        ), 
    )); 
    // $this->addElement('submit', 'cancel', array( 
    //     'label' => 'Cancel', 
    //     'decorators' => array( 
    //         'ViewHelper', 
    //     ), 
    //)); 
    $this->addElement('submit', 'save_add', array( 
        'label' => 'Save and Add Another', 
        'decorators' => array( 
            'ViewHelper', 
        ), 
    )); 

    $this->addDisplayGroup(array('save', 'save_add'), 'submitButtons', array( 
        'decorators' => array( 
            'FormElements', 
            array('HtmlTag', array('tag' => 'div', 'class' => 'element')), 
        ), 
    )); 
        
    }


}

