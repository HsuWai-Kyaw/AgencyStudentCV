<?php

// require "./utility/function.php";
$start_date_formatted = date('Y-m-d', strtotime($value['start_date']));


foreach ($student as $key => $value) {
?>
     <tr>
          <td colspan="2">連絡先</td>
          <!-- <td colspan="2">address</td> -->
          <td colspan="5">
               <textarea name="address" cols="30" rows="4"><?= $value['address'] ?? "" ?></textarea>
          </td>
     </tr>
     <tr>
          <td colspan="2">住所</td>
          <!-- <td colspan="2">per address</td> -->
          <td colspan="5">
               <input type="text" name="per_address" value="<?= $value['per_address'] ?? "" ?>">
          </td>

     </tr>

     <tr>
          <!-- <td colspan="2">start date</td> -->
          <td colspan="2">入学日</td>

          <td colspan="5">
               <input type="date" name="start_date" value="<?= $start_date_formatted ?>">
          </td>
     </tr>

     <tr>
          <td colspan="2">身長(センチ)</td>
          <!-- <td colspan="2">height(センチ)</td> -->
          <td colspan="2"><input type="number" name="height" style="width:70px" value="<?= $value['height'] ?? "" ?>">センチ
          </td>
          <td colspan="2">体重(キロ)</td>
          <!-- <td colspan="2">weight(キロ)</td> -->
          <td><input type="number" name="weight" style="width:70px" value="<?= $value['weight'] ?? "" ?>">キロ</td>
     </tr>
<?php
}
?>