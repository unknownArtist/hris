<?php

class Admin_Model_Positions extends Zend_Db_Table_Abstract

{	
     protected $_name = "positions";

				public function getpositionList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}



}