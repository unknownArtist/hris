<?php

class User_Model_Teams extends Zend_Db_Table_Abstract

{	
      protected $_name = "teams";

				public function getTeamList()

				{

				$select  = $this->_db->select()

				             ->from($this->_name,

				array('key' => 'ID','value' => 'name'));

				$result = $this->getAdapter()->fetchAll($select);

				return $result;

				}


}
