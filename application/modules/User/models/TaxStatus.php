<?php

class User_Model_TaxStatus extends Zend_Db_Table_Abstract

{	
     protected $_name = "employeetaxstatus";

				public function getEmpStatusList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}



}