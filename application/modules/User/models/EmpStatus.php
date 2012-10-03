<?php

class User_Model_EmpStatus extends Zend_Db_Table_Abstract

{	
     protected $_name = "epmloyeestatus";

				public function getstatusList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}



}