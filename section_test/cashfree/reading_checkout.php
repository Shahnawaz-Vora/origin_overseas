<?php
    if (!isset($_COOKIE['studentId'])) {
        header("location: ../../student/auth_login.php");
    }
    include_once '../../database/dbh.inc.php';
    $studentId = $_COOKIE['studentId'];
    error_reporting(0);
?>
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
if (isset($_GET['test_no'])) {
  $test_no = $_GET['test_no'];
}
else
{
  ?><script>location.replace('../index.php');</script><?php
}

$student_id = $_COOKIE['studentId'];
$sql=mysqli_query($conn,"select * from student where studentId='$student_id'");
$row = mysqli_fetch_assoc($sql);
$sql1 = mysqli_fetch_assoc(mysqli_query($conn,"select * from manage_section_test where test_no='$test_no' "));
$test_price  = $sql1['test_price'];
$orderId = $test_no;
$orderAmount = $test_price;

$host="https://origin-overseas.com";
$notifyUrl = $host."/section_test/cashfree/notify.php";
$returnUrl = $host."/section_test/cashfree/return.php";

$orderDetails = array();
$orderDetails["notifyUrl"] = $notifyUrl;
$orderDetails["returnUrl"] = $returnUrl;

$userDetails = getUserDetails($orderId);
$order = getOrderDetails($orderId);
function getUserDetails($orderId) {
    global $student_id;
    include '../../database/dbh.inc.php';
    $student_id = $_COOKIE['studentId'];
    $sql=mysqli_query($conn,"select * from student where studentId='$student_id'");
    $row = mysqli_fetch_assoc($sql);
    return array(
      "customerName" => $student_id,
      "customerEmail" => $row['email'],
      "customerPhone" => $row['mobileNo']
    );
}

function getOrderDetails($orderId) {
  global $test_price,$test_no,$conn;
  $orderAmount = $test_price;
  $sql5 = mysqli_query($conn,"SELECT * from section_test_purchase order by order_id desc limit 1 ");
  $result = mysqli_fetch_assoc($sql5);
  if(mysqli_num_rows($sql5) >= 1)
  {
    $orderId = $result['order_id']+102;
  }
  else
  {
    $orderId=1 ;  
  }
  return array(
    "orderId" => $orderId,
    "test_no" => $test_no,
    "orderAmount" => $orderAmount,
    "orderNote" => "test order",
    "orderCurrency" => "INR"
  );
}

$orderDetails["customerName"] = $userDetails["customerName"];
$orderDetails["customerEmail"] = $userDetails["customerEmail"];
$orderDetails["customerPhone"] = $userDetails["customerPhone"];

$orderDetails["test_no"] = $order["test_no"]; 
$orderDetails["orderId"] = $order["orderId"];
$orderDetails["orderAmount"] = $order["orderAmount"];
$orderDetails["orderNote"] = $order["orderNote"];
$orderDetails["orderCurrency"] = $order["orderCurrency"];

$orderDetails["appId"] = "6471579fb8bb2ef5d918b48d951746";

$orderDetails["signature"] = generateSignature($orderDetails);

json_encode($orderDetails);

function generateSignature($postData){
  $secretKey = "5aef6d0413d24ae7552f9270986f850eca63be8f";
 ksort($postData);
 $signatureData = "";
 foreach ($postData as $key => $value){
      $signatureData .= $key.$value;
 }
 $signature = hash_hmac('sha256', $signatureData, $secretKey,true);
 $signature = base64_encode($signature);
 return $signature;
}

?>
 <!--<form id="redirectForm" method="post" action="https://cashfree.com/billpay/checkout/post/submit"> -->
  <form id="redirectForm" method="post" action="https://test.cashfree.com/billpay/checkout/post/submit">
    <input type="hidden" name="appId" value="<?php echo $orderDetails["appId"] ?>"/>
    <input type="hidden" name="orderId" value="<?php echo $orderDetails["orderId"] ?>"/>
    <input type="hidden" name="orderAmount" value="<?php echo $orderDetails["orderAmount"] ?>"/>
    <input type="hidden" name="orderCurrency" value="<?php echo $orderDetails["orderCurrency"] ?>"/>
    <input type="hidden" name="orderNote" value="<?php echo $orderDetails["orderNote"] ?>"/>
    <input type="hidden" name="customerName" value="<?php echo $orderDetails["customerName"] ?>"/>
    <input type="hidden" name="customerEmail" value="<?php echo $orderDetails["customerEmail"] ?>"/>
    <input type="hidden" name="customerPhone" value="<?php echo $orderDetails["customerPhone"] ?>"/>
     <input type="hidden" name="test_no" value="<?php echo $orderDetails["test_no"]; ?>"/>
    <input type="hidden" name="returnUrl" value="<?php echo $orderDetails["returnUrl"] ?>"/>
    <input type="hidden" name="notifyUrl" value="<?php echo $orderDetails["notifyUrl"] ?>"/>
    <input type="hidden" name="signature" value="<?php echo $orderDetails["signature"] ?>"/>
  </form>

  <script>document.getElementById("redirectForm").submit();</script>

<?php
setcookie("cashfree_student_id",'',time()-600,'/');
setcookie("cashfree_test_no",'' ,time()-600,'/');
setcookie("cashfree_email",'' ,time()-600,'/');
setcookie("cashfree_mobileNo",'' ,time()-600,'/');
setcookie("cashfree_price",'' ,time()-600,'/');
        
setcookie("cashfree_student_id",$orderDetails["customerName"] ,time()+600,'/');
setcookie("cashfree_test_no",$test_no ,time()+600,'/');
setcookie("cashfree_email",$orderDetails["customerEmail"] ,time()+600,'/');
setcookie("cashfree_mobileNo",$orderDetails["customerPhone"] ,time()+600,'/');
setcookie("cashfree_price",$orderDetails["orderAmount"] ,time()+600,'/');

// echo json_encode($_COOKIE);
?>

