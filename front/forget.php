<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <input type="text" name="email" id="email">
    <div class="result"></div>
    <input type="button" value="尋找" onclick="forget()">
</fieldset>
<script>
    function forget() {
        $.post("./api/forget.php", {
            email: $("#email").val()
        }, (res) => {
            $(".result").text(res)
        })
    }
</script>