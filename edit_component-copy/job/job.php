<b><span>職歴</span></b>
<table class="table table-sm table-bordered border-dark">
     <?php

     $sql = "SELECT * FROM job_exp WHERE student_id = :student_id";
     $statement = $pdo->prepare($sql);
     $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
     $statement->execute();
     $student = $statement->fetchAll(PDO::FETCH_ASSOC);


     // die();
     ?>
     <thead>
          <tr>
               <td>開始年</td>
               <td>終了年</td>
               <td colspan="2">会社名</td>
               <td colspan="2">仕事内容</td>
               <td>給料</td>
          </tr>

     </thead>
     <tbody>
          <?php foreach ($student as $row) { ?>
          <tr>
               <td><input type="text" name="job_s_year[]" value="<?= $row['job_s_year'] ?? "" ?>" style="width: 50px;">
                    年
                    <input type="text" name="job_s_month[]" value="<?= $row['job_s_month'] ?? "" ?>"
                         style="width: 50px;">
                    月
               </td>
               <td>
                    <input type="text" name="job_e_year[]" value="<?= $row['job_e_year'] ?? "" ?>" style="width: 50px;">
                    年
                    <input type="text" name="job_e_month[]" value="<?= $row['job_e_month'] ?? "" ?>"
                         style="width: 50px;">
                    月
               </td>
               <td colspan="2"><input type="text" name="company_name[]" value="<?= $row['company_name'] ?? "" ?>"></td>
               <td colspan="2"><input type="text" name="job_type_and_position[]"
                         value="<?= $row['job_type_and_position'] ?? "" ?>"></td>
               <td><input type="number" name="income[]" value="<?= $row['income'] ?? "" ?>"></td>
          </tr>
          <?php } ?>
     </tbody>
</table>