<?php
session_start();
if(isset($_SESSION['username'])){

include("chatterdb.php");
include("APP/helpers/users.php");
include("APP/helpers/chatting.php");
include("APP/helpers/timeago.php");


$user=getuser($_SESSION['username'],$conn);
$chatting=getchattingg($user['user_id'],$conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"href=css/chat.css>
    <title>CHATTERWEB-HOME</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
<div class="p-2 w-400 rounded shadow" >
<div>
    <div class="d-flex mb-3 p-3 be-light justify-content-center align-items-center">
<div class="d-flex align-items-center">
    <img src="uploads/<?=$user['p_p']?>" class="w-25 rounded-circle">
<h3 class="fs-xs m-2"><?=$user['name'];?></h3>

</div>
<a href="logout.php" class="btn btn-light">Logout</a>
    </div>
    <div class="input-group mb-3">
        <input type="text"placeholder="Serach..."id="searchText"class="form-control">
<button class="btn btn-primary"id="searchBtn"><i id="black" class="fa fa-rocket" aria-hidden="true"></i>
</button>

    </div>
    <ul id="chatlist" class="list-group mvh-50 overflow-auto">
        <?php
        if(!empty($chatting)){?>
        <?php  foreach($chatting as $chattingg)  {


?>
            
        <li class="list-group-items">
            <a href="chat.php?user=<?=$chattingg['username']; ?>" class="d-flex justify-content-between align-items-center p-2">
<div class="d-flex  align-items-center">
    <img src="uploads/<?= $chattingg['p_p'] ; ?>" alt=""class="w-10 rounded-circle">
   <h3 class="fs-xs m-2" > <?=$chattingg['name'] ;?></h3>

</div>
<?php if(last_Seen($chattingg['lastseen'])=="Active") {?>
<div title="online">
<div class="online"></div><?php }?>
</div>
            </a>
        </li>
        <?php } ?>
<?php } else{?>
    <div class="alert alert-light text-center" role="alert">
        <i class="fa fa-comments d-block fs-big"id="star"></i>
    NO GOSSIP YET,START GOSSIPING
    
    </div>
    
    
        <?php   }
        
        
        
        ?>
    </ul>
</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function(){
$("#searchText").on("input",function(){

    var searchText=$(this).val();
$.post('app/ajax/search.php',{
key: searchText


},
function(data,status){
    $("#chatlist").html(data);
}

);

});

$("#searchBtn").on("click",function(){

var searchText=$("#searchText").val();
$.post('app/ajax/search.php',{
key: searchText


},
function(data,status){
$("#chatlist").html(data);
});});
let lastSeenUpdate=function(){
    $.get("APP/ajax/updatelastseen.php",function(data,status){

console.log(data);
setInterval(lastSeenUpdate,10000);
    });
}
lastSeenUpdate();

});

 </script>

</body>
</html>

<?php

}

else{
    HEADER("Location:index.php");
   
    exit;
}

?>