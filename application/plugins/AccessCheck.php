<?php 

class Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract  
{
	public function preDispatch()
	{
		echo 'predispatch'; 
	}
}