<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Users for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Users\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Users\Model\userstable;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;
use Zend\Authentication\Result as Result;
use Users\Form\LoginForm;
use Zend\Validator\Db\RecordExists as checkme;


class UsersController extends AbstractActionController
{
    public function indexAction()
    {

        $auth = new AuthenticationService();        
        $identity = null;
        if ($auth->hasIdentity()) {
        	// Identity exists; get it
        	$identity = $auth->getIdentity();
        }
        $this->layout('layout/index');
        $this->layout()->identity = $identity;
        return array(
        		'identity' => $identity,
        );
        

    }

    public function registerAction()
    {
        $this->layout('layout/index');
        $request = $this->getRequest();
        $umessage = '';
        $pmessage = '';
        $fmessage = '';
        $lmessage = '';
        $emessage = '';
        $post = $request->getPost();
        $this->db =$this->getServiceLocator()->get('db');
        if ($request->isPost()) 
        {
            if($_POST['uname']=='' || $_POST['pword']=='' || $_POST['fname']=='' || $_POST['lname']=='' || $_POST['email']=='')            
            {
                if($_POST['uname']=='')
                {
                	$umessage='username cant not be blank';
                }              
                if($_POST['pword']=='')
                {
                	$pmessage='password can not be blank';
                }
                if($_POST['fname']=='')
                {
                	$fmessage='First Name can not be blank';
                }
                if($_POST['lname']=='')
                {
                	$lmessage='Last Name can not be blank';
                }
                if($_POST['email']=='')
                {
                	$emessage='Email can not be blank';
                }
                return array('umessage'=>$umessage,'pmessage'=>$pmessage,'fmessage'=>$fmessage,'lmessage'=>$lmessage,'emessage'=>$emessage);
            
            }

            else{
                
                if($_POST['uname']!='' || $_POST['email']!='' || $_POST['pword']!='')
                {
                    	$uvalidator = new checkme(array(
                    			'table' => 'users',
                    			'field' => 'uname',
                    			'adapter' => $this->db
                    	)
                    	);
                    	
                    	$evalidator = new checkme(array(
                    			'table' => 'users',
                    			'field' => 'email',
                    			'adapter' => $this->db
                    	)
                    	);
                    	 
                    	if ($uvalidator->isValid($_POST['uname'])) {
                    		 
                    		$umessage='username already exists in database';
                    		return array('umessage'=>$umessage);
                    	}
                    	if ($evalidator->isValid($_POST['email'])) {
                    		 
                    		$emessage='Email Id already exists in database';
                    		return array('emessage'=>$emessage);
                    	}
                    	
                    	if(!preg_match('/^[0-9A-Za-z!@#$%]{8,12}$/', $_POST['pword']))
                    	{
                    		$pmessage='Password must be 8-12 charcters';
                    		return array('pmessage'=>$pmessage);
                    	}
                    	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    	{
                    	    $emessage='Email address is not valid';
                    	    return array('emessage'=>$emessage);
                    	    
                    	}
                    	
                    	else {
                    	    $result = new userstable($this->db);
                    	    $result->insertme($_POST);
                    	    return $this->redirect()->toRoute('users',array('action'=>'login'));
                    		
                    	}
                    
                }
                
            

              } 

        }
        return array();
    }
    
    public function loginAction()
    {
        $identity = '';
        

        $form = new LoginForm();
        $request = $this->getRequest();
        if ($request->isPost()) {
            
            $post = $request->getPost();
            
          if($post->get('uname')!='')
          {

            // get the db adapter
            	$this->db =$this->getServiceLocator()->get('db');
            
            // create auth adapter
            $authAdapter = new AuthAdapter($this->db);
            
            // configure auth adapter
            $authAdapter->setTableName('users')
            ->setIdentityColumn('uname')
            ->setCredentialColumn('pword');
            
            // pass authentication information to auth adapter
            $authAdapter->setIdentity($post->get('uname'))
            ->setCredential(md5($post->get('pword')));
            
            // create auth service and set adapter
            // auth services provides storage after authenticate
            $authService = new AuthenticationService();
            $authService->setAdapter($authAdapter);
            
            // authenticate
            $result = $authService->authenticate();
            
            // check if authentication was successful
            // if authentication was successful, user information is stored automatically by adapter
            if ($result->isValid()) {
            	// redirect to user index page
            	return $this->redirect()->toRoute('users');
            //	echo $identity;

                } else {
            	switch ($result->getCode()) {
            		case Result::FAILURE_IDENTITY_NOT_FOUND:
            		    echo '<div class="unameerror">user name not valid dude</div>';
            			/** do stuff for nonexistent identity * */
            			break;
            
            		case Result::FAILURE_CREDENTIAL_INVALID:
            		    echo '<div class="pworderror">password incorrect</div>';
            			/** do stuff for invalid credential * */
            			break;
            
            		case Result::SUCCESS:
            		    echo '<div class="error">login successfull</div>';
            			/** do stuff for successful authentication * */
            			break;
            
  
                    	}
                    	
                }
        }
            }
            $this->layout('layout/index');
            return array('form' => $form);

        }

    public function logoutAction()
    {
        $this->layout('layout/index');
        	$auth = new AuthenticationService();
        	$auth->clearIdentity();
        
        	return $this->redirect()->toRoute('users');
    }
    
    public function forgotAction()
    {
        $this->layout('layout/index');
        $request = $this->getRequest();
        $this->db =$this->getServiceLocator()->get('db');
        if ($request->isPost()) {
            if($_POST['email']=='')
            {
                $fpmessage='Email Address Can not be blank';
                return array('fpmessage'=>$fpmessage);
            }
            elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $fpmessage='Enter Valid Email Address';
                return array('fpmessage'=>$fpmessage);
            }
            else
            {
                $evalidator = new checkme(array(
                		'table' => 'users',
                		'field' => 'email',
                		'adapter' => $this->db
                )
                );
                
                if ($evalidator->isValid($_POST['email'])) {
                	 
                    $result = new userstable($this->db);
                    $password = $result->updatepassword($_POST['email']);
                 
                 
                    return array('password'=>$password);                    
                	
                }
                else 
                {
                    $fpmessage='Your Email Address is not listed in Our DataBase Please register';
                    return array('fpmessage'=>$fpmessage);
                	
                }
                
            	
            }
        }
    	   return array();
    }
        
    public function logedinAction()
    {
    	 
    print_R($_POST);
    $this->layout('layout/index');
    	return array();

    }
    

    
}
