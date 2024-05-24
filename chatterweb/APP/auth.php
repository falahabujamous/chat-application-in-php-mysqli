<?php 
session_start();
if(isset($_POST['username'])&&
isset($_POST['password'])){

$username=$_POST['username'];
$password=$_POST['password'];


include ("../chatterdb.php");
 if (empty($username)){
$em="USERNAME IS REQUIRES..";
HEADER("Location: ../index.php?error=$em");
   
}
else if(empty($password)){
    $em="PASSWORDF IS REQUIRES..";
HEADER("Location: ../index.php?error=$em");

}
else{
    $sql="SELECT * FROM users WHERE username=?";
    $stmt=$conn->prepare(($sql));
    $stmt->execute([$username]);
if($stmt->rowCount() ===1){
$user=$stmt->fetch();
if($user['username']===$username){
if(password_verify($password,$user['password'])){
$_SESSION['username']=$user['username'];
$_SESSION['name']=$user['name'];
$_SESSION['user_id']=$user['user_id'];
HEADER("Location: ../home.php");

}else{
    $em="INCORECT USERNAME OR PASSWORD..";
HEADER("Location: ../index.php?error=$em");
}
}else{
    $em="INCORECT USERNAME OR PASSWORD..";
HEADER("Location:index.php?error=$em");
}
}
}
}
else{

    HEADER("Location:index.php");
   
    exit;
}
?>