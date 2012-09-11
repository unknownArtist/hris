<?php

class Admin_Form_BrandCompInfo extends Zend_Form
{

    public function init()
    {
        $this->setAction('');
    	$this->setMethod('post');
    	$this->setAttrib('class','form-horizontal');

        $EmployerName = new Zend_Form_Element_Text('EmployerName');
        $EmployerName->setLabel('Employer Name')
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

        $companyName = new Zend_Form_Element_Text('companyName');
        $companyName->setLabel('Company Name')
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


        $OfficeNo        = new Zend_Form_Element_Text('OfficeNo');
        $OfficeNo->setLabel('Office No')
                        ->addFilter('StripTags')
                        ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addErrorMessage('Its not valid input')
                        ->addValidator('NotEmpty')
                        ->addValidator('Digits');



        $SSSNumber        = new Zend_Form_Element_Text('SSSNumber');
        $SSSNumber->setLabel('SSS Number')
                        ->addFilter('StripTags')
                        ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addErrorMessage('Its not valid input')
                        ->addValidator('NotEmpty')
                        ->addValidator('Digits');    



        $TaxIdentificationNo  = new Zend_Form_Element_Text('TaxIdentificationNo');
        $TaxIdentificationNo->setLabel('Tax Identification No')
                        ->addFilter('StripTags')
                        ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addErrorMessage('Its not valid input')
                        ->addValidator('NotEmpty')
                        ->addValidator('Digits');     


	    $PhilhealthNumber  = new Zend_Form_Element_Text('PhilhealthNumber');
        $PhilhealthNumber->setLabel('Philhealth Number')
                        ->addFilter('StripTags')
                        ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addErrorMessage('Its not valid input')
                        ->addValidator('NotEmpty')
                        ->addValidator('Digits');       


        $Address = new Zend_Form_Element_Text('Address');
        $Address->setLabel('Address Line 1')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z0-9# ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter Valid address'
                                      )
                       ));  

        $AlterAddress = new Zend_Form_Element_Text('AlterAddress');
        $AlterAddress->setLabel('Address Line 2')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z0-9 ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));

		$city = new Zend_Form_Element_Text('city');
        $city->setLabel('City')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));   


		$Province = new Zend_Form_Element_Text('Province');
        $Province->setLabel('Province')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('regex', true, 
                                 array(
                                       'pattern'=>'/^[(a-zA-Z ]+$/', 
                                       'messages'=>array(
                                       'regexNotMatch'=>'Kindly Enter only Alphabets'
                                      )
                       ));

		$zipcode  = new Zend_Form_Element_Text('zipcode');
        $zipcode->setLabel('Zip Code')
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addErrorMessage('Its not valid input')
                        ->addValidator('Digits');         



		$update  = new Zend_Form_Element_Submit('Update');
		$update->class = "btn btn-primary";


		$this->addElements(

			array(
				$EmployerName,
				$companyName,
				$OfficeNo,
				$SSSNumber,
				$TaxIdentificationNo,
				$PhilhealthNumber,
				$Address,
				$AlterAddress,
				$city,
				$Province,
				$zipcode,
				$update
				)
			);      



    }


}

