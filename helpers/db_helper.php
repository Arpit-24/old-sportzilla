<?php 

function totUsers()
{
$db=new Database;
$db->query("SELECT * FROM users");
$db->resultset();
return $db->rowCount();
}


function fieldExists($table,$field,$value)
{$db=new Database;
$db->query("SELECT * FROM `".$table."` WHERE `".$field."` =:value");
$db->bind(":value",$value);
$db->resultset();
if(($db->rowCount())==0)
return false;
else if(($db->rowCount())==1)
return true;
}
function getReply($topic_id,$user_id=null)
{$db=new Database;
	if($user_id!=null)
	{
		$db->query("SELECT body,create_date FROM replies WHERE topic_id=:topic AND user_id=:user");
		$db->bind(":user",$user_id);
	}else if($user_id==null)
	{
		$db->query("SELECT body,create_date FROM replies WHERE topic_id=:topic ");
	}
	$db->bind(":topic",$topic_id);
	return $db->single();
	 
}

function getlastid($table)
{
	$db=new Database;
	$db->query("SELECT id FROM `".$table."` ORDER BY id DESC");
	$r=$db->single();
	return $r->id;
}
function notify_number()
{
	$u_id=$_SESSION['user_id'];
		$db=new Database;
		$db->query("SELECT DISTINCT  body,link FROM notifications WHERE u_id=:u_id AND seen='0' AND hide='0' AND u_id!=from_id");
		$db->bind("u_id",$u_id);
		$r=$db->resultset();
		if($db->rowCount()) return $db->rowCount();
}
function stats()
{
	$db=new Database;
	$db->query("SELECT SUM(vote) as result,users.id,users.name,users.username,users.about,users.email,users.avatar FROM upvotes INNER JOIN users ON upvotes.v_for=users.id GROUP BY upvotes.v_for  ORDER BY result DESC");
	return $db->single();
}

?>