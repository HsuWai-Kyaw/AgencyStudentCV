<form action="datainput.php" method="POST" enctype="multipart/form-data">
     <div class="container shadow shadow">
          <table class="table table-sm table-bordered border-dark">
               <img src="logo.png" class="rounded mx-auto d-block w-100">

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
                    <td colspan="5"><input type="text" name="student_id" id=""></td>
                    <td rowspan="2" class="student_photo" style="height: 70px; width:130px"><img src="empty.jpg" alt="" id="img" style="height: 150px; width:fit-content;">
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
                    <!-- <td colspan="2" for="student_name">Name</td> -->
                    <td colspan="3"><input type="text" name="student_name" id=""></td>
                    <td rowspan="2"><span>性別</span></td>
                    <!-- <td rowspan="2"><span>Gender</span></td> -->
                    <td rowspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="male">男</label>
                                   <!-- <label for="male">male</label> -->
                                   <input type="radio" name="rdogender" id="male" value="男" style="width:10px;">
                              </div>
                              <div>
                                   <label for="female">女</label>
                                   <!-- <label for="female">female</label> -->
                                   <input type="radio" name="rdogender" id="female" value="女" style="width:10px;">
                              </div>
                         </div>

                    </td>
               </tr>
               <tr>
                    <td colspan="2">ふりがな</td>
                    <!-- <td colspan="2">KanaName</td> -->
                    <td colspan="3"><input type="text" name="kana_name" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">生年月日</td>
                    <!-- <td colspan="2">DOB</td> -->
                    <td colspan="3"><input type="date" name="dob" id=""></td>
                    <td>年齢</td>
                    <!-- <td>Age</td> -->
                    <td>(<input type="number" name="age" id="" style="width: 40px;" min="16" max="70">)歳</td>
               </tr>
               <tr>
                    <td colspan="2">国籍</td>
                    <!-- <td colspan="2">Country</td> -->
                    <td colspan="3"><input type="text" name="country" id=""></td>
                    <td>信仰</td>
                    <!-- <td>Religion</td> -->
                    <td><input type="text" name="religion" id=""></td>
               </tr>


               <tr>
                    <td colspan="2">電話番号</td>
                    <!-- <td colspan="2">Telephone</td> -->
                    <td colspan="3"><input type="tel" name="tel" id=""></td>

                    <td>パスポート番号</td>
                    <!-- <td>Passport</td> -->
                    <td><input type="text" name="passport" id=""></td>


               </tr>
               <tr>
                    <td colspan="2">連絡先</td>
                    <!-- <td colspan="2">Address</td> -->
                    <td colspan="5"><textarea name="address" id="" cols="120" rows="3"></textarea></td>
               </tr>
               <tr>
                    <td colspan="2">住所</td>
                    <!-- <td colspan="2">Permanent Address</td> -->
                    <td colspan="5"><textarea name="per_address" id="" cols="120" rows="3"></textarea></td>

               </tr>
               <tr>
                    <td colspan="2">入学日</td>
                    <!-- <td colspan="2">Start Date</td> -->
                    <td colspan="5"><input type="date" name="start_date"></td>
               </tr>
               <!-- <tr>
                    <td colspan="2">日本語能力</td>

                    <td colspan="5"><input type="text" name="jp_lan_skill" id=""></td>

               </tr> -->
               <tr>
                    <td colspan="2">身長(センチ)</td>
                    <!-- <td colspan="2">Height</td> -->
                    <td colspan="2">(<input type="number" name="height" id="" min="" max="" style="width: 40px;">)センチ
                    </td>
                    <td colspan="2">体重(キロ)</td>
                    <!-- <td colspan="2">Weight</td> -->
                    <td>(<input type="number" name="weight" min="20" max="" id="" style="width: 40px;">)キロ</td>
               </tr>
               <tr>
                    <td colspan="2">婚姻</td>
                    <!-- <td colspan="2">Marriage</td> -->
                    <td colspan="2">

                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <!-- <label for="yes">有</label> -->
                                   <label for="yes">yes</label>
                                   <input type="radio" name="rdomarriage" id="yes" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <!-- <label for="no">無し</label> -->
                                   <label for="no">no</label>
                                   <input type="radio" name="rdomarriage" id="no" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">血液</td>
                    <!-- <td colspan="2">Blood Type</td> -->
                    <td><input type="text" name="blood_type" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">視力</td>
                    <!-- <td colspan="2">Eye Test</td> -->
                    <td colspan="2"><input type="text" name="eye_test" id=""></td>
                    <td colspan="2">色覚異常</td>
                    <!-- <td colspan="2">Color Blind</td> -->
                    <td>

                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdocolorblind" id="yes" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdocolorblind" id="no" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">利き手</td>
                    <!-- <td colspan="2">Hand</td> -->
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="left">右</label>
                                   <!-- <label for="left">Left</label> -->
                                   <input type="radio" name="rdohand" id="left" value="右" style="width:10px;">
                              </div>
                              <div>
                                   <label for="right">左</label>
                                   <!-- <label for="right">Right</label> -->
                                   <input type="radio" name="rdohand" id="right" value="左" style="width:10px;">
                              </div>
                         </div>

                    </td>
                    <td colspan="2">料理</td>
                    <!-- <td colspan="2">Cook</td> -->
                    <td>
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdocook" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdocook" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">病歴</td>
                    <!-- <td colspan="2">Disease</td> -->
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdodisease" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdodisease" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">肌上入れ墨.手術</td>
                    <!-- <td colspan="2">Tattoo</td> -->
                    <td>
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->

                                   <input type="radio" name="rdotattoo" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdotattoo" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">タバコを吸っているか？</td>
                    <!-- <td colspan="2">Smoke</td> -->
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdosmoke" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdosmoke" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">お酒を飲んでいるか？</td>
                    <!-- <td colspan="2">Drunk</td> -->
                    <td>
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdodrunk" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdodrunk" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="2">得意科目</td>
                    <!-- <td colspan="2">Language</td> -->
                    <td colspan=" 5"><input type="text" name="languages" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">受け取った証明書</td>
                    <!-- <td colspan="2">Certificate</td> -->
                    <td colspan=" 5"><input type="text" name="certificate" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">志望動機</td>
                    <!-- <td colspan="2">Objective</td> -->
                    <td colspan=" 5"><input type="text" name="objective" id=""></td>
               </tr>
               <tr>
                    <td colspan="2">集団生活経験</td>
                    <!-- <td colspan="2">Team Work</td> -->
                    <td colspan="2">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdoteamwork" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdoteamwork" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
                    <td colspan="2">家族の月収</td>
                    <!-- <td colspan="2">Family Income</td> -->
                    <td><input type="number" name="family_income" min="" max="" id="" style="width: 40px;">チャット
                    </td>
               </tr>
               <tr>
                    <td colspan="4">日本でやりたい仕事、ビザの種類</td>
                    <!-- <td colspan="4">Type of Visa</td> -->
                    <td colspan="3"><input type="text" name="type_of_visa" id=""></td>
               </tr>
               <tr>
                    <td colspan="4">3年間の貯蓄目標</td>
                    <!-- <td colspan="4">Planning Money</td> -->
                    <td colspan="3"><input type="number" name="planning_money" id="" min="" max="" style="width: 150px;">万
                    </td>
               </tr>
               <tr>
                    <td colspan="4">帰国後やりたい仕事</td>
                    <!-- <td colspan="4">Myanmar Job</td> -->
                    <td colspan="3"><input type="text" name="myanmar_job" id=""></td>
               </tr>
               <tr>
                    <td colspan="4">日本国に在留資格申請したことあるか？</td>
                    <!-- <td colspan="4">Form</td> -->
                    <td colspan="3">
                         <div class="d-flex justify-content-evenly pt-4">
                              <div>
                                   <label for="yes">有</label>
                                   <!-- <label for="yes">yes</label> -->
                                   <input type="radio" name="rdoform" value="有" style="width:10px;">
                              </div>
                              <div>
                                   <label for="no">無し</label>
                                   <!-- <label for="no">no</label> -->
                                   <input type="radio" name="rdoform" value="無し" style="width:10px;">
                              </div>
                         </div>
                    </td>
               </tr>
               <tr>
                    <td colspan="4">あったら、どんな資格を申請したか？</td>
                    <td colspan="3"><input type="text" name="old_visa" id=""></td>
               </tr>

          </table>
          <input type="submit" value="Submit" name="submit" class="btn btn-info">

     </div>
</form>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
<script src="./js/ajax.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
     // $(document).ready(function() {
     //      $(".district").change(function() {
     //           var district_id = $(this).val();

     //           $.ajax({
     //                url: "input.php",
     //                method: "POST",
     //                data: {
     //                     district_id: district_id
     //                },
     //                success: function(data) {
     //                     $(".state").html(data);
     //                }
     //           });
     //      });

     // });
     /* if img click input file will be upload */
     img.onclick = () => file.click();
     file.addEventListener('change', function() {
          /* to get file */
          let f = file.files[0];
          /* use url object for to get file url */
          img.src = URL.createObjectURL(f);
          console.log(f);
          img.onload = function() {
               let maxWidth = 250;
               let maxHeight = 250;
               if (img.width > maxWidth || img.height > maxHeight) {
                    let aspectRatio = img.width / img.height;
                    if (aspectRatio > 1) {
                         img.width = maxWidth;
                         img.height = maxWidth / aspectRatio;
                    } else {
                         img.height = maxHeight;
                         img.width = maxHeight * aspectRatio;
                    }
               }
          };
     });
</script>