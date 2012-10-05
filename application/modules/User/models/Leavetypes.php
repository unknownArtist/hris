<<<<<<< HEAD
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



=======
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



>>>>>>> 93bfdfc0eb5847a6b45355af39407eae41fdaf76
}