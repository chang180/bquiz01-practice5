<h3 class="cent">編輯次選單</h3>
<hr>
<form action="api/submenu.php" method="post">
    <table id="more" style="margin:auto;text-align:center"  class="cent">
        <tr>
            <td>次選單名稱</td>
            <td>選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        include_once "../base.php";
        $db = new DB('menu');
        $rows = $db->all(['parent' => $_GET['id']]);
        foreach ($rows as $row) {

        ?>
            <tr>
                <td><input type="text" name="name[]" value="<?= $row['name']; ?>"></td>
                <td><input type="text" name="text[]" value="<?= $row['text']; ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                <td><input type="hidden" name="id[]" value="<?= $row['id']; ?>"></td>
            </tr>
        <?php } ?>
    </table>
    <div class="cent">
        <input type="hidden" name="parent" value="<?= $_GET['id']; ?>">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="submit" value="修改確定"><input type="reset" value="重置"><input type="button" onclick="moreSub()" value="更多次選單">
    </div>
</form>

<script>
    function moreSub() {
        let more = `
        <tr>
        <td><input type="text" name="name2[]"></td>
        <td><input type="text" name="text2[]"></td>
        <td></td>
        </tr>
        `;
        $("#more").append(more);
    }
</script>