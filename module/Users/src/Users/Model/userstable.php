<?php
namespace Users\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Common\Mvc\Model\AbstractModel;

class userstable extends AbstractTableGateway
{
    protected $table = '';
    protected $adapter;
    private $tableGateWay;

    public function __construct(Adapter $adapter) {
    	$this->adapter = $adapter;
    	$this->initialize ();
    }
    
    public function selectme()
    {
    	   $sel = new Sql($this->adapter);
    	   $s = $sel->select('users');
    	   $s->where(array('uid'=>1));
    	   //$s->from('users');
    	   $statement = $sel->prepareStatementForSqlObject($s);
    	   $comment = $statement->execute();
    	   $resultset = new ResultSet();
       $resultset->initialize($comment);
       $result = $resultset->toArray();
       print_R($result);
    	   
    	   
    }

    
    public function deleteme()
    {
    	 $sel=new Sql($this->adapter);
    	 $s = $sel->delete('users');
    	 $s->where(array('uid'=>2));
    	 $statement = $sel->prepareStatementForSqlObject($s);
    	 $comment=$statement->execute();
    	 
    }
    
    
    public function insertme($post) 
    {
        $sel= new Sql($this->adapter);
        $s=$sel->insert('users');
        $data=array(
            'fname'=>$post['fname'],
            'uname'=>$post['uname'],
            'lname'=>$post['lname'],
            'pword'=>md5($post['pword']),
            'email'=>$post['email']            
        );
        
        $s->values($data);
        $statement = $sel->prepareStatementForSqlObject($s);
        $comment = $statement->execute();
        
        
    }
    
	public function updatepassword($email)
	{
		$sel = new Sql($this->adapter);
		$s=$sel->update('users');
		$s->where(array('email'=>$email));
		$password=rand();
		$pword=md5($password);
		$data = array(
				'pword'=>$pword,
		);
		$s->set($data);
		$statement = $sel->prepareStatementForSqlObject($s);
		$comments = $statement->execute();

        return $password;
		
	}
	


}


/*
 *  $select = $sql->update();
 $select->table('basket');
 $select->set(array(
      'quantity' => new \Zend\Db\Sql\Expression("quantity - ".((int)$quantity))
 ));
 $select->where(array('basket_id'=>$basket_id));
 
 
 <?php
namespace Users\Model;
use Zend\Db\Sql\Sql;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\Adapter\Adapter;
use Common\Mvc\Model\AbstractModel;

class userstable extends AbstractModel
{

	public function insertme()
	{
		$sel = new Sql($this->adapter);
		$s = $sel->insert('users');
		$data = array(
				'fname'=>'fisdsds',
				'lname'=>'sdsdsdme',
				'email'=>'sdsdsds',
				'pword'=>'dsdsds'
		
		);
		$s->values($data);
		$statement = $sel->prepareStatementForSqlObject($s);
		$comments = $statement->execute();		
		$resultset = new ResultSet();
		$resultset->initialize($comments);
		$result = $resultset->toArray();
		//print_R($result);
		return $result;
	}


}
 * */