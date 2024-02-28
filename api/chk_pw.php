<?php include_once "./db.php";
$res = $User->count(['acc' => $_POST['acc'], 'pw' => $_POST['pw']]);
if ($res) {
    $_SESSION['user'] = $_POST['acc'];
}
echo $res;
