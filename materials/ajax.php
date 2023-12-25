<?php
if(isset($_POST['answer']) && isset($_POST['id']) && isset($_POST['type']))
{
	$answer=addslashes(str_replace('"', '', $_POST['answer']));
	$id = $_POST['id'];
	$type = $_POST['type'];
	echo shell_exec('python ex.py "'.$id.'" "'.$type.'" "'.$answer.'" ');
}
if(isset($_POST['answer1']) && isset($_POST['id1']) && isset($_POST['type1']))
{
	$answer=addslashes(str_replace('"', '', $_POST['answer1']));
	$id = $_POST['id1'];
	$type = $_POST['type1'];
	// echo $answer . $id . $type;
	echo shell_exec('python ex.py '.$id.' "'.$type.'" "'.$answer.'" ');
}
?>