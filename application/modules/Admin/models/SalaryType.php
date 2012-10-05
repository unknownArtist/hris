<?php

class Admin_Model_SalaryType extends Zend_Db_Table_Abstract

{	
     protected $_name = "employeesalarytype";

				public function getsalaryList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}



}