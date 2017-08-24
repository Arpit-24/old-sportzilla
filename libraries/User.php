<?php
class User
{
	private $user;
	private function setUserSession()
{
			
		$_SESSION['user_id']=$this->user->id;
		$_SESSION['userName']=$this->user->userName;
		$_SESSION['lastActivity']=$this->user->last_activity;
		$_SESSION['ip']=$this->user->ip;
		if(!empty($_SESSION['user_id'])&&!empty($_SESSION['username']))
		{return true;}else return false;
}

	/*public function doLogin($email)
	{
		$year=substr($email,1,4);
		$id_no=substr($email,5,3);
		$db=new Database;
		$db->query("SELECT * FROM students WHERE bits_id LIKE :username");
		$db->bind("username",$year."____".$id_no);
		$_SESSION['user']=$db->single();
	
}*/
public function getPoints($user)
{
	$db=new Database;
	$db->query("SELECT score FROM users WHERE id=:id");
	$db->bind("id",$user);
	return $db->single();
}
public function leaderBoard()
{
	$db=new Database;
	$db->query("SELECT name,(question-skips) solved,last_solved,score,skips,question,email_id FROM users ORDER BY score DESC,solved DESC, last_solved ASC");
	$result=$db->resultset();
	return $result;
}
public function stats($user)
{
	$db=new Database;
	$db->query("SELECT * FROM users WHERE id=:id");
	$db->bind("id",$user);
	$result=$db->single();
	return $result;
}
}

?>