<?php include_once "./db.php";
if(isset($_POST['title'])){
    $news['title']=$_POST['title'];
    $news['text']=$_POST['text'];
    $news['type']=$_POST['type'];
    $news['good']=0;
    $News->save($news);
}
to("../back.php?do=news");