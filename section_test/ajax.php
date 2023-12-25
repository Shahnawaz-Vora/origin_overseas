<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../student/auth_login.php");
    }
    include_once '../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
error_reporting(0);
//for store recording
if (isset($_FILES['recordedAudio1']))
{
$input = $_FILES['recordedAudio1']['tmp_name'];
$output = time().'.mp3';
$desination = "temp/".time().'.mp3';
move_uploaded_file($input, $desination);
echo $output;
}

//for speaking section
if(isset($_POST['que']) && isset($_POST['test_no']))
{
	$student_id = $_COOKIE['studentId'];
	$audio = $_POST['audio'];
	if(isset($_POST['remaining_time']))
	{
		$remaining_time = $_POST['remaining_time'];
	}
	$type = 'read-aloud';
	$section= 'speaking';
	$test_no = $_POST['test_no'];
	$question = $_POST['que'];
	$modify_date = date("Y/m/d");
	if($audio == "" || $audio == null)
	{
		$question_attempt = 0;
	}
	else
	{
		$question_attempt = 1;	
	}
	if ($question > 7 && $question <=17)
	{
		$type = 'repeat-sentence';
	}
	if($question > 17 && $question <=24)
	{
		$type = 'describe-image';
	}
	if($question > 24 && $question <= 28)
	{
		$type = 're-tell-lecture';
	}
	if($question > 28 && $question <= 38)
	{
		$type = 'answer-short-question';
	}
	$sql = "insert into section_user_test(studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date) values ('$student_id','$test_no','speaking','$type','$question','$question_attempt','$audio','$remaining_time','$modify_date')";
	$run = mysqli_query($conn,$sql);
		if($run == true)
		{
			$q = $question+1;

			//read a loud
			if($q > 0 && $q <=7)
			{
				rename("temp/".$audio , "../database/audio/".$audio);
				$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='$section'";
		 	    $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	    	echo stripslashes($row['questionText']);
		 	    }
		 	}

		 	//repeat sentence
		 	if($q > 7 && $q <= 17)
		 	{
		 		$q = $q-7;
		 		$type = 'repeat-sentence';
		 		rename("temp/".$audio , "../database/audio/".$audio);
				$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='$section'";
		 	    $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	    	echo  $row['audio'];
		 	    }
		 	}

		 	//describe-image
		 	if($q > 17 && $q <= 24)
		 	{
		 		$q = $q-17;
				$type = 'describe-image';
				rename("temp/".$audio , "../database/audio/".$audio);
				$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='$section'";
		 	    $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	    	echo  $row['image'];
		 	    }
		 	}

		 	//re-tell-lecture
		 	if($q > 24 && $q <=28)
		 	{
		 		$q = $q-24;
				$type = 're-tell-lecture'; 
				rename("temp/".$audio , "../database/audio/".$audio);
				$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='$section'";
		 	    $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);
		 	    	if(file_exists("../database/audio/".$row['audio']))
		 	    	{
		 	    		echo json_encode(
					      	array("type" => "audio", 
					      	"data" => $row['audio'])
					 	);
		 	    	}
		 	    	if(file_exists("../database/video/".$row['audio']))
		 	    	{
		 	    		echo json_encode(
					      	array("type" => "video", 
					      	"data" => $row['audio'])
					 	);
		 	    	}
		 	    }
		 	}

		 	//short-question
		 	if($q > 28 && $q <= 38)
		 	{
		 		$q = $q-28;
				 $type = 'answer-short-question';
		 		rename("temp/".$audio , "../database/audio/".$audio);
				$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='$section'";
		 	    $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	    	echo  $row['audio'];
		 	    }
		 	}
		} 
}


//writing and reading section

if(isset($_POST['summarize_writing_que']) && isset($_POST['type']) && isset($_POST['test_no']) || isset($_POST['answer']))
{
	$remaining_time= $_POST['remaining_time'];
	$student_id = $_COOKIE['studentId'];
	$question = mysqli_real_escape_string($conn,$_POST['summarize_writing_que']);
	$type= mysqli_real_escape_string($conn,$_POST['type']);
	$test_no = mysqli_real_escape_string($conn,$_POST['test_no']);
	if(isset($_POST['marks']))
	{
		$marks = $_POST['marks'];
	}
	if(isset($_POST['section']))
    {
    	$section = $_POST['section'];
    }
	if($section == "reading")
	{
		if($question>=5 && $question<=18)
		{
			$answer = $_POST['answer'];
		}
		else
		{
			$answer = ltrim(addslashes(mysqli_real_escape_string($conn, $_POST['answer'])));
		}
	}
	else if($section == "listening")
	{
		if($question>=6 && $question<=8 || $question>=15 && $question<=17)
		{
			$answer = $_POST['answer'];	
		}
		else
		{
			$answer = ltrim(addslashes(mysqli_real_escape_string($conn, $_POST['answer'])));
		}
	}
	// if($question>=47 && $question<=60 || $question>=66 && $question<=68 || $question>=75 && $question<=77)
	// {
	// 	$answer = $_POST['answer'];
	// }
	// else
	// {
	// 	$answer = ltrim(addslashes(mysqli_real_escape_string($conn, $_POST['answer'])));
	// }
	$modify_date = date("Y/m/d");

	if($answer == null || $answer == "")
    {
        $question_attempt = 0;
    }
    else
    {
        $question_attempt = 1;
    }

    //summarize-written-text
    
    if($section == "writing")
    {
    	if($question >=1 && $question <=3)
	    {
	    	if(isset($_POST['word_count']))
			{
				$word_count = $_POST['word_count'];
			}else
			{
				$word_count=0;
			}
		    $sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,word_count) values ('$student_id','$test_no','writing','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$word_count')";
		    $run = mysqli_query($conn, $sql);
		    if ($sql == true) {
		        $q = $question;
		        $q = $q+1;
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='writing'";
		        $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	    	echo  stripslashes($row['questionText']);
		 	    }
			}
		}
		//essay
		if($question == 4)
		{
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,word_count) values ('$student_id','$test_no','writing','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$word_count')";
			$run = mysqli_query($conn, $sql);
		}		
    }
    
    else if($section =="reading")
    {
		//single-answer
		if($question >= 1 && $question <= 2)
		{
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','reading','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			
			$run = mysqli_query($conn, $sql);
			if ($sql == true) {
		        $q = $question;
		        $q = $q+1;
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='reading'";
				$run = mysqli_query($conn,$sql);
				
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	 		$reading_question = stripslashes($row['question']);
		 	 		$reading_questionText = stripslashes($row['questionText']);
		 	 		$array1 = array($reading_question,$reading_questionText);
		 	 		$count = 0;
		 	 		$array2 = [];
		 	 		$k=0;
		 	 		$arry=(object)[];
		 	 		$arry->question=$reading_question;
	 				$arry->questiontext=$reading_questionText;
		 	 		for($i=1;$i<=8;$i++)
		 	 		{
		 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
		 	 			{
		 	 				$k += 1;
		 	 				$inc='option'.$k;
		 	 				$arry-> $inc= $row['option'.$i];
		 	 			}
		 	 		}
		 	 		$arry->c=$k;
	 				$json_data = json_encode($arry);
	 				echo $json_data;
		 	    }
			}
		}

		//multiple answers
		if($question>=3 && $question<=4)
		{
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','reading','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn, $sql);
			if ($sql == true) {
		        $q = $question - 2; //1
		        $q = $q+1; //2
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='reading'";
		        $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	 		$reading_question = stripslashes($row['question']);
		 	 		$reading_questionText = stripslashes($row['questionText']);
		 	 		$array1 = array($reading_question,$reading_questionText);
		 	 		$count = 0;
		 	 		$array2 = [];
		 	 		$k=0;
		 	 		$arry=(object)[];
		 	 		$arry->question=$reading_question;
	 				$arry->questiontext=$reading_questionText;
		 	 		for($i=1;$i<=8;$i++)
		 	 		{
		 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
		 	 			{
		 	 				$k += 1;
		 	 				$inc='option'.$k;
		 	 				$arry-> $inc= $row['option'.$i];
		 	 			}
		 	 		}
		 	 		$arry->c=$k;
	 				$json_data = json_encode($arry);
	 				echo $json_data;
		 	    }
			}
		}
		// reorder rparagraph 
		if($question>=5 && $question<=7)
		{
			if($answer != "")
			{
				$answer = implode("/*/", $answer);
			}
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','reading','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn, $sql);
			if ($run == true) {
		        $q = $question - 4;
		        $q = $q+1;
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='reading'";
		        $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	 		$count = 0;
		 	 		$array2 = [];
		 	 		$k=0;
		 	 		$arry=(object)[];
		 	 		for($i=1;$i<=8;$i++)
		 	 		{
		 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
		 	 			{
		 	 				$k += 1;
		 	 				$inc='option'.$k;
		 	 				$arry-> $inc= $row['option'.$i];
		 	 			}
					  }
					$ans = $row['answer'];
					$arry->ans=$ans;
		 	 		$arry->c=$k;
	 				$json_data = json_encode($arry);
	 				echo $json_data;
		 	    }
			}
		}

		// reading fill the blnk
		if($question>=8 && $question<=12)
		{
			if($answer != "")
			{
				$answer = implode("/*/", $answer);
			}
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','reading','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn, $sql);
			if ($run == true) 
			{
		        $q = $question - 7;
		        $q = $q+1;
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='reading'";
		        $run = mysqli_query($conn,$sql);
		        
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);
		 	    	$reading_questionText = stripslashes($row['questionText']);
		 	 		$count = 0;
		 	 		$array2 = [];
		 	 		$k=0;
		 	 		$arry=(object)[];
		 	 		$arry->questiontext=$reading_questionText;	
		 	 		for($i=1;$i<=8;$i++)
		 	 		{
		 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
		 	 			{
		 	 				$k += 1;
		 	 				$inc='option'.$k;
		 	 				$arry-> $inc= $row['option'.$i];
		 	 			}
		 	 		}
		 	 		$ind = 0;
		 	 		$trueAns = [];
		 	 		$ans="";
	                $answr =explode('/*/', $row["answer"]);
	                for ($i = 0; $i < count($answr); $i++) {
						$j=$i+1;
	                    if ($answr[$i] != '' && $answr[$i] != ' ' && $answr[$i] !=null) {
	                        $ind = $answr[$i]-1;
	                        // $ans .= $row["option".$j]."/*/";
	                        array_push($trueAns[$ind],$row["option".$j]);
	                    }
	                }
	                $answr =implode('/*/', $trueAns);
	                $answr = $row["answer"];
		 	 		$arry->answr=$answr;
		 	 		$arry->c=$k;
	 				$json_data = json_encode($arry);
	 				echo $json_data;
		 	    }
			}
		}

		//reading writing fill
		if($question>=13 && $question<=18)
		{
			if($answer != "")
			{
				$answer = implode("/*/", $answer);
			}
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','reading','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn, $sql);
			if ($run == true) 
			{
		        $q = $question - 12;
		        $q = $q+1;
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='reading'";
		        $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);
		 	    	$reading_questionText = stripslashes($row['questionText']);
		 	 		$count = 0;
		 	 		$array2 = [];
		 	 		$k=0;
		 	 		$arry=(object)[];
		 	 		$arry->questiontext=$reading_questionText;	
		 	 		for($i=1;$i<=8;$i++)
		 	 		{
		 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
		 	 			{
		 	 				$k += 1;
		 	 				$opt = explode("/*/",$row['option'.$i]);
		 	 				for($j=1;$j<=count($opt);$j++)
		 	 				{
		 	 					$dec = $j-1;
		 	 					$inr='option'.$i.$j;
			 	 				$arry-> $inr=$opt[$dec] ;
		 	 				}
		 	 				$inc = 'option'.$i;
		 	 				$arry->$inc=count($opt);
		 	 			}
		 	 		}
		 	 		$arry->ans=$row['answer'];
		 	 		$arry->c=$k;
	 				$json_data = json_encode($arry);
	 				echo $json_data;
		 	    }
			}
		}
    }
	

    if($section == "listening")
    {
		//listening summarize text
		if($question>=1 && $question<=3)
		{
			if(isset($_POST['word_count']))
			{
				$word_count = $_POST['word_count'];
			}else
			{
				$word_count=0;
			}
		 	$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,remaining_time,answer,word_count,modify_date) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$remaining_time','$answer','$word_count','$modify_date')";
		 	$run = mysqli_query($conn, $sql);
		 	//multiple-answer
		 	if($question== 3)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="multiple-answers";
			        $q = $question - 3;
			        $q = $q+1;
			       $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$reading_question = stripslashes($row['question']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->question=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
			 	 		$arry->c=$k;
			 	 		$arry->ans=$row['answer'];
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		 	//summarize-spoken text
		 	else
		 	{
		 		if ($run == true) 
		 		{
			        $q = $question;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	    	echo $row['audio'];
			 	    }
				}
		 	}
		}
		//listening multiple
		if($question>=4 && $question<=5)
		{
			//multiple insert
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn,$sql);
			//fill-in-the blanks
			if($question== 5)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="fill-in-the-blanks";
			        $q = $question - 5;
			        $q = $q+1;
			       $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$reading_question = stripslashes($row['questionText']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$ans=[];
			 	 		$arry=(object)[];
			 	 		$arry->questiontext=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 				array_push($ans,$row['option'.$i]);
			 	 			}
			 	 		}
			 	 		$ans = implode("/*/", $ans);
			 	 		$arry->ans=$ans;
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		 	//multiple-answer
		 	else{	
				if ($run == true) {
			        $q = $question - 3;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$reading_question = stripslashes($row['question']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->question=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
			 	 		$arry->c=$k;
		 				$arry->ans=$row['answer'];
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		}
		//listening fill
		if($question>=6 && $question<=8)
		{
			if($answer != "")
			{
				$answer = implode("/*/", $answer);
			}
			//fill in the blanks insert
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn,$sql);
			//highlight correct summary
			if($question== 8)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="highlight-correct-summary";
			        $q = $question - 8;
			        $q = $q+1;
			       $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		 	//fill in the blanks
		 	else{	
				if ($run == true) {
			        $type="fill-in-the-blanks";
			        $q = $question - 5;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$reading_question = stripslashes($row['questionText']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$ans= [];
			 	 		$arry=(object)[];
			 	 		$arry->questiontext=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 				array_push($ans,$row['option'.$i]);
			 	 			}
			 	 		}
			 	 		$ans = implode("/*/",$ans);
			 	 		$arry->ans=$ans;
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		}
		//listening highlight correct summary
		if($question>=9 && $question<=10)
		{
			//highlight correct summary insert
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn,$sql);
			//single answer
			if($question== 10)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="single-answer";
		 			$q = $question - 10;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$reading_question = stripslashes($row['question']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->question=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
			 	 		$arry->ans=$row['answer'];
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		 	//highlight-correct-summary
		 	else{	
				if ($run == true) {
			        $type="highlight-correct-summary";
			        $q = $question - 8;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		}
		//listening single answer
		if($question>=11 && $question<=12)
		{
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn,$sql);
			if($question== 12)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="select-missing-word";
		 			$q = $question - 12;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
				 		$arry->ans=$row['answer'];
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		 	else{	
				if ($run == true) {
			        $type="single-answer";
		 			$q = $question - 10;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$reading_question = stripslashes($row['question']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->question=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
			 	 		$arry->ans=$row['answer'];
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		}
		//listening select missing wird
		if($question>=13 && $question<=14)
		{
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn,$sql);
			if($question== 14)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="highlight-incorrect-words";
		 			$q = $question - 14;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	    	$reading_question = stripslashes($row['questionText']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$ans= [];
			 	 		$arry=(object)[];
			 	 		$arry->questiontext=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 				array_push($ans,$row['option'.$i]);
			 	 			}
						}
						$ans = implode("/*/",$ans);
						$arry->ans=$ans;
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		 	else{	
				if ($run == true) {
			        $type="select-missing-word";
		 			$q = $question - 12;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$arry=(object)[];
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
			 	 			}
			 	 		}
				 		$arry->ans=$row['answer'];
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		}

		//highligh incorrect word
		if($question>=15 && $question<=17)
		{
			if($answer != "")
			{
				$answer = implode("/*/", $answer);
			}
			//highligh incorrect word insert
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date,marks) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date','$marks')";
			$run = mysqli_query($conn,$sql);
			//write from dictation
			if($question== 17)
		 	{
		 		if ($run == true) 
		 		{
		 			$type="write-from-dictation";
		 			$q = $question - 17;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	 		$audio = $row['audio'];
			 	 		echo $audio;
			 	    }
				}
		 	}
		 	//highligh incorrect word
		 	else{	
				if ($run == true) {
			        $type="highlight-incorrect-words";
		 			$q = $question - 14;
			        $q = $q+1;
			        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
			        $run = mysqli_query($conn,$sql);
			 	    if($run == true)
					{
			 	    	$row = mysqli_fetch_assoc($run);	
			 	    	$reading_question = stripslashes($row['questionText']);
			 	 		$audio = $row['audio'];
			 	 		$k=0;
			 	 		$ans= [];
			 	 		$arry=(object)[];
			 	 		$arry->questiontext=$reading_question;
			 	 		$arry->audio=$audio;
			 	 		for($i=1;$i<=8;$i++)
			 	 		{
			 	 			if($row['option'.$i] != null || $row['option'.$i] != "")
			 	 			{
			 	 				$k += 1;
			 	 				$inc='option'.$k;
			 	 				$arry-> $inc= $row['option'.$i];
								array_push($ans,$row['option'.$i]);
			 	 			}
			 	 		}
			 	 		$ans = implode("/*/",$ans);
						$arry->ans=$ans;
			 	 		$arry->c=$k;
		 				$json_data = json_encode($arry);
		 				echo $json_data;
			 	    }
				}
		 	}
		}
		//write from dictation
		if($question>=18 && $question<=21)
		{
			$sql = "INSERT INTO section_user_test (studentId,test_no,section,type,question_no,question_attempt,answer,remaining_time,modify_date) values ('$student_id','$test_no','listening','$type','$question','$question_attempt','$answer','$remaining_time','$modify_date')";
			$run = mysqli_query($conn,$sql);
			if($run == true)
			{
				
				$type="write-from-dictation";
	 			$q = $question - 17;
		        $q = $q+1;
		        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
		        $run = mysqli_query($conn,$sql);
		 	    if($run == true)
				{
		 	    	$row = mysqli_fetch_assoc($run);	
		 	 		$audio = $row['audio'];
		 	 		echo $audio;
		 	    }
			}
		}
    }
}


//listening first question
if(isset($_POST['listening_que']) && isset($_POST['type']) && isset($_POST['test_no']))
{
	$question = mysqli_real_escape_string($conn,$_POST['listening_que']);
	$type= mysqli_real_escape_string($conn,$_POST['type']);
	$test_no = mysqli_real_escape_string($conn,$_POST['test_no']);
    if($type == 'summarize-spoken-text')
    {
    	$q = $question;
    	$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
	    $run = mysqli_query($conn,$sql);
	    $row = mysqli_fetch_assoc($run);
    	echo $row['audio'];
	}
	else if($type == 'multiple-answers')
	{
		$q = $question - 3;
		$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
	    $run = mysqli_query($conn,$sql);
	    $row = mysqli_fetch_assoc($run);	
 		$reading_question = stripslashes($row['question']);
 		$audio = $row['audio'];
 		$k=0;
 		$arry=(object)[];
 		$arry->question=$reading_question;
 		$arry->audio=$audio;
 		for($i=1;$i<=8;$i++)
 		{
 			if($row['option'.$i] != null || $row['option'.$i] != "")
 			{
 				$k += 1;
 				$inc='option'.$k;
 				$arry-> $inc= $row['option'.$i];
 			}
 		}
 		$arry->c=$k;
 		$arry->ans=$row['answer'];
		$json_data = json_encode($arry);
		echo $json_data;
	}
	else if($type == 'fill-in-the-blanks')
	{
		$q = $question - 5;
		$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
	    $run = mysqli_query($conn,$sql);
	    $row = mysqli_fetch_assoc($run);		
 		$reading_question = stripslashes($row['questionText']);
 		$audio = $row['audio'];
 		$k=0;
 		$ans = [];
 		$arry=(object)[];
 		$arry->questiontext=$reading_question;
 		$arry->audio=$audio;
 		for($i=1;$i<=8;$i++)
 		{
 			if($row['option'.$i] != null || $row['option'.$i] != "")
 			{
 				$k += 1;
 				$inc='option'.$k;
 				$arry-> $inc= $row['option'.$i];
 				array_push($ans,$row['option'.$i]);
 			}
 		}
 		$ans = implode("/*/",$ans);
 		$arry->ans=$ans;
 		$arry->c=$k;
		$json_data = json_encode($arry);
		echo $json_data;
	}
	else if($type == 'highlight-correct-summary')
	{
        $q = $question - 8;
        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
        $run = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($run);	
 		$audio = $row['audio'];
 		$k=0;
 		$arry=(object)[];
 		$arry->audio=$audio;
 		for($i=1;$i<=8;$i++)
 		{
 			if($row['option'.$i] != null || $row['option'.$i] != "")
 			{
 				$k += 1;
 				$inc='option'.$k;
 				$arry-> $inc= $row['option'.$i];
 			}
 		}
 		$arry->ans=$row['answer'];
 		$arry->c=$k;
		$json_data = json_encode($arry);
		echo $json_data;
	}
	else if($type == 'single-answer')
	{

		$q = $question - 10;
        $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
        $run = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($run);	
 		$reading_question = stripslashes($row['question']);
 		$audio = $row['audio'];
 		$k=0;
 		$arry=(object)[];
 		$arry->question=$reading_question;
 		$arry->audio=$audio;
 		for($i=1;$i<=8;$i++)
 		{
 			if($row['option'.$i] != null || $row['option'.$i] != "")
 			{
 				$k += 1;
 				$inc='option'.$k;
 				$arry-> $inc= $row['option'.$i];
 			}
 		}
 		$arry->c=$k;
 		$arry->ans=$row['answer'];
		$json_data = json_encode($arry);
		echo $json_data;
	}
	else if($type == 'select-missing-word')
	{
		$q = $question - 12;
		$sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
		$run = mysqli_query($conn,$sql);
	    $row = mysqli_fetch_assoc($run);	
 		$audio = $row['audio'];
 		$k=0;
 		$arry=(object)[];
 		$arry->audio=$audio;
 		for($i=1;$i<=8;$i++)
 		{
 			if($row['option'.$i] != null || $row['option'.$i] != "")
 			{
 				$k += 1;
 				$inc='option'.$k;
 				$arry-> $inc= $row['option'.$i];
 			}
 		}
 		$arry->ans=$row['answer'];
 		$arry->c=$k;
		$json_data = json_encode($arry);
		echo $json_data;
		 	    
	}else if($type == 'highlight-incorrect-words')
	{
		$q = $question - 14;
	    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
   		$run = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($run);	
    	$reading_question = stripslashes($row['questionText']);
 		$audio = $row['audio'];
 		$k=0;
		$ans= [];
 		$arry=(object)[];
 		$arry->questiontext=$reading_question;
 		$arry->audio=$audio;
 		for($i=1;$i<=8;$i++)
 		{
 			if($row['option'.$i] != null || $row['option'.$i] != "")
 			{
 				$k += 1;
 				$inc='option'.$k;
 				$arry-> $inc= $row['option'.$i];
				array_push($ans,$row['option'.$i]);
 			}
 		}
 		$ans = implode("/*/",$ans);
		$arry->ans=$ans;
 		$arry->c=$k;
		$json_data = json_encode($arry);
		echo $json_data;
		 	    
	}else if($type == 'write-from-dictation')
	{
		$q = $question - 17;
	    $sql = "select * from section_test where test_no = '$test_no' and type='$type' and question_no='$q' and section='listening'";
        $run = mysqli_query($conn,$sql);
    	$row = mysqli_fetch_assoc($run);	
 		$audio = $row['audio'];
 		echo $audio;
	}
}



//include navbar in listening section
if(isset($_POST['temp'])){
	include_once("navbar.php");
}

//question number in index.php
if(isset($_POST['testno']))
{
	$testno= $_POST['testno'];
	$student_id=$_COOKIE['studentId'];
	$sql2= "select question_no from section_user_test where test_no='$testno' and studentId='$student_id'";
    $run2 = mysqli_query($conn,$sql2);
    echo mysqli_num_rows($run2);
}


//universal test counter
if(isset($_POST['q']) && isset($_POST['t']))
{

	$test_no = $_POST['t'];
	$student_id = $_COOKIE['studentId'];
	$question_no = $_POST['q'];
    $timer_question =$question_no-1; 
	$sql5 = "SELECT * from section_user_test where test_no = '$test_no' and studentId='$student_id' and question_no='$timer_question'";
    $run5= mysqli_query($conn,$sql5);
    $row5= mysqli_fetch_assoc($run5);
    $counter_data = explode(":", $row5['remaining_time']);
    $arry=(object)[];
    $arry->hour=$counter_data[0];
    $arry->min=$counter_data[1];
    $arry->sec=$counter_data[2];
    $json_data = json_encode($arry);
	echo $json_data;
}
?>