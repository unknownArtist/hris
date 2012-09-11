
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

//displaying employee's name
    $emp = new user_Model_Employee();
    $where = "users_id =". $users_id;
    $emp_data = $emp->fetchRow($where)->toArray(); 
    $this->view->name = $emp_data['firstName'];
//................end.....................

//displaying team's name
   $where ="ID =". $emp_data['teams_ID'];
   $teams = new user_Model_Teams();
   $t_data = $teams->fetchRow($where)->toArray(); 
   $this->view->team = $t_data['name'];
//.................end....................

//displaying Manager's name
    $db = Zend_Db::factory('Pdo_Mysql', array(
                'host'     => 'localhost',
                'username' => 'root',
                'password' => '',
                'dbname'   => 'hris'
            ));
 

    $sql = "select dm.employee_ID
            FROM
            employee e
            INNER JOIN departmentmanagers dm ON e.departments_id = dm.departments_id
            WHERE e.users_id =".$users_id;
             
			      $m_data = $db->fetchRow($sql);
            $manager = $m_data['employee_ID'];

    $sql2 = "select e.firstName
            FROM
            employee e
            INNER JOIN departmentmanagers dm ON e.ID = dm.employee_ID
            WHERE e.ID =".$manager;
		        
            $mgr_data = $db->fetchRow($sql2);
            $mngr = $mgr_data['firstName'];
  	 	      $this->view->mngr = $mngr;
    //...................end...............................

    //displaying shift

    $emp = new User_Model_Employee();
    $where = "users_id =". $users_id;
    $emp_data = $emp->fetchRow($where)->toArray(); 
    $this->view->name = $emp_data['firstName'];

  
 
 


    $sql = "select e.firstName from employee e INNER JOIN departmentmanagers dm ON e.departments_id = dm.departments_id Where e.users_id = ".$users_id;
             

			$m_data = $db->fetchRow($sql);
      $manager = $m_data['firstName'];
			
  	 	$this->view->manager = $manager;


  	$qry = "select st.shiftIn, st.shiftOut, st.day from shifttiming st INNER JOIN shift s ON st.id = s.id";

  			$s_data = $db->fetchRow($qry);
  			$s_in = $s_data['shiftIn'];

  			$s_out = $s_data['shiftOut'];
  			$s_day = $s_data['day'];

  			$s_out = $s_data['shiftOut'];
  			$s_day = $s_data['day'];

  	     
  	 	    $this->view->s_in = $s_in;
  	 	    $this->view->s_out = $s_out;
  	 	    $this->view->s_day = $s_day;

//.......................end.................................
        
//displaying current day and date
        $date = new Zend_Date(); 

        $date_format = $date->get('YYYY-MM-dd');
        $this->view->date_format = $date_format;
        $c_day = $date->get(Zend_Date::WEEKDAY);
        $this->view->day = $c_day;
        $this->view->date = $date_format;
//........................end..................................

//displaying announcements
        $ann = new user_Model_Announcements();
        $a_data = $ann->fetchAll($where = null,'id DESC','3 ,0')->toArray();
        $this->view->ann = $a_data;
//....................end......................................

//displaying punches
        $punches = new user_Model_Timekeeping();
        $p_data = $punches->fetchAll($where = null,'id DESC','7 ,0')->toArray(); //must be 7
        // $c_date = explode(" ",$p_data[0]['punchIn']);
        // $this->view->c_date = $c_date[0];
       
        $this->view->punch = $p_data;
    
 
//......................end....................................

    }

    public function insertAction(){
    $users_id = Zend_Auth::getInstance()->getIdentity()->id;
    
    $emp = new user_Model_Employee();
    $where = "users_id =". $users_id;
    $emp_data = $emp->fetchRow($where)->toArray(); 
    $emp_ID = $emp_data['ID'];
 
    $punches = new user_Model_Timekeeping();
    $dd = new Zend_Date();

      $data = array(
        "punchIn" => $dd->get('YYYY-MM-dd HH:mm:ss'),
        "employee_ID" => $emp_ID
         );
 
      $punches->insert($data);
      $this->_redirect('/user/index/');
}

public function updateloutAction(){
  
    $users_id = Zend_Auth::getInstance()->getIdentity()->id;
    
    $emp = new user_Model_Employee();
    $where = "users_id =". $users_id;
    $emp_data = $emp->fetchRow($where)->toArray(); 
    $emp_ID = $emp_data['ID'];
   
   $punches = new user_Model_Timekeeping();
   $p_data = $punches->fetchAll($where = "employee_ID=".$emp_ID,'id DESC','1 ,0')->toArray(); //must be 7
   $dd = new Zend_Date();

      $data = array(
        "lunchOut" => $dd->get('YYYY-MM-dd HH:mm:ss')
         );
    $where = "id = " . $p_data[0]['id'];
    $punches->update($data, $where);
    $this->_redirect('/User/index/');
}


    public function updatelinAction()
    {
        $users_id = Zend_Auth::getInstance()->getIdentity()->id;
        
        $emp = new user_Model_Employee();
        $where = "users_id =". $users_id;
        $emp_data = $emp->fetchRow($where)->toArray(); 
        $emp_ID = $emp_data['ID'];
       

       $punches = new user_Model_Timekeeping();
       $p_data = $punches->fetchAll($where = "employee_ID=".$emp_ID,'id DESC','1 ,0')->toArray(); //must be 7
       $dd = new Zend_Date();

          $data = array(
            "lunchIn" => $dd->get('YYYY-MM-dd HH:mm:ss')
             );
        $where = "id = " . $p_data[0]['id'];
        $punches->update($data, $where);
        $this->_redirect('/User/index/');
    }

    public function updatepoutAction()
    {
        $users_id = Zend_Auth::getInstance()->getIdentity()->id;
        
        $emp = new user_Model_Employee();
        $where = "users_id =". $users_id;
        $emp_data = $emp->fetchRow($where)->toArray(); 
        $emp_ID = $emp_data['ID'];
       
           $punches = new user_Model_Timekeeping();
           $p_data = $punches->fetchAll($where = "employee_ID=".$emp_ID,'id DESC','1 ,0')->toArray(); //must be 7
           $dd = new Zend_Date();

          $data = array(
            "punchOut" => $dd->get('YYYY-MM-dd HH:mm:ss')
             );
        $where = "id = " . $p_data[0]['id'];
        $punches->update($data, $where);
        $this->_redirect('/User/index/');

}

}

