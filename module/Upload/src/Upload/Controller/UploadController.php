<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Upload for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Upload\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Upload\Model\uploadtable;
use Zend\Mvc\Controller\Plugin\Layout;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result as Result;
class UploadController extends AbstractActionController
{
    public function indexAction()
    {
        
        $auth = new AuthenticationService();
        $identity = null;
        if ($auth->hasIdentity()) {
        	// Identity exists; get it
        	$identity = $auth->getIdentity();
        }
        
        $this->layout()->identity = $identity;
        $this->layout('layout/index');
        if ($auth->hasIdentity())
        {
     	return array('identity' => $identity,);
        }
        else{

        	return $this->redirect()->toRoute('users');
        
        }

    }

    public function uploadedAction()
    {  
        $this->db =$this->getServiceLocator()->get('db');
        $result = new uploadtable($this->db);
        $result->insertme($_GET['user'],$_FILES['file']['name'],$_FILES['file']['size']);
    	    return array();
    }
    
    public function downloadAction()
    {
        $auth = new AuthenticationService();
        $identity = null;
        if ($auth->hasIdentity()) {
        	$identity = $auth->getIdentity();
        }
        $this->layout()->identity = $identity;
        $this->layout('layout/index');
        
        if ($auth->hasIdentity())
        {
            $this->db = $this->getServiceLocator()->get('db');
            $result = new uploadtable($this->db);
            $result = $result->displayme();

        	return array('result'=>$result,'identity' => $identity);
        }
        else{
        
        	return $this->redirect()->toRoute('users');
        
        }
    }  
    
    public function manageAction()
    {
        
        $auth = new AuthenticationService();
        $identity = null;
        if ($auth->hasIdentity()) {
        	$identity = $auth->getIdentity();
        }
        $this->layout()->identity = $identity;
        $this->layout('layout/index');
        
        if ($auth->hasIdentity())
        {
        	$this->db = $this->getServiceLocator()->get('db');
        	$result = new uploadtable($this->db);
        	$result = $result->manageme($identity);
        
        	return array('result'=>$result,'identity' => $identity);
        }
        else{
        
        	return $this->redirect()->toRoute('users');
        
        }
        
    	
    }


    public function deleteAction()
    {
        $this->db =$this->getServiceLocator()->get('db');
        $result = new uploadtable($this->db);
        $message=$result->updateme($_POST['uploaded']);
        return $this->redirect()->toRoute('Upload',array('action'=>'manage'));
    }
}
