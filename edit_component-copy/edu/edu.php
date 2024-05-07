<?php
require "server/db.php"; // Assuming this includes the database connection
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     $id = $_POST['id'];
     $education_s_year = $_POST['education_s_year'] ?? [];
     $education_s_month = $_POST['education_s_month'] ?? [];
     $education_e_year = $_POST['education_e_year'] ?? [];
     $education_e_month = $_POST['education_e_month'] ?? [];
     $school_name = $_POST['school_name'] ?? [];
     $specialized_subject = $_POST['specialized_subject'] ?? [];
     $skills = $_POST['skills'] ?? [];
     $edu_ids = $_POST['edu_id'] ?? [];

     $edusql =
          'INSERT INTO `edu`(`student_id`, `education_s_year`, `education_s_month`, `education_e_year`, `education_e_month`, `school_name`, `specialized_subject`, `skills`) VALUES (:student_id, :education_s_year, :education_s_month, :education_e_year, :education_e_month, :school_name, :specialized_subject, :skills)';
     $statement = $pdo->prepare($edusql);
     $statement->bindParam(':student_id', $id, PDO::PARAM_STR);

     for ($i = 0; $i < count($education_s_year); $i++) {
          $statement->bindParam(
               ':education_s_year',
               $education_s_year[$i],
               PDO::PARAM_STR
          );
          $statement->bindParam(
               ':education_s_month',
               $education_s_month[$i],
               PDO::PARAM_STR
          );
          $statement->bindParam(
               ':education_e_year',
               $education_e_year[$i],
               PDO::PARAM_STR
          );
          $statement->bindParam(
               ':education_e_month',
               $education_e_month[$i],
               PDO::PARAM_STR
          );
          $statement->bindParam(':school_name', $school_name[$i], PDO::PARAM_STR);
          $statement->bindParam(
               ':specialized_subject',
               $specialized_subject[$i],
               PDO::PARAM_STR
          );
          $statement->bindParam(':skills', $skills[$i], PDO::PARAM_STR);
          $statement->execute();
     }

     // Return a success message (or any response you want)
     echo "Records updated successfully!";
}
?>


<b><span>学歴</span></b>
<form id="education_form" method="POST" action="edu_data_update.php">
     <table id="education_table" class="table table-sm table-bordered border-dark">
          <?php

          $sql = "SELECT * FROM edu WHERE student_id = :student_id";
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
                    <td colspan="2">学校名</td>
                    <td colspan="2">専門</td>
                    <td>免許・資</td>
               </tr>

          </thead>
          <tbody>
               <?php foreach ($student as $row) {
                    // print_r($row);
               ?>

                    <tr id="education_row_template">
                         <td>
                              <input type="text" name="education_s_year[]" value=" <?= $row['education_s_year'] ?? "" ?>" style="width: 50px;"> 年
                              <input type="text" name="education_s_month[]" value="<?= $row['education_s_month'] ?>" style="width: 50px;">
                              月

                         </td>
                         <td>
                              <input type="text" name="education_e_year[]" value="<?= $row['education_e_year'] ?? "" ?>" style="width: 50px;"> 年
                              <input type="text" name="education_e_month[]" value="<?= $row['education_e_month'] ?? "" ?>" style="width: 50px;">
                              月
                         </td>
                         <td colspan="2"><input type="text" name="school_name[]" value="<?= $row['school_name'] ?? "" ?>">
                         </td>
                         <td colspan="2"><input type="text" name="specialized_subject[]" value="<?= $row['specialized_subject'] ?? "" ?>"></td>
                         <td><input type="text" name="skills[]" value="<?= $row['skills'] ?? "" ?>"></td>
                    </tr>
               <?php } ?>

          </tbody>

     </table>

     <p id="add_education_row">Add New Row</p>
     <button type="submit" id="update_education_btn">Update Education Records</button>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script>
     $(document).ready(function() {
          // Add event listener to the update button
          $("#update_education_btn").on("click", function() {
               // Create an array to store the updated records
               var updatedRecords = [];

               // Loop through each row in the table
               $("#education_table tbody tr").each(function() {
                    // Get the values from the input fields in each row
                    var s_year = $(this).find("input[name='education_s_year[]']").val();
                    var s_month = $(this).find("input[name='education_s_month[]']").val();
                    var e_year = $(this).find("input[name='education_e_year[]']").val();
                    var e_month = $(this).find("input[name='education_e_month[]']").val();
                    var school_name = $(this).find("input[name='school_name[]']").val();
                    var specialized_subject = $(this).find(
                         "input[name='specialized_subject[]']").val();
                    var skills = $(this).find("input[name='skills[]']").val();

                    // Create an object to represent a single record
                    var record = {
                         education_s_year: s_year,
                         education_s_month: s_month,
                         education_e_year: e_year,
                         education_e_month: e_month,
                         school_name: school_name,
                         specialized_subject: specialized_subject,
                         skills: skills,
                    };

                    // Push the record object to the updatedRecords array
                    updatedRecords.push(record);
               });

               // Log the updatedRecords array to the console to check its contents
               console.log(updatedRecords);

               // Send the updatedRecords array to the server using AJAX
               $.ajax({
                    url: "edu_data_update.php", // Adjust the URL to match the correct PHP script
                    type: "POST",
                    data: {
                         records: updatedRecords // Send the data as an array of objects with the key "records"
                    },
                    dataType: "json", // Specify the data type for the server response
                    success: function(response) {
                         // Handle the server's response here (e.g., show a success message)
                         console.log(response);
                    },
                    error: function(xhr, status, error) {
                         // Handle errors here (e.g., show an error message)
                         console.error(error);
                    }
               });
          });
     });
</script>