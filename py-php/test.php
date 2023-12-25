<html>
 <body>
  <head>
   <title>
     run
   </title>
  </head>

   <form method="post">

    <input type="submit" value="GO" name="GO">
    <input type="hidden" value="123456" name="test_id">
   </form>
 </body>
</html>

<?php
	if(isset($_POST['GO']))
	{
        $test_no = '5fc1da46ec564';
        $user_test_question_no = 39;
        $studentId = 98;
        $type = 'summarize-written-text';
        $test_question_no = 1;
		shell_exec("python ex.py $test_no $user_test_question_no $studentId $type $test_question_no");
		echo"success";
	}
?>