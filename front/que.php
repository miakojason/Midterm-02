<fieldset>
    <legend>目前位置:首頁>問卷調查</legend>
    <table>
        <tr>
            <td>編號</td>
            <td>問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $subs = $Que->all(['subject_id' => 0,'sh'=>1]);
        foreach ($subs as $idx => $sub) {
        ?>
            <tr>
                <td><?= $idx + 1; ?></td>
                <td><?= $sub['text']; ?></td>
                <td><?= $sub['vote']; ?></td>
                <td><a href="?do=result&id=<?= $sub['id']; ?>">結果</a></td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo "<a href='?do=vote&id={$sub['id']}'>參與投票</a>";
                    } else {
                        echo "<a href='?do=login'>請先登入</a>";
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>