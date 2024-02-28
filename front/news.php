<style>
    .title{
        cursor: pointer;
    }
</style>
<fieldset>
    <legend>目前位置:首頁>最新文章</legend>
    <table>
        <tr>
            <td>標題</td>
            <td>內容</td>
            <td></td>
        </tr>
        <?php
        $total = $News->count(['sh' => 1]);
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ??1;
        $start = ($now - 1) * $div;
        $news = $News->all(['sh' => 1], " limit $start,$div");
        foreach ($news as $new) {
        ?>
            <tr>
                <td class="title clo" id="<?= $new['id']; ?>"><?= $new['title']; ?></td>
                <td>
                    <div class="s<?= $new['id']; ?>" ><?= mb_substr($new['text'], 0, 20); ?>...</div>
                    <div class="a<?= $new['id']; ?>" style="display:none"><pre><?= $new['text']; ?></pre></div>
                </td>
                <td>
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $new['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a href='Javascript:good({$new['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$new['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
        <?php
        if ($now > 1) {
            $prev = $now - 1;
            echo "<a href='?do=$do&p=$prev'> < </a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '16px';
            echo "<a href='?do=$do&p=$i'style='font-size:$fontsize'>$i</a>";
        }
        if ($now < $pages) {
            $next = $now + 1;
            echo "<a href='?do=$do&p=$next'>></a>";
        }
        ?>
</fieldset>
<script>
    $(".title").on('click',function(){
        let id=$(this).attr('id')
        $(".s"+id).toggle()
        $(".a"+id).toggle()
       
    })
    function good(id) {
        $.post("./api/good.php", {
            id
        }, (res) => {
            location.reload()
        })
    }
</script>