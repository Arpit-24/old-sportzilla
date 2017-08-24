<?php 
require("core/init.php");
if(!empty($_SESSION['access_token']))
{
if(!empty($_REQUEST['tag']))
{
	switch($_REQUEST['tag'])
	{
		case 'leaderBoard':
		{
			$user=new User;
			$question=new Questions;
			$startTime=strtotime($question->getEventStartTime()->game_start_time);
			$result=$user->leaderBoard();
			$i=1;
			foreach ($result as $value) {
				$name="Anonymous";
				if(!empty($value->name))
					$name=$value->name;
					$time=strtotime($value->last_solved);
					$completed_time=$time-$startTime;
					$completed_time=secondsToTime($completed_time);
			echo '<tr><td>'.$i.'</td><td>'.$value->email_id.'</td><td style="text-align:right;padding:right:5px;">'.$value->score.'</td><td style="text-align:right;">'.($value->question).'</td><td style="padding-left:30px;">'.$completed_time.'</td></tr>';	
			$i++;
			}
		}
		break;
		case 'place_order':
		{
			$products=new Products;
			$products->placeOrder($_REQUEST["product_id"],$_POST['group']);
		}
		break;
	}
}
}

?>