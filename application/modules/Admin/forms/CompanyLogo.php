<?php

class Admin_Form_CompanyLogo extends Zend_Form
{

    public function init()
    {

  
        
     $this->setAction('coupons');
        $this->setMethod('post');
        $this->setAttrib('enctype', 'multipart/form-data');
        $this->setAttrib('id','coupon');

        //$path = new Zend_Form_Element_Text('path');
        //Zend_Debug::dump($fullFilePath);

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
         $file = new Zend_Form_Element_File('file');
         // $file->setDestination(.);
         $file->setRequired(true);
         
       

        $this->addElements(array($firstName,$file, $submit));

        
    }


}

