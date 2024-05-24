<?php
function getchattingg($user_id,$conn){


$sql="SELECT * FROM chatting WHERE user_1=? OR user_2=? ORDER BY chatting_id DESC";
$stmt=$conn->prepare($sql);
$stmt->execute([$user_id,$user_id]);
if($stmt->rowcount()>0){

$chatting =$stmt->fetchAll();

$user_data=[];
foreach($chatting as $chattingg){

if($chattingg['user_1']==$user_id){
$sql2="SELECT name, username , p_p ,lastseen FROM users WHERE user_id=?";

$stmt2=$conn->prepare($sql2);
$stmt2->execute([$chattingg['user_2']]);

}else{
    $sql2="SELECT name, username , p_p ,lastseen FROM users WHERE user_id=?";

    $stmt2=$conn->prepare($sql2);
    $stmt2->execute([$chattingg['user_1']]);
    


}
$allchatting=$stmt2->fetchAll();
array_push($user_data,$allchatting[0]);

}
return $user_data;

}else{
    $chatting=[];
    return $chatting;
}


}



?>