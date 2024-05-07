<span><b>家族</b></span>

<table class="table table-sm table-bordered border-dark">
     <?php

     $sql = "SELECT * FROM family_info WHERE student_id = :student_id";
     $statement = $pdo->prepare($sql);
     $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
     $statement->execute();
     $student = $statement->fetchAll(PDO::FETCH_ASSOC);


     // die();
     ?>
     <thead>
          <tr>
               <td colspan="2">家族氏名</td>
               <td>続柄</td>
               <td>年齢</td>
               <td>職業</td>
               <td>同居</td>
               <td>別居</td>
          </tr>

     </thead>
     <tbody>
          <?php foreach ($student as $row) { ?>

               <tr>
                    <td colspan="2"><input type="text" name="family_member[]" value="<?= $row['family_member'] ?? "" ?>">
                    </td>
                    <td><input type="text" name="family_member_type[]" value="<?= $row['family_member_type'] ?? "" ?>"></td>
                    <td><input type="text" name="family_member_age[]" value="<?= $row['family_member_age'] ?? "" ?>"></td>
                    <td><input type="text" name="family_member_job[]" value="<?= $row['family_member_job'] ?? "" ?>"></td>
                    <td>
                         <input type="text" name="cbtype[]" value="<?= $row['cbtype'] === "stay" ? "&#10003;" : ""  ?>">
                    </td>
                    <td><input type="text" name="cbtype[]" value="<?= $row['cbtype'] === "away" ? "&#10003;" : "" ?>">
                    </td>


               </tr>

          <?php } ?>

          <tr>
               <td colspan="2">relative</td>
               <td colspan="2">
                    <div class="d-flex justify-content-evenly pt-4">
                         <div>
                              <label for="yes">有</label>
                              <input type="radio" name="rdorelative" value="有" <?= ($row['relative'] == '有') ? 'checked' : '' ?>>
                         </div>
                         <div>
                              <label for="no">無し</label>
                              <input type="radio" name="rdorelative" value="無し" <?= ($row['relative'] == '無し') ? 'checked' : '' ?>>
                         </div>
                    </div>
               </td>
               <td colspan="2">jp family member</td>
               <td><input type="text" name="jp_family_member" value="<?= $row['jp_family_member'] ?? "" ?>"></td>
          </tr>
          <tr>
               <td colspan="4">accept</td>
               <td colspan="3">
                    <div class="d-flex justify-content-evenly pt-4">
                         <div>
                              <label for="yes">賛成</label>
                              <input type="radio" name="rdoaccept" <?= ($row['accept'] == '賛成') ? 'checked' : '' ?> value="賛成">
                         </div>
                         <div>
                              <label for="no">反対</label>
                              <input type="radio" name="rdoaccept" <?= ($row['accept'] == '反対') ? 'checked' : '' ?> value="反対">
                         </div>
                    </div>
               </td>
          </tr>
     </tbody>
</table>