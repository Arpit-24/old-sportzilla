<?php 
class Student
{

public function getStudentByRoom($room,$hostel)
{
$db=new Database;
$db->query("SELECT * FROM students WHERE room like :room AND hostel=:hostel");
$db->bind("room","%".$room."%");
$db->bind("hostel",$hostel);
$result=$db->resultset();
return $result;
}
public function getStudentById($id)
{
$db=new Database;
$db->query("SELECT * FROM students WHERE bits_id like :id");
$db->bind("id","%".$id."%");
$result=$db->resultset();
return $result;
}
public function getStudentByName($name)
{
$db=new Database;
$db->query("SELECT * FROM students WHERE name like :id ORDER BY name ASC");
$db->bind("id",'%'.$name.'%');
$result=$db->resultset();
return $result;
}
public function getHostelList()
{
	$db=new Database;
$db->query("SELECT DISTINCT hostel FROM students ");

$result=$db->resultset();
return $result;
}
public function getSupportersByType($hostel,$status)
{
$db=new Database;
$db->query("SELECT * FROM students WHERE status=:status AND hostel=:hostel ORDER BY room ASC");
$db->bind("status",$status);
$db->bind("hostel",$hostel);
$result=$db->resultset();
return $result;
}

}
?>