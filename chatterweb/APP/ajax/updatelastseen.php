<?php 

session_start();


if(isset($_SESSION['username'])){

include"../chatterdb.php";

$id=$_SESSION['user_id'];
$sql="UPDATE users SET last_seen = NOW() WHERE user_id = ?";
$stmt=$conn->prepare($sql);
$res=$stmt->execute([$id]);

} else{
header("LOCATION:../../index.php");
exit;
}

?>