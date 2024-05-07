<?php
require "server/db.php";
require "header.php";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (isset($_POST['submit'])) {
          // $id = $_POST['id'];
          $student_id = $_POST['student_id'];
          $photo = $_FILES['photo'];
          $pname = $_FILES['photo']['name'];
          $tmp_name = $_FILES['photo']['tmp_name'];
          move_uploaded_file($tmp_name, "img/$pname");
          $name = $_POST['student_name'];
          $kana_name = $_POST['kana_name'];
          $gender = $_POST['rdogender'];
          $dob = $_POST['dob'];

          $age = $_POST['age'];
          $country = $_POST['country'];
          $religion = $_POST['religion'];
          // $district_id = $_POST['district_id'];
          $passport = $_POST['passport'];
          $address = $_POST['address'];
          $per_address = $_POST['per_address'];
          $tel = $_POST['tel'];
          $start_date = $_POST['start_date'];
          // $jp_lan_skill = $_POST['jp_lan_skill'];
          $height = $_POST['height'];
          $weight = $_POST['weight'];
          $marriage = $_POST['rdomarriage'];
          $blood_type = $_POST['blood_type'];
          $eye_test = $_POST['eye_test'];
          $color_blind = $_POST['rdocolorblind'];
          $hand = $_POST['rdohand'];
          $cook = $_POST['rdocook'];
          $disease = $_POST['rdodisease'];
          $tattoo = $_POST['rdotattoo'];
          $smoke = $_POST['rdosmoke'];
          $drunk = $_POST['rdodrunk'];
          $languages = $_POST['languages'];
          $certificate = $_POST['certificate'];
          $objective = $_POST['objective'];
          $teamwork = $_POST['rdoteamwork'];
          $family_income = $_POST['family_income'];
          $type_of_visa = $_POST['type_of_visa'];
          $planning_money = $_POST['planning_money'];
          $myanmar_job = $_POST['myanmar_job'];
          $form = $_POST['rdoform'];
          $old_visa = $_POST['old_visa'];

          // Insert into the "state" table
          // $state_name = $_POST['state_name'];
          // $query = "INSERT INTO state (state_name, district_id) VALUES (:state_name, :district_id)";
          // $stmt = $pdo->prepare($query);
          // $stmt->bindValue(':state_name', $state_name);
          // $stmt->bindValue(':district_id', $district_id);
          // $stmt->execute();

          // // Retrieve the last inserted ID for state_id
          // $state_id = $pdo->lastInsertId();

          // if (isset($_POST['district_id'])) {
          //      $nrc_type = $_POST['nrc_type'];
          //      $nrc_no = $_POST['nrc_no'];

          //      $sql = "INSERT INTO `nrc`(`nrc_type`, `state_id`, `nrc_no`) VALUES (:nrc_type, :state_id, :nrc_no)";
          //      $statement = $pdo->prepare($sql);
          //      $statement->bindParam(":nrc_type", $nrc_type, PDO::PARAM_STR);
          //      $statement->bindParam(":state_id", $state_id, PDO::PARAM_STR);
          //      $statement->bindParam(":nrc_no", $nrc_no, PDO::PARAM_STR);

          //      $res = $statement->execute();
          // }

          // // Retrieve the last inserted ID for nrc_id
          // $nrc_id = $pdo->lastInsertId();

          // $sql = "INSERT INTO `student`(`student_id`, `photo`, `name`, `kana_name`, `gender`, `dob`, `age`, `country`, `religion`, `nrc_id`, `passport`, `address`, `per_address`, `tel`, `start_date`, `jp_lan_skill`, `height`, `weight`, `marriage`, `blood_type`, `eye_test`, `color_blind`, `hand`, `cook`, `disease`, `tattoo`, `smoke`, `drunk`, `languages`, `certificate`, `objective`, `teamwork`, `family_income`, `type_of_visa`, `planning_money`, `myanmar_job`, `form`, `old_visa`)
          // VALUES (:student_id, :photo, :student_name, :kana_name, :gender, :dob, :age, :country, :religion, :nrc_id, :passport, :address, :per_address, :tel, :start_date, :jp_lan_skill, :height, :weight, :marriage, :blood_type, :eye_test, :color_blind, :hand, :cook, :disease, :tattoo, :smoke, :drunk, :languages, :certificate, :objective, :teamwork, :family_income, :type_of_visa, :planning_money, :myanmar_job, :form, :old_visa)";

          $sql = "INSERT INTO `student`(`student_id`, `photo`, `name`, `kana_name`, `gender`, `dob`, `age`, `country`, `religion`, `passport`, `address`, `per_address`, `tel`, `start_date`,`height`, `weight`, `marriage`, `blood_type`, `eye_test`, `color_blind`, `hand`, `cook`, `disease`, `tattoo`, `smoke`, `drunk`, `languages`, `certificate`, `objective`, `teamwork`, `family_income`, `type_of_visa`, `planning_money`, `myanmar_job`, `form`, `old_visa`)
          VALUES (:student_id, :photo, :student_name, :kana_name, :gender, :dob, :age, :country, :religion, :passport, :address, :per_address, :tel, :start_date, :height, :weight, :marriage, :blood_type, :eye_test, :color_blind, :hand, :cook, :disease, :tattoo, :smoke, :drunk, :languages, :certificate, :objective, :teamwork, :family_income, :type_of_visa, :planning_money, :myanmar_job, :form, :old_visa)";

          $statement = $pdo->prepare($sql);

          $statement->bindParam(":student_id", $student_id, PDO::PARAM_STR);
          $statement->bindParam(":photo", $pname, PDO::PARAM_STR);
          $statement->bindParam(":student_name", $name, PDO::PARAM_STR);
          $statement->bindParam(":kana_name", $kana_name, PDO::PARAM_STR);
          $statement->bindParam(":gender", $gender, PDO::PARAM_STR);
          $statement->bindParam(":dob", $dob, PDO::PARAM_STR);
          $statement->bindParam(":age", $age, PDO::PARAM_STR);
          $statement->bindParam(":country", $country, PDO::PARAM_STR);
          $statement->bindParam(":religion", $religion, PDO::PARAM_STR);
          // $statement->bindParam(":nrc_id", $nrc_id, PDO::PARAM_STR);
          $statement->bindParam(":passport", $passport, PDO::PARAM_STR);
          $statement->bindParam(":address", $address, PDO::PARAM_STR);
          $statement->bindParam(":per_address", $per_address, PDO::PARAM_STR);
          $statement->bindParam(":tel", $tel, PDO::PARAM_STR);
          $statement->bindParam(":start_date", $start_date, PDO::PARAM_STR);
          // $statement->bindParam(":jp_lan_skill", $jp_lan_skill, PDO::PARAM_STR);
          $statement->bindParam(":height", $height, PDO::PARAM_STR);
          $statement->bindParam(":weight", $weight, PDO::PARAM_STR);
          $statement->bindParam(":marriage", $marriage, PDO::PARAM_STR);
          $statement->bindParam(":blood_type", $blood_type, PDO::PARAM_STR);
          $statement->bindParam(":eye_test", $eye_test, PDO::PARAM_STR);
          $statement->bindParam(":color_blind", $color_blind, PDO::PARAM_STR);
          $statement->bindParam(":hand", $hand, PDO::PARAM_STR);
          $statement->bindParam(":cook", $cook, PDO::PARAM_STR);
          $statement->bindParam(":disease", $disease, PDO::PARAM_STR);
          $statement->bindParam(":tattoo", $tattoo, PDO::PARAM_STR);
          $statement->bindParam(":smoke", $smoke, PDO::PARAM_STR);
          $statement->bindParam(":drunk", $drunk, PDO::PARAM_STR);
          $statement->bindParam(":languages", $languages, PDO::PARAM_STR);
          $statement->bindParam(":certificate", $certificate, PDO::PARAM_STR);
          $statement->bindParam(":objective", $objective, PDO::PARAM_STR);
          $statement->bindParam(":teamwork", $teamwork, PDO::PARAM_STR);
          $statement->bindParam(":family_income", $family_income, PDO::PARAM_STR);
          $statement->bindParam(":type_of_visa", $type_of_visa, PDO::PARAM_STR);
          $statement->bindParam(":planning_money", $planning_money, PDO::PARAM_STR);
          $statement->bindParam(":myanmar_job", $myanmar_job, PDO::PARAM_STR);
          $statement->bindParam(":form", $form, PDO::PARAM_STR);
          $statement->bindParam(":old_visa", $old_visa, PDO::PARAM_STR);

          $res = $statement->execute();

          if ($res) {
               // echo "Data Stored";
               header("location:datainput2.php?id=$student_id");
          } else {
               $errors[] = "Error occurred while storing data";
          }
     }
}


require_once "./datainputform1.php";
