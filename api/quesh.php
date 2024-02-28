<?php include_once "./db.php";
if(isset($_POST['id'])){
    $que=$Que->find($_POST['id']);
    if($que['sh']==1){
        $que['sh']=0;
    }else{
        $que['sh']=1;
    }
    $Que->save($que);
}
to("../back.php?do=que");