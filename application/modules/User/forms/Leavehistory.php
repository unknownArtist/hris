<?php

class User_Form_Leavehistory extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        $this->setMethod('post');
        $this->setAction('/User/leave/index');

     $filter = new Zend_Form_Element_Select('filter');
     $filter->setLabel('Filter By:')
            ->setAttribs(array('class'=>'select'));
     $filter->addMultiOptions(array(
            	"Status" => "Status",
            	"Date Range" => "Date Range"));
     $this->addElement($filter);
  
     $f_data = new Zend_Form_Element_Select('f_data');
     $f_data->addMultiOptions(array(
            	"1" => "All",
            	"2" => "Pending",
            	"3" => "Approved",
            	"4" => "Denied"));
    $f_data->setAttribs(array('id'=>'status'));
    $this->addElement($f_data);

    $start = new Zend_Form_Element_Text('start');
    $start->setLabel('Start')
          ->setAttribs(array('id'=>'start'));
     $this->addElement($start);
       
     $end = new Zend_Form_Element_Text('end');
     $end->setLabel('End')
         ->setAttribs(array('id'=>'end'));
     $this->addElement($end);

    $search = new Zend_Form_Element_Submit('Search');
    $this->addElement($search);


    }


}

