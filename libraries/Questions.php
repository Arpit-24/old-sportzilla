<?php 
class Questions
{
	
	public function getQuestion($id)
	{
		$db=new Database;
		$db->query("SELECT * FROM questions WHERE id=:id");
		$db->bind("id",$id);
		$result=$db->single();
		return $result;
	}
	public function validate($user,$id,$answer)
	{
		$db=new Database;
		$db->query("SELECT * FROM answers WHERE q_id=:id AND answer=:answer");
		$db->bind("id",$id);
		$db->bind("answer",$answer);
		$result=$db->resultset();
		if($result)
			{ 
				$time=date("Y-m-d H:i:s",time());
				$db->query("UPDATE users SET question=question+1,last_solved=:time WHERE id=:user");
				$db->bind("user",$user);
				$db->bind("time",$time);
				if($db->execute())
					$this->changePoints($user,100,true);
				return true;
			}
		else 
			return false;
	}
	/*public function getHint($id,$n)
	{
		$db->query("SELECT FROM hints WHERE q_id=:id ");
	}*/
	public function isQuestionPresent($question)
	{
		$db=new Database();
		$db->query("SELECT * FROM questions WHERE id=:id");
		$db->bind("id",$question);
		$result=$db->single();
		if(!empty($result))
			return true;
		else 
			return false;
	}
	public function gameCompleted()
	{
		$db=new Database;
		$db->query("SELECT game_complete FROM flags WHERE 1");
		$result=$db->single();
		
		if($result->game_complete==1)
			return true;
		else 
			return false;
	}
	public function gamePaused()
	{
		$db=new Database;
		$db->query("SELECT game_paused FROM flags WHERE 1");
		$result=$db->single();
		
		if($result->game_paused==1)
			return true;
		else 
			return false;
	}
	public function getCurrentQuestion()
	{
		session_start();
		return $_SESSION['question'];
	}
	public function changePoints($user,$points,$add=true)
	{
		$db=new Database;

		if($add)
			$db->query("UPDATE users SET score=score + :score WHERE id=:id");
		else if(!$add)
			$db->query("UPDATE users SET score=score - :score WHERE id=:id");
		$db->bind("score",$points);
		$db->bind("id",$user);
		if($db->execute())
			return true;
		else 
			return false;

	}
	public function getEventStartTime()
	{
		$db=new Database;
		$db->query("SELECT game_start_time FROM flags WHERE id=1");
		$result=$db->single();
		return $result;
	}
	public function skipsLeft($user)
	{
		$db=new Database;
		$db->query("SELECT skips FROM flags WHERE 1");
		$totalSkips=$db->single()->skips;
		//$totalSkips=0;
		$db->query("SELECT skips FROM users WHERE id=:id");
		$db->bind("id",$user);
		$skipsUsed=$db->single()->skips;
		//$skipsUsed=0;
		return $totalSkips-$skipsUsed;
	}
	public function skipQuestion($question,$user)
	{
		$db=new Database;
		
		//if($this->isQuestionPresent($this->getCurrentQuestion())  )
		{
		if($this->skipsLeft($user) > 0):
		$db->query("UPDATE users SET question=question+1,skips=skips+1 WHERE id=:id");
		$db->bind("id",$user);
		if($db->execute())
			{
				$this->changePoints($user,50,false);
				return true;
			}
		else 
			return false;
		else: return false;endif;}
		
	}
	public function setGameComplete($user)
	{
		$db=new Database;
		$db->query("UPDATE users SET game_complete=1 WHERE id=:id");
		$db->bind("id",$user);
		if($db->execute())
			return true;
		else
			return false;
	}
	public function setQuestion()
	{
		$db=new Database;
		session_start();
		$db->query("SELECT question FROM users WHERE id=:id");
		$db->bind("id",$_SESSION['id']);
		$result=$db->single();
		$_SESSION['question']=($result->question)+1;
	}
}
?>