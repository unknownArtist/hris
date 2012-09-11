<?php

class Admin_Form_AddEmployee extends Zend_Form
{

    public function init()
    {

    	$genderOptions = array('Male'=>'Male','Female'=>'Female');
        
    	$this->setAction('');
    	$this->setMethod('post');

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
        $LastName->setLabel('First Name')
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
        $email->setLabel('Show Password');

        $role        = new Zend_Form_Element_Select('role');
        $role->setLabel('*Role')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                       ->addMultiOptions(array(
                       	'Accountant'=>'Accountant',
                       	'Company Admin'=>'Company Admin',
                       	'Employee'=>'Employee',
                       	'HR'=>'HR',
                       	'Manager'=>'Manager'));


        //////////////////////////////Employee Information///////////////////////////////////////

        // $submit = new Zend

           $this->addElements(array(
            $firstName,
            $LastName,
            $gender,
            $userName,
            $password,
            $email,
            $showPassword,
            $role,



            ));

        
    }


}

