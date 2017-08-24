<?php

function formatDate($date)
{
$date=date('F j, Y, g:i a',strtotime($date));
return $date;
}
function urlFormat($str)
{//remove all white spaces
$str=preg_replace('/\s*/','',$str);
//to lowercase
$str=strtolower($str);
//url encoding
$str=urlencode($str);
return $str;

}
function is_active($category)
{
if(isset($_GET['category'])){
			if($_GET['category']==$category)
				{return 'active';
				}else 
				return '';
				}else if(!isset($_GET['category']))
				{
				return 'active';}
}
function secondsToTime($seconds) {
	$dtF = new DateTime("@0");
	$dtT = new DateTime("@$seconds");
	return $dtF->diff($dtT)->format('%a day/s, %h hour/s, %i min/s');
}

?>