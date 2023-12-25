<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-FQKPT0PS9K"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FQKPT0PS9K');
    // stop right click
    document.addEventListener('contextmenu', event => event.preventDefault());
</script>
    <?php
    include '../../database/dbh.inc.php';
     $orderId = $_POST["orderId"];
     $orderAmount = $_POST["orderAmount"];
     $referenceId = $_POST["referenceId"];
     $txStatus = $_POST["txStatus"];
     $paymentMode = $_POST["paymentMode"];
     $txMsg = $_POST["txMsg"];
     $txTime = $_POST["txTime"];
     $signature = $_POST["signature"];
     $secretkey = "445cd155c76ca04e6c527006d326c8c0b86b80b1";
     $data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
     $hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
     $computedSignature = base64_encode($hash_hmac);
     if ($signature == $computedSignature && $txStatus == 'SUCCESS') {
        $student_id =  $_COOKIE['cashfree_student_id'] ;
        $test_no =  $_COOKIE['cashfree_test_no'] ;
        $email = $_COOKIE['cashfree_email'] ;
        $mobileNo = $_COOKIE['cashfree_mobileNo'] ;
        $price = $_COOKIE['cashfree_price'] ;
        setcookie("cashfree_student_id",'',time()-600,'/');
        setcookie("cashfree_test_no",'' ,time()-600,'/');
        setcookie("cashfree_email",'' ,time()-600,'/');
        setcookie("cashfree_mobileNo",'' ,time()-600,'/');
        setcookie("cashfree_price",'' ,time()-600,'/');

        $sql = mysqli_query($conn, "INSERT INTO test_purchase(order_id,studentId,test_no,email,mobileNo,amount,referenceId,status,payment_mode,payment_time,signature) VALUES ('$orderId','$student_id','$test_no','email','$mobileNo','$price','$referenceId','$txStatus','$paymentMode','$txTime','$signature')");
        if($sql == true)
        {
          ?><script type="text/javascript">location.href= '../index.php?paymentsuccess=1'; </script><?php
        }
      } else {
       // Reject this call
          ?><script type="text/javascript">location.href= '../index.php?paymentfailed=0'; </script><?php
     }

 ?>