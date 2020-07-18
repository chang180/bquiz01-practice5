<h3 class="cent">新增主選單</h3>
<hr>
<form action="api/add.php" method="post">
    <table style="margin:auto">
        <tr>
            <td>主選單：</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>連結網址：</td>
            <td><input type="text" name="text"></td>
        </tr>
    </table>
    <div class="cent">
        <input type="hidden" name="table" value="<?=$_GET['table'];?>">
        <input type="submit" value="新增"><input type="reset" value="重置">
    </div>
</form>