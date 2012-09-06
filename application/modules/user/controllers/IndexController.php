<?php

class User_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    $users_id = Zend_Auth::getInstance()->getIdentity()->id;
    $userName = Zend_Auth::getInstance()->getIdentity()->userName;
    $this->view->Message ="Good Day  ". $userName."!";

    $emp = new User_Model_Employee();
    $where = "users_id =". $users_id;
    $emp_data = $emp->fetchRow($where)->toArray(); 
    $this->view->name = $emp_data['firstName'];

    $db = Zend_Db::factory('Pdo_Mysql', array(
                'host'     => 'localhost',
                'username' => 'root',
                'password' => 'brownquick321',
                'dbname'   => 'hris'
            ));
 
 


    $sql = "select e.firstName from employee e INNER JOIN departmentmanagers dm ON e.departments_id = dm.departments_id Where e.users_id = ".$users_id;
             

			$m_data = $db->fetchRow($sql);
            $manager = $m_data['firstName'];
			
  	 	    $this->view->manager = $manager;

  	$qry = "select st.shiftIn, st.shiftOut, st.day from shifttiming st INNER JOIN shift s ON st.id = s.id";

  			$s_data = $db->fetchRow($qry);
  			 $s_in = $s_data['shiftIn'];
  			$s_out = $s_data['shiftOut'];
  			$s_day = $s_data['day'];
  	     
  	 	    $this->view->s_in = $s_in;
  	 	    $this->view->s_out = $s_out;
  	 	    $this->view->s_day = $s_day;


    }


}

