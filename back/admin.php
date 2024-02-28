<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/edit_user.php" method="post">
        <table>
            <tr class="clo">
                <th>帳號</th>
                <th>密碼</th>
                <th>刪除</th>
            </tr>
            <?php
            $users = $User->all();
            foreach ($users as $user) {
                if ($user['acc'] != 'admin') {
            ?>
                    <tr>
                        <td><?= $user['acc']; ?></td>
                        <td><?=str_repeat("*",mb_strlen($user['pw'])) ; ?></td>
                        <td><input type="checkbox" name="del[]" value="<?= $user['id']; ?>"></td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
        <div class="ct">
            <input type="submit" value="確定刪除">
            <input type="reset" value="清空選取">
        </div>
    </form>
    <h1>新增會員</h1>
    <span style="color:red">*請設定您要註冊的帳號及密碼(最⾧ 12 個字元)</span>
    <table>
        <tr>
            <td class="clo">帳號:</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">密碼:</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">信箱:</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="註冊" onclick="reg()">
                <input type="reset" value="清除" onclick="clean()">
            </td>
            <td></td>
        </tr>
    </table>
</fieldset>
<script>
    function clean() {
        $("input[type='text'],input[type='password'],input[type='radio']").val("")
    }

    function reg() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val(),
            pw2: $("#pw2").val(),
            email: $("#email").val()
        }
        if (user.acc != '' && user.pw != '' && user.pw2 != '' && user.email != '') {
            if (user.pw == user.pw2) {
                $.post("./api/chk_acc.php", {
                    acc: user.acc
                }, (res) => {
                    if (parseInt(res) == 1) {
                        alert("帳號重複")
                    } else {
                        $.post("./api/reg.php",
                            user, (res) => {
                                location.reload()
                            })
                    }
                })
            } else {
                alert("密碼錯誤")
            }
        } else {
            alert("不可空白")
        }
    }
</script>