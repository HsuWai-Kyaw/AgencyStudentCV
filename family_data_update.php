<?php
require_once('server/db.php');
$errors = [];


if (isset($_GET['id'])) {
     $family_info_id = $_GET['id'];
     $select = "SELECT * FROM family_info WHERE family_info_id=:family_info_id";
     $selectstatement = $pdo->prepare($select);
     $selectstatement->bindParam(':family_info_id', $family_info_id, PDO::PARAM_STR);
     $select_res = $selectstatement->execute();
     $select_res = $selectstatement->fetch();
     // print_r($select_res);
     // die();

     if ($select_res) {
          $res = [
               'status' => 200,
               'message' => 'Data Fetch Successfully',
               'data' => $select_res
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 404,
               'message' => 'ID not found!'
          ];
          echo json_encode($res);
          return;
     }
}


if (isset($_POST['add_family'])) {
     $student_id = $_POST['student_id'];
     $staticinsert = "SELECT relative, jp_family_member, accept FROM family_info WHERE student_id = :student_id";
     $staticinsertstatement = $pdo->prepare($staticinsert);
     $staticinsertstatement->bindParam(':student_id', $student_id, PDO::PARAM_STR);
     $static_result = $staticinsertstatement->execute();
     $static_result = $staticinsertstatement->fetch();
     $relative = $static_result['relative'];
     $jp_family_member = $static_result['jp_family_member'];
     $accept = $static_result['accept'];

     $family_member = $_POST['family_member'];
     $family_member_type = $_POST['family_member_type'];
     $family_member_age = $_POST['family_member_age'];
     $family_member_job = $_POST['family_member_job'];
     $cbtype = $_POST['cbtype'];

     // $student_id = 'R-004';
     // $family_member = 'Tea';
     // $family_member_type = 'Time';
     // $family_member_age = '90';
     // $family_member_job = 'Free';
     // $cbtype = 'stay';

     // if ($family_member == NULL || $family_member_type == NULL || $family_member_age == NULL || $family_member_job == NULL || $cbtype == NULL) {
     //      $res = [
     //           'status' => 422,
     //           'message' => 'All fields are necessary'
     //      ];
     //      echo json_encode($res);
     //      return;
     // }

     $insertqry = "INSERT INTO `family_info`(`student_id`,`family_member`, `family_member_type`, `family_member_age`, `family_member_job`, `cbtype`, `relative`, `jp_family_member`, `accept`) VALUES (:student_id,:family_member, :family_member_type, :family_member_age, :family_member_job, :cbtype, :relative, :jp_family_member, :accept)";
     $addstatement = $pdo->prepare($insertqry);
     $addstatement->bindParam(':student_id', $student_id, PDO::PARAM_STR);

     $addstatement->bindParam(
          ':family_member',
          $family_member,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':family_member_type',
          $family_member_type,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':family_member_age',
          $family_member_age,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(
          ':family_member_job',
          $family_member_job,
          PDO::PARAM_STR
     );
     $addstatement->bindParam(':cbtype', $cbtype, PDO::PARAM_STR);
     $addstatement->bindParam(':relative', $relative, PDO::PARAM_STR);
     $addstatement->bindParam(':jp_family_member', $jp_family_member, PDO::PARAM_STR);
     $addstatement->bindParam(':accept', $accept, PDO::PARAM_STR);

     $add = $addstatement->execute();


     if ($add) {
          $res = [
               'status' => 200,
               'message' => 'Record added Successfully'
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 500,
               'message' => 'New Record Not Created'
          ];
          echo json_encode($res);
          return;
     }
}
if (isset($_POST['update_family'])) {
     $family_info_id = $_POST['family_info_id'];
     $static = "SELECT relative, jp_family_member, accept, cbtype FROM family_info WHERE family_info_id = :family_info_id";
     $staticstatement = $pdo->prepare($static);
     $staticstatement->bindParam(':family_info_id', $family_info_id, PDO::PARAM_STR);
     $static_res = $staticstatement->execute();
     $static_res = $staticstatement->fetch();
     $relative = $static_res['relative'];
     $jp_family_member = $static_res['jp_family_member'];
     $accept = $static_res['accept'];
     $cbtype = $static_res['cbtype'];

     $family_member = $_POST['family_member'] ?? null;
     $family_member_type = $_POST['family_member_type'] ?? null;
     $family_member_age = $_POST['family_member_age'] ?? null;
     $family_member_job = $_POST['family_member_job'] ?? null;

     // Toggle cbtype value between stay and away
     if ($cbtype === 'stay') {
          $cbtype = 'away';
     } else {
          $cbtype = 'stay';
     }

     $updateqry = "UPDATE `family_info` SET `family_member`=:family_member, `family_member_type`=:family_member_type, `family_member_age`=:family_member_age, `family_member_job`=:family_member_job, `cbtype`=:cbtype, `relative` = :relative, `jp_family_member`=:jp_family_member, `accept`=:accept WHERE family_info_id=:family_info_id";

     $updatestatement = $pdo->prepare($updateqry);
     $updatestatement->bindParam(':family_info_id', $family_info_id, PDO::PARAM_STR);
     $updatestatement->bindParam(':family_member', $family_member, PDO::PARAM_STR);
     $updatestatement->bindParam(':family_member_type', $family_member_type, PDO::PARAM_STR);
     $updatestatement->bindParam(':family_member_age', $family_member_age, PDO::PARAM_STR);
     $updatestatement->bindParam(':family_member_job', $family_member_job, PDO::PARAM_STR);
     $updatestatement->bindParam(':cbtype', $cbtype, PDO::PARAM_STR);
     $updatestatement->bindParam(':relative', $relative, PDO::PARAM_STR);
     $updatestatement->bindParam(':jp_family_member', $jp_family_member, PDO::PARAM_STR);
     $updatestatement->bindParam(':accept', $accept, PDO::PARAM_STR);

     $updates = $updatestatement->execute();

     if ($updates) {
          $res = [
               'status' => 200,
               'message' => 'Updated Successfully'
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 500,
               'message' => 'Not Updated'
          ];
          echo json_encode($res);
          return;
     }
}


if (isset($_POST['deleteFamily'])) {
     $family_info_id = $_POST['family_info_id'];

     $deleteqry = "DELETE FROM family_info WHERE family_info_id = :family_info_id";

     $deletestmt = $pdo->prepare($deleteqry);
     $deletestmt->bindParam(':family_info_id', $family_info_id, PDO::PARAM_STR);
     $delete = $deletestmt->execute();

     if ($delete) {
          $res = [
               'status' => 200,
               'message' => 'Edu Data Deleted.'
          ];
          echo json_encode($res);
          return;
     } else {
          $res = [
               'status' => 500,
               'message' => 'Deletion Failed.'
          ];
          echo json_encode($res);
          return;
     }
}
