<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">

        <div style="display: flex;">
            <div class="clo">問卷名稱</div>
            <div><input type="text" name="subject" id="subject"></div>
        </div>
        <div class="clo opt">
            選項<input type="text" name="option[]" id="option"><input type="button" value="更多" onclick="more()">
        </div>
        <div>
            <input type="submit" value="新增">|<input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<fieldset>
    <legend>問卷列表</legend>
    <table>
        <tr class="clo">
            <th>問卷名稱</th>
            <th>投票數</th>
            <th>開放</th>
        </tr>
        <?php
        $ques = $Que->all(['subject_id' => 0]);
        foreach ($ques as $que) {
        ?>
            <tr>
                <td><?= $que['text']; ?></td>
                <td><?= $que['vote']; ?></td>
                <td>
                    <input type="submit" name="sh[]" value="<?= ($que['sh'] == 1) ? '開放' : '不開放' ?>" onclick="quesh(<?=$que['id'];?>)">
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</fieldset>
<script>
    function quesh(id){
        $.post("./api/quesh.php",{id},(res)=>{
            location.reload()
        })
    }
    function more() {
        let opt = ` <div class="clo">
            選項<input type="text" name="option[]" id="option">
        </div>`
        $(".opt").before(opt)
    }

</script>