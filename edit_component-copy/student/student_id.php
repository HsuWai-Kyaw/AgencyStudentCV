<?php
foreach ($student as $key => $value) {
?>
     <tr style="height: 70px;">

          <td><b>
                    <h1>ID</h1>
               </b></td>
          <td colspan="5"><input type="text" name="student_id" value="<?= $value['student_id'] ?? "" ?>" readonly></td>
          <td rowspan="2" class="student_photo" style="height: 70px; width:130px">
               <input hidden name="oldphoto" value="<?php echo $value['photo'] ?>"></input>
               <img src="img/<?= $value['photo'] ?>" alt="" id="img" style="height: 150px; width:fit-content;">
               <input type="file" name="photo" accept="image/*" id="file" class="form-control file">
          </td>
     </tr>
     <tr style="height: 70px;">

          <td colspan="7"><b>
                    <h2>基本情報</h2>
               </b></td>

     </tr>
<?php
}
?>