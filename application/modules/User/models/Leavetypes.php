<?php

class User_Model_Leavetypes extends Zend_Db_Table_Abstract

{	
     protected $_name = "leavetypes";

				public function getLeaveList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}



}