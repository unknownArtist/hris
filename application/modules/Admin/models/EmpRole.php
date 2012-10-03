<?php

class Admin_Model_EmpRole extends Zend_Db_Table_Abstract

{	
     protected $_name = "emprole";

				public function getroleList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}



}