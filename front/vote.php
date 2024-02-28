<?php $sub = $Que->find($_GET['id']); ?>
<fieldset>
    <form action="./api/vote.php" method="post">
    <legend>目前位置:首頁>問卷調查><?= $sub['text']; ?></legend>
    <h3><?= $sub['text']; ?></h3>
    <?php
    $opts = $Que->all(['subject_id' => $_GET['id']]);
    foreach ($opts as $opt) {
    ?>
    <div><input type="radio" name="opt" value="<?=$opt['id'];?>"><?=$opt['text'];?></div>
    <?php
    }
    ?>
    <div class="ct">
    <input type="submit" value="我要投票">
    </div>
    </form>
</fieldset>