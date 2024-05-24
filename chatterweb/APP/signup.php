<?php 
if(isset($_POST['username'])&&
isset($_POST['name'])&&
isset($_POST['password'])){

$username=$_POST['username'];
$password=$_POST['password'];
$name=$_POST['name'];

$date='name='.$name.'&username='.$username;
include ("../chatterdb.php");
if(empty($name)){
    $em="NAME IS REQUIRED..";
    HEADER("Location:../index.php?error=$em");
   
exit;
}
else if (empty($username)){
$em="USERNAME IS REQUIRES..";
header("Location: ../index.php?error=$em");
        exit();
}
else if(empty($password)){
    $em="PASSWORDF IS REQUIRES..";
header("Location: ../index.php?error=$em");
        exit();
}
else{
    $sql="SELECT username FROM users WHERE username=? ";
    $stmt=$conn->prepare($sql);
    $stmt->execute([$username]);
    if($stmt->rowCount() > 0){
        $em="THE USER NAME ($username)IS TAKEN...";
        header("Location:../index.php?error=$em");
    exit();
    }else{


        if(isset($_FILES['p_p'])){
$img_name=$_FILES['p_p']['name'];
$tmp_name=$_FILES['p_p']['tmp_name'];
$error=$_FILES['p_p']['error'];
if($error === 0){
$img_ex=pathinfo($img_name,PATHINFO_EXTENSION);
$img_ex_lc=strtolower($img_ex);
$allows_exs=array("jpg","jpeg","png");
if(in_array($img_ex_lc,$allows_exs)){
$new_image_name=$username.'.'.$img_ex_lc;
$image_upload_path='../uploads/'.$new_image_name;
move_uploaded_file($tmp_name,$image_upload_path);


}
else{
    $em="YOU CANT UPLOAD FILES FO THIS TYPE";
    header("Location:../index.php?error=$em");
exit();
}
}else{
    $em="UNKNOWN ERRROR OCURED...";
    header("Location:../index.php?error=$em");
exit();
}


        }
   $password=password_hash($password,PASSWORD_DEFAULT);
   if(isset($new_image_name)){
    $sql = "INSERT INTO users (name,username,password,p_p) VALUES(?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->execute(([$name,$username,$password,$new_image_name]));
   }
   else{

    $sql = "INSERT INTO users (name,username,password) VALUES(?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->execute(([$name,$username,$password]));



   }
   $sm="ACCOUNT CREATED SUCCESSFULLY";
   HEADER("Location:../index.php?success=$sm");
   exit;
    }
}
}else{
    HEADER("Location:../index.php");
    exit;


}
?>