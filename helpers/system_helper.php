<?php 
function redirect($page=FALSE,$message = NULL, $message_type = NULL)
{if(is_string($page)){
$location=$page;
}else {
	$location=$_SERVER['SCRIPT_NAME'];
}
if($message!=NULL)
{
$_SESSION['message']=$message;
}
//check for type
if($message_type !=NULL){
$_SESSION['message_type']=$message_type;
}

header('Location: '.$location."");
exit;

}

function curPage()
{return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
function isLoggedIn()
{if(!empty($_SESSION['user_id']))
{$db=new Database;
$db->query("SELECT username FROM admins WHERE id=:id");
$db->bind("id",$_SESSION['user_id']);
$result=$db->single();
$_SESSION['userName']=$result->username;

return true;}
else return false;}

function requiredFields($required,$array)
{$flag=true;
foreach($required as $field):
if($array[''.$field.'']==null||$array[''.$field.'']=="0"):
$flag=false;
endif;
endforeach;
return $flag;
}
?>
