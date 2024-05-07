<?php
require "server/db.php";
require "header.php";

$errors = [];

if (isset($_GET['id'])) {
     $id = $_GET['id'];
}

$sql = "SELECT * FROM student WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<body>

     <form action="cv.php" method="POST" enctype="multipart/form-data">
          <div class="container shadow shadow table-primary w-100">
               <table class="table table-sm table-bordered border-dark">
                    <img src="logo.png" class="rounded mx-auto d-block w-100">

                    <?php
                    foreach ($result as $key => $value) { ?>

                         <tr>
                              <!-- <th scope="col" colspan="6" class="topic"><b><span class="ft-1"> -->
                              <center>
                                   <h1>履歴書</h1>
                              </center>
                              <!-- </span></b> -->
                              <!-- </th> -->

                         </tr>
                         <tr style="height: 70px;">

                              <td><b>
                                        <h1>ID</h1>
                                   </b></td>
                              <td colspan="5"><?= $value['student_id'] ?></td>
                              <td rowspan="2" class="student_photo" style="height: 70px; width:130px"><img src="img/<?= $value['photo'] ?>" alt="" id="img" style="height: 150px; width:fit-content;">
                                   <input class="file" type="file" name="photo" id="file">
                              </td>
                         </tr>
                         <tr style="height: 70px;">

                              <td colspan="7"><b>
                                        <h2>基本情報</h2>
                                   </b></td>

                         </tr>
                         <tr>
                              <td colspan="2" for="student_name">名前</td>
                              <!-- <td colspan="2" for="student_name">name</td> -->
                              <td colspan="3"><?= $value['name'] ?></td>
                              <!-- <td rowspan="2"><span>性別</span></td> -->
                              <td rowspan="2"><span>gender</span></td>
                              <td rowspan="2">
                                   <?= $value['gender'] ?>
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">ふりがな</td> -->
                              <td colspan="2">kana name</td>
                              <td colspan="3"><?= $value['kana_name'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">生年月日</td> -->
                              <td colspan="2">DOB</td>
                              <?php
                              require "./utility/function.php";
                              ?>
                              <td colspan="3"><?= $date ?></td>


                              <!-- <td>年齢</td> -->
                              <td>Age</td>
                              <td><?= $value['age'] ?>歳</td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">国籍</td> -->
                              <td colspan="2">Country</td>
                              <td colspan="3"><?= $value['country'] ?></td>
                              <!-- <td>信仰</td> -->
                              <td>Religion</td>
                              <td><?= $value['religion'] ?></td>
                         </tr>


                         <tr>

                              <!-- <td>電話番号</td> -->
                              <td colspan="2">Telephone</td>
                              <td colspan="3"><?= $value['tel'] ?></td>

                              <!-- <td>パスポート番号</td> -->
                              <td>Passport</td>
                              <td><?= $value['passport'] ?></td>


                         </tr>
                         <tr>
                              <!-- <td colspan="2">連絡先</td> -->
                              <td colspan="2">Address</td>
                              <td colspan="5"><?= $value['address'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">住所</td> -->
                              <td colspan="2">Permanent Address</td>
                              <td colspan="5"><?= $value['per_address'] ?></td>

                         </tr>
                         <tr>
                              <!-- <td colspan="2">入学日</td> -->
                              <td colspan="2">Start Date</td>
                              <?php
                              require "./utility/function.php";
                              ?>
                              <td colspan="5"><?= $sdate ?></td>
                         </tr>

                         <tr>
                              <!-- <td colspan="2">身長(センチ)</td> -->
                              <td colspan="2">Height</td>
                              <td colspan="2">(<?= $value['height'] ?>)センチ
                              </td>
                              <!-- <td colspan="2">体重(キロ)</td> -->
                              <td colspan="2">Weight</td>
                              <td>(<?= $value['weight'] ?>)キロ</td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">婚姻</td> -->
                              <td colspan="2">Marrigae</td>
                              <td colspan="2">
                                   <?= $value['marriage'] ?>
                              </td>
                              <!-- <td colspan="2">血液</td> -->
                              <td colspan="2">Blood Type</td>
                              <td><?= $value['blood_type'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">視力</td> -->
                              <td colspan="2">Eye Test</td>
                              <td colspan="2"><?= $value['eye_test'] ?></td>
                              <!-- <td colspan="2">色覚異常</td> -->
                              <td colspan="2">Color Blind</td>
                              <td>
                                   <?= $value['color_blind'] ?>
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">利き手</td> -->
                              <td colspan="2">Hand</td>
                              <td colspan="2">
                                   <?= $value['hand'] ?>
                              </td>
                              <!-- <td colspan="2">料理</td> -->
                              <td colspan="2">Cook</td>
                              <td>
                                   <?= $value['cook'] ?>
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">病歴</td> -->
                              <td colspan="2">Disease</td>
                              <td colspan="2">
                                   <?= $value['disease'] ?>
                              </td>
                              <!-- <td colspan="2">肌上入れ墨.手術</td> -->
                              <td colspan="2">Tattoo</td>
                              <td>
                                   <?= $value['tattoo'] ?>
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">タバコを吸っているか？</td> -->
                              <td colspan="2">Smoke</td>
                              <td colspan="2">
                                   <?= $value['smoke'] ?>
                              </td>
                              <!-- <td colspan="2">お酒を飲んでいるか？</td> -->
                              <td colspan="2">Drunk</td>
                              <td>
                                   <?= $value['drunk'] ?>
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">得意科目</td> -->
                              <td colspan="2">Language</td>
                              <td colspan=" 5"><?= $value['languages'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">受け取った証明書</td> -->
                              <td colspan="2">Certificate</td>
                              <td colspan=" 5"><?= $value['certificate'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">志望動機</td> -->
                              <td colspan="2">Objective</td>
                              <td colspan=" 5"><?= $value['objective'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="2">集団生活経験</td> -->
                              <td colspan="2">Team Work</td>
                              <td colspan="2">
                                   <?= $value['teamwork'] ?>
                              </td>
                              <!-- <td colspan="2">家族の月収</td> -->
                              <td colspan="2">Family Income</td>
                              <td><?= $value['family_income'] ?>チャット
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="4">日本でやりたい仕事、ビザの種類</td> -->
                              <td colspan="4">Type of Visa</td>
                              <td colspan="3"><?= $value['type_of_visa'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="4">3年間の貯蓄目標</td> -->
                              <td colspan="4">Planning Money</td>
                              <td colspan="3">
                                   (<?= $value['planning_money'] ?>)万 </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="4">帰国後やりたい仕事</td> -->
                              <td colspan="4">Myanmar Job</td>
                              <td colspan="3"><?= $value['myanmar_job'] ?></td>
                         </tr>
                         <tr>
                              <!-- <td colspan="4">日本国に在留資格申請したことあるか？</td> -->
                              <td colspan="4">Form</td>
                              <td colspan="3">
                                   <?= $value['form'] ?>
                              </td>
                         </tr>
                         <tr>
                              <!-- <td colspan="4">あったら、どんな資格を申請したか？</td> -->
                              <td colspan="4">Old Visa</td>
                              <td colspan="3"><?= $value['old_visa'] ?></td>
                         </tr>

                    <?php } ?>
               </table>


          </div>

          <div class="container shadow shadow table-primary w-100">
               <b><span>学歴</span></b>
               <table class="table table-sm table-bordered border-dark">
                    <?php

                    $sql = "SELECT * FROM edu WHERE student_id = :student_id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);


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

                         <?php foreach ($result as $row) { ?>
                              <tr>
                                   <td><?= $row['education_s_year'] ?> 年<?= $row['education_s_month'] ?> 月</td>
                                   <td><?= $row['education_e_year'] ?> 年<?= $row['education_e_month'] ?> 月</td>
                                   <td colspan="2"><?= $row['school_name'] ?></td>
                                   <td colspan="2"><?= $row['specialized_subject'] ?></td>
                                   <td><?= $row['skills'] ?></td>
                              </tr>
                         <?php } ?>

                    </tbody>

               </table>

               <b><span>職歴</span></b>
               <table class="table table-sm table-bordered border-dark">
                    <?php

                    $sql = "SELECT * FROM job_exp WHERE student_id = :student_id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);


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
                         <?php foreach ($result as $row) { ?>
                              <tr>
                                   <td><?= $row['job_s_year'] ?> 年<?= $row['job_s_month'] ?> 月</td>
                                   <td><?= $row['job_e_year'] ?> 年<?= $row['job_e_month'] ?> 月</td>
                                   <td colspan="2"><?= $row['company_name'] ?></td>
                                   <td colspan="2"><?= $row['job_type_and_position'] ?></td>
                                   <td><?= $row['income'] ?> チャット</td>
                              </tr>
                         <?php } ?>
                    </tbody>
               </table>


               <span><b>家族</b></span>

               <table class="table table-sm table-bordered border-dark">
                    <?php

                    $sql = "SELECT * FROM family_info WHERE student_id = :student_id";
                    $statement = $pdo->prepare($sql);
                    $statement->bindParam(":student_id", $id, PDO::PARAM_STR);
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);


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
                         <?php foreach ($result as $row) { ?>

                              <tr>
                                   <td colspan="2"><?= $row['family_member'] ?></td>
                                   <td><?= $row['family_member_type'] ?></td>
                                   <td><?= $row['family_member_age'] ?></td>
                                   <td><?= $row['family_member_job'] ?></td>
                                   <td><?= $row['cbtype'] === "stay" ? "&#10003;" : "" ?></td>
                                   <td><?= $row['cbtype'] === "away" ? "&#10003;" : "" ?></td>


                              </tr>

                         <?php } ?>

                    <tfoot>
                         <tr>
                              <td colspan="2">在日親戚？</td>
                              <td colspan="">
                                   <?= $row['relative'] ?>
                              </td>
                              <td colspan="2">有るばい、誰？</td>
                              <td colspan="3"><?= $row['jp_family_member'] ?></td>
                         </tr>
                         <tr>
                              <td colspan="3">日本へ行くことに家族は？</td>
                              <td colspan="4">
                                   <?= $row['accept'] ?>
                              </td>
                         </tr>
                    </tfoot>
                    </tbody>
               </table>

          </div>
     </form>

     <!-- Back button -->
     <!-- <button class="btn btn-light" name="back"><a href="index.php">Back</a></button> -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

     <!-- <a href="index.php"><button class="btn btn-info" name="back" style="width: 150px; margin-left:300px;">Back</button></a>

     <a href="data_edit.php?id=<?= $value['student_id'] ?>"><button class="btn btn-warning" name="edit" style="width: 150px; ">Edit</button></a>

     <hr> -->

     <!-- </body> -->

     <?php
     require "footer.php";

     ?>