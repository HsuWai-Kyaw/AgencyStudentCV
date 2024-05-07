<?php
require 'server/db.php';
require 'header.php';
$errors = [];

if (isset($_GET['id'])) {
     $id = $_GET['id'];
}
// echo $id;
// Handle form submission

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

     if (isset($_POST['submit'])) {

          $id = $_POST['id'];
          $education_s_year = $_POST['education_s_year'] ?? [];
          $education_s_month = $_POST['education_s_month'] ?? [];
          $education_e_year = $_POST['education_e_year'] ?? [];
          $education_e_month = $_POST['education_e_month'] ?? [];
          $school_name = $_POST['school_name'] ?? [];
          $specialized_subject = $_POST['specialized_subject'] ?? [];
          $skills = $_POST['skills'] ?? [];

          $job_s_year = $_POST['job_s_year'] ?? [];
          $job_s_month = $_POST['job_s_month'] ?? [];
          $job_e_year = $_POST['job_e_year'] ?? [];
          $job_e_month = $_POST['job_e_month'] ?? [];
          $company_name = $_POST['company_name'] ?? [];
          $job_type_and_position = $_POST['job_type_and_position'] ?? [];
          $income = $_POST['income'] ?? [];

          $cbtype = $_POST['cbtype'] ?? [];
          // print_r($cbtype);
          // die();

          $family_member = $_POST['family_member'] ?? [];

          $family_member_type = $_POST['family_member_type'] ?? [];
          $family_member_age = $_POST['family_member_age'] ?? [];
          $family_member_job = $_POST['family_member_job'] ?? [];

          $familyInfoId = $_POST['family_info_id'];
          $relative = $_POST['rdorelative'];
          $jp_family_member = $_POST['jp_family_member'];
          $accept = $_POST['rdoaccept'];

          // Prepare the SQL statement
          $esql =
               'INSERT INTO `edu`(`student_id`, `education_s_year`, `education_s_month`, `education_e_year`, `education_e_month`, `school_name`, `specialized_subject`, `skills`) VALUES (:student_id, :education_s_year, :education_s_month, :education_e_year, :education_e_month, :school_name, :specialized_subject, :skills)';
          $statement = $pdo->prepare($esql);

          $jsql = "INSERT INTO `job_exp`(`student_id`, `job_s_year`, `job_s_month`, `job_e_year`, `job_e_month`, `company_name`, `job_type_and_position`, `income`)
          VALUES (:student_id, :job_s_year, :job_s_month, :job_e_year, :job_e_month, :company_name, :job_type_and_position, :income)
          ";
          $statementj = $pdo->prepare($jsql);

          $fsql = "INSERT INTO family_info( student_id, family_member, family_member_type, family_member_age, family_member_job, cbtype, relative, jp_family_member, accept) VALUES (:student_id,:family_member,:family_member_type,:family_member_age,:family_member_job,:cbtype,:relative,:jp_family_member,:accept)";
          $statementf = $pdo->prepare($fsql);

          // Bind parameters
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
          $statementj->bindParam(':student_id', $id, PDO::PARAM_STR);
          for ($i = 0; $i < count($job_s_year); $i++) {
               $statementj->bindParam(':job_s_year', $job_s_year[$i], PDO::PARAM_STR);
               $statementj->bindParam(':job_s_month', $job_s_month[$i], PDO::PARAM_STR);
               $statementj->bindParam(':job_e_year', $job_e_year[$i], PDO::PARAM_STR);
               $statementj->bindParam(':job_e_month', $job_e_month[$i], PDO::PARAM_STR);
               $statementj->bindParam(':company_name', $company_name[$i], PDO::PARAM_STR);
               $statementj->bindParam(
                    ':job_type_and_position',
                    $job_type_and_position[$i],
                    PDO::PARAM_STR
               );
               $statementj->bindParam(':income', $income[$i], PDO::PARAM_STR);
               $statementj->execute();
          }

          // print_r($family_member);
          // die();

          foreach ($cbtype as $i => $value) {
               $cbtype = $value;
               $fm = $family_member[$i];
               $fmt = $family_member_type[$i];
               $fma = $family_member_age[$i];
               $fmj = $family_member_job[$i];
               // echo $cbtype . "<br>";
               // echo $fm . "<br>";
               // echo $fmt . "<br>";
               // echo $fma . "<br>";
               // echo $fmj . "<br>";
               $statementf->bindParam(':student_id', $id, PDO::PARAM_STR);
               // $statementf->bindParam(':family_info_id', $family_info_id, PDO::PARAM_STR);
               $statementf->bindParam(':family_member', $fm, PDO::PARAM_STR);
               $statementf->bindParam(':family_member_type', $fmt, PDO::PARAM_STR);
               $statementf->bindParam(':family_member_age', $fma, PDO::PARAM_STR);
               $statementf->bindParam(':family_member_job', $fmj, PDO::PARAM_STR);
               $statementf->bindParam(':cbtype', $cbtype, PDO::PARAM_STR);
               $statementf->bindParam(':relative', $relative, PDO::PARAM_STR);
               $statementf->bindParam(':jp_family_member', $jp_family_member, PDO::PARAM_STR);
               $statementf->bindParam(':accept', $accept, PDO::PARAM_STR);
               $statementf->execute();
          }

          if (empty($errors)) {
               echo 'Data Stored';
               header('Location: index.php');
               exit();
          }
     }
}

require_once "./datainputform2.php";
