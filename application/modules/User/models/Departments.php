<?php

class User_Model_Departments extends Zend_Db_Table_Abstract

{	
     protected $_name = "departments";
    public function getdepList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}


}
