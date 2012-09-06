<?php

class Dashboard_IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
       

    }

    public function indexAction()
    {

       
         $members = new Dashboard_Model_Login();

         $form = new Dashboard_Form_Login();
         $this->view->form = $form;
         $authAdapter = $this->getAuthAdapter();
         if ($this->getRequest()->isPost()) 
            {
                $formData = $this->getRequest()->getPost();
                
                if ($form->isValid($formData)) 
                {
                
                    $user    = $form->getValue('userName');
                    $password = $form->getValue('password');
                    
                         $authAdapter->setIdentity($user)
                                     ->setCredential($password);
                
                    $auth = Zend_Auth::getInstance();
                    $result = $auth->authenticate($authAdapter);
                 
                             if($result->isValid())
                               {
                                   $auth->getStorage()->write($authAdapter->getResultRowObject(array('id', 'userName','role')));
                                   $this->_redirect('user');
                               }
                               else
                                {
                                   $form->populate($formData);
                                   $this->view->SignInError = "Invalid Username or Password";
                                }        
            }else
            {
                $form->populate($formData);
            }

        }
      


    }

    private function getAuthAdapter()
    {
        $auth = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $auth->setTableName('users')
             ->setIdentityColumn('userName')
             ->setCredentialColumn('password');
        
        return $auth;
    }


    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('Dashboard');
    }


}



