<?php

class User_Model_Shift extends Zend_Db_Table_Abstract

{	
     protected $_name = "shift";
     public function getshiftList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'id','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}
}

