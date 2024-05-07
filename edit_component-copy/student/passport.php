<?php
foreach ($student as $key => $value) {
?>

    <!-- <td colspan="2">tel</td> -->
    <td colspan="2">電話番号</td>
    <td colspan="3"><input type="tel" name="tel" value="<?= $value['tel'] ?? "" ?>"></td>

    <!-- <td>passport</td> -->
    <td>パスポート番号</td>
    <td>
        <input type="text" name="passport" style="width:100px;" value="<?= $value['passport'] ?? "" ?>">
    </td>

    </tr>
<?php
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    /* if img click input file will be upload */
    img.onclick = () => file.click()
    file.addEventListener('change', function() {
        /* to get file  */
        let f = file.files[0]
        /* use url object for to get file url */
        img.src = URL.createObjectURL(f)
        console.log(f)
    })
</script>