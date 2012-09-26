<?php

class Admin_Form_AddHolidayForm extends Zend_Form
{

    public function init()
    {
    	$holidaytype = array(

    		'Legal (2.00)'                =>      'Legal (2.00)',
    		'Regular (1.00)'              =>      'Regular (1.00)',
    		'Special Non-Working (1.30)'  =>      'Special Non-Working (1.30)',
    		'Special Working (1.00)'      =>      'Special Working (1.00)',


    		);
    	// $days = array(
    	// 	'1'=>'1',
    	// 	'2'=>'2',
    	// 	'3'=>'3',
    	// 	'4'=>'4',
    	// 	'5'=>'5',
    	// 	'6'=>'6',
    	// 	'7'=>'7',
    	// 	'8'=>'8',
    	// 	'9'=>'9',
    	// 	'10'=>'10',
    	// 	'11'=>'11',
    	// 	'12'=>'12',
    	// 	'13'=>'13',
    	// 	'14'=>'14',
    	// 	'15'=>'15',
    	// 	'16'=>'16',
    	// 	'17'=>'17',
    	// 	'18'=>'18',
    	// 	'19'=>'19',
    	// 	'20'=>'20',
    	// 	'21'=>'21',
    	// 	'22'=>'22',
    	// 	'23'=>'23',
    	// 	'24'=>'24',
    	// 	'25'=>'25',
    	// 	'26'=>'26',
    	// 	'27'=>'27',
    	// 	'28'=>'28',
    	// 	'29'=>'29',
    	// 	'30'=>'30',
    	// 	'31'=>'31',
    	// 	);
    	// $MonthName = array(
    	// 	'January'=>'January',
    	// 	'February'=>'February',
    	// 	'March'=>'March',
    	// 	'April'=>'April',
    	// 	'May'=>'May',
    	// 	'June'=>'June',
    	// 	'July'=>'July',
    	// 	'August'=>'August',
    	// 	'September'=>'September',
    	// 	'October'=>'October',
    	// 	'November'=>'November',
    	// 	'December'=>'December',

    	// 	);
        $this->setMethod('post');
        $this->setAction('');

        $Name = new Zend_Form_Element_Text('name');
        $Name->setLabel('Name')
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

        $date = new Zend_Form_Element_Text('date');
        $date->setLabel('Date')
                        ->setRequired(true)
                        ->addFilter('StripTags')
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty');
         $date->setAttribs(array('id'=>'datepicker'));
                        


        

        $holidayType        = new Zend_Form_Element_Select('holidayType');
        $holidayType->setLabel('Holiday Type')
                       ->addFilter('StripTags')
                       ->setRequired(true)
                        ->addFilter('StringTrim')
                        ->addValidator('NotEmpty')
                       ->addMultiOptions($holidaytype); 
        $holidayType->class = "btn btn-small dropdown-toggle";



        $add  = new Zend_Form_Element_Submit('Add');
		$add->class = "btn btn-primary";


		$this->addElements(array(

			$Name,
			$date,
			$holidayType,
			$add

			));



    }


}

