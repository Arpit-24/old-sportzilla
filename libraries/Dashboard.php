<?php 
class Dashboard

{
	public function getAllStatistics()
	{
		$db=new Database;
		$db->query("SELECT COUNT('bits_id') as total,
			(SELECT COUNT(bits_id) FROM students WHERE status=1) as favour,
			(SELECT COUNT(bits_id) FROM students WHERE status=2) as against,
			(SELECT COUNT(bits_id) FROM students WHERE status=3) as neutral
		 FROM students ");
		return $db->single();
	}
	public function getHostelWiseStatistics($data)
	{
		$db=new Database;
		$db->query("SELECT COUNT('bits_id') as total,
			(SELECT COUNT(bits_id) FROM students WHERE status=1 AND hostel=:hostel) as favour,
			(SELECT COUNT(bits_id) FROM students WHERE status=2 AND hostel=:hostel) as against,
			(SELECT COUNT(bits_id) FROM students WHERE status=3 AND hostel=:hostel) as neutral
		 FROM students WHERE hostel=:hostel");
		$db->bind("hostel",$data);
		return $db->single();
	}
}


?>