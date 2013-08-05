<?php
namespace Users\Form;
use Zend\Form\Form;

class LoginForm extends Form
{
	public function __construct($name = null)
	{
		parent::__construct('login');
		$this->setAttribute('method', 'post');
		$this->add(array('name'=>'uname','attributes'=>array('type'=>'text',),
		    'options'=>array('label'=>'UserName:'),
		));
		
		$this->add(array('name'=>'pword','attributes'=>array('type'=>'password',),
		    'options'=>array('label'=>'Password:'),
		));
		
		$this->add(array('name'=>'submit','attributes'=>array('type'=>'submit',
		'value'=>'submit','id'=>'submitbutton',)  
		));
	}
    
}
