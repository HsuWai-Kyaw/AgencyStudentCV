<?php
foreach ($student as $key => $value) {
?>
     <tr>
          <!-- <td colspan="2">dob</td> -->
          <td colspan="2">生年月日</td>
          <td colspan="3"><input type="date" name="dob" value="<?= $value['dob'] ?? "" ?>""></td>


          <td>年齢</td>
          <!-- <td>age</td> -->
          <td><input type=" number" name="age" value="<?= $value['age'] ?? "" ?>" style="width:70px">歳</td>
     </tr>
     <tr>
          <!-- <td colspan="2">country</td> -->
          <td colspan="2">国籍</td>
          <td colspan="3"><input type="text" name="country" value="<?= $value['country'] ?>"></td>
          <!-- <td>religion</td> -->
          <td>信仰</td>
          <td><input type="text" name="religion" value="<?= $value['religion'] ?? "" ?>"></td>
     </tr>
<?php
}
?>