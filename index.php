<?php 

require("core/init.php");

if(!empty($_SESSION['access_token']))
{
$db=new Database;
$user=new User;
// $_SESSION['question']=1;
$question=new Questions;

if(!empty($_POST['answer']))
if($question->validate($_SESSION['id'],$_SESSION['question'],$_POST['answer']))
	{
		$question->setQuestion();
		header('Location:index.php');
	}
if(!empty($_REQUEST['skip']) && $_REQUEST['skip']==true)
	{
		if($question->isQuestionPresent($_SESSION['question'])&&!($question->gameCompleted)&&!($question->gamePaused))
		$question->skipQuestion($_SESSION['question'],$_SESSION['id']);
		$question->setQuestion();
		header('Location:index.php');
	}

$template=new Template("templates/index.php");


if($question->gameCompleted())
$template=new Template("templates/completed.php");
else 
if(!($question->isQuestionPresent($_SESSION['question']))|| $question->gamePaused())
$template=new Template("templates/paused.php");
$template->event_start_time=$question->getEventStartTime();
$template->stats=$user->stats($_SESSION['id']);
$template->points=$user->getPoints($_SESSION['id']);
$template->questionBody=$question->getQuestion($_SESSION['question']);
$template->leaderBoard=$user->leaderBoard();
$template->skipsLeft=$question->skipsLeft($_SESSION['id']);

echo $template;
}
else
{
session_destroy();
header("Location:login.php");
}


?>