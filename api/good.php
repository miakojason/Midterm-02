<?php include_once "./db.php";
$acc=$_SESSION['user'];
$news=$_POST['id'];
if($Log->count(['news'=>$news,'acc'=>$acc])>0){
    $Log->del(['news'=>$news,'acc'=>$acc]);
}else{
    $Log->save(['news'=>$news,'acc'=>$acc]);
}