<?php
require "server/db.php";
$errors = [];
$sql = "SELECT * FROM edu WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Add Student -->
<div class="modal fade" id="eduAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5">New Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="eduAdd">
                    <div class="modal-body">
                         <div id="errorMessage" class="alert alert-warning d-none"></div>

                         <input type="text" name="student_id" value="<?= $id ?>" class="form-control" readonly>

                         <div class="mb-3">
                              <label for="education_s_year">開始年</label>
                              <input type="text" name="education_s_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="education_s_month">開始月</label>
                              <input type="text" name="education_s_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="education_e_year">終了年</label>
                              <input type="text" name="education_e_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="education_e_month">終了月</label>
                              <input type="text" name="education_e_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="school_name">会社名 </label>
                              <input type="text" name="school_name" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="specialized_subject">仕事内容</label>
                              <input type="text" name="specialized_subject" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="skills">給料 </label>
                              <input type="text" name="skills" class="form-control">
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<!-- Edit -->
<div class="modal fade" id="eduEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Edit 職歴</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="updateEdu">
                    <div class="modal-body">
                         <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                         <input type="text" name="edu_id" id="edu_id" hidden>

                         <div class="mb-3">
                              <label for="education_s_year">開始年</label>
                              <input type="text" name="education_s_year" id="education_s_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="education_s_month">開始月</label>
                              <input type="text" name="education_s_month" id="education_s_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="education_e_year">終了年</label>
                              <input type="text" name="education_e_year" id="education_e_year" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="education_e_month">終了月</label>
                              <input type="text" name="education_e_month" id="education_e_month" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="school_name">会社名 </label>
                              <input type="text" name="school_name" id="school_name" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="specialized_subject">仕事内容 </label>
                              <input type="text" name="specialized_subject" id="specialized_subject" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="skills">給料 </label>
                              <input type="text" name="skills" id="skills" class="form-control">
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class=" btn btn-primary">Update Education Record</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                         <h4>職歴

                              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#eduAddModal">
                                   Add +
                              </button>
                         </h4>
                    </div>

                    <table id="myEduTable" class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <td>開始年</td>
                                   <td> 終了年</td>
                                   <td>会社名</td>
                                   <td>仕事内容 </td>
                                   <td>給料</td>
                                   <!-- <td>id</td> -->
                              </tr>

                         </thead>
                         <tbody>
                              <?php foreach ($student as $result) {
                                   // print_r($row);
                              ?>


                                   <tr>
                                        <td>
                                             <input type="text" name="education_s_year" value=" <?= $result['education_s_year'] ?? "" ?>" style="width: 50px;">
                                             年
                                             <input type="text" name="education_s_month" value="<?= $result['education_s_month'] ?>" style="width: 50px;">
                                             月

                                        </td>
                                        <td>
                                             <input type="text" name="education_e_year" value="<?= $result['education_e_year'] ?? "" ?>" style="width: 50px;">
                                             年
                                             <input type="text" name="education_e_month" value="<?= $result['education_e_month'] ?? "" ?>" style="width: 50px;">
                                             月
                                        </td>
                                        <td><input type="text" name="school_name" value="<?= $result['school_name'] ?? "" ?>">
                                        </td>
                                        <td><input type="text" name="specialized_subject" value="<?= $result['specialized_subject'] ?? "" ?>">
                                        </td>
                                        <td><input type="text" name="skills" value="<?= $result['skills'] ?? "" ?>">
                                        </td>

                                        <td>

                                             <button type="button" data-bs-toggle="modal" data-bs-target="#eduEditModal" value="<?= $result['edu_id']; ?>" class="editEdu btn btn-warning">Edit</button>
                                             <button type="button" value="<?= $result['edu_id']; ?>" class="deleteEdu btn btn-danger">Delete</button>


                                        </td>
                                   </tr>

                              <?php } ?>

                         </tbody>
                    </table>
               </div>
          </div>
     </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
     $(document).on('submit', '#eduAdd', function(e) {
          e.preventDefault();
          // alert('G');
          var formData = new FormData(this)
          // alert(formData);
          formData.append('add_edu', true);
          location.reload();
          // console.log('formData :>> ', formData);

          $.ajax({
               type: "POST",
               url: "edu_data_update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                         $('#errorMessage').removeClass('d-none');
                         $('#errorMessage').text(res.message);
                    } else if (res.status == 200) {

                         $('#errorMessage').addClass('d-none');
                         $('#eduAddModal').modal('hide');
                         $('#eduAdd')[0].reset();

                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);

                         $('#myEduTable').load(location.href + " #myEduTable");

                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });
     });
     $(document).on('click', '.editEdu', function() {

          var edu_id = $(this).val();
          // alert(edu_id);
          $.ajax({
               type: "GET",
               url: "edu_data_update.php?id=" + edu_id,
               success: function(response) {
                    // console.log('====================================');
                    // console.log(response);
                    // console.log('====================================');
                    // var res = jQuery.parseJSON('{ "name": "John" }');
                    var res = jQuery.parseJSON(response);
                    // console.log(res);

                    if (res.status == 404) {
                         alert(res.message);
                    } else if (res.status === 200) {
                         // $('#student_id').val(res.data.id);
                         $('#edu_id').val(res.data.edu_id);
                         $('#education_s_year').val(res.data.education_s_year);
                         $('#education_s_month').val(res.data.education_s_month);
                         $('#education_e_year').val(res.data.education_e_year);
                         $('#education_e_month').val(res.data.education_e_month);
                         $('#school_name').val(res.data.school_name);
                         $('#specialized_subject').val(res.data.specialized_subject);
                         $('#skills').val(res.data.skills);

                         $('#eduEditModal').modal('show');
                    }
               }
          });
     });

     $(document).on('submit', '#updateEdu', function(e) {
          e.preventDefault();

          var formData = new FormData(this);
          // const values = [...formData.entries()];
          // console.log(values);

          formData.append("update_edu", true);

          $.ajax({
               type: "POST",
               url: "edu_data_update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response) {
                    console.log('====================================');
                    console.log(response);
                    console.log('====================================');
                    var res = jQuery.parseJSON(response);

                    if (res.status == 422) {
                         $('#errorMessageUpdate').removeClass('d-none');
                         $('#errorMessageUpdate').text(res.message);

                    } else if (res.status == 200) {

                         $('#errorMessageUpdate').addClass('d-none');

                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);

                         $('#eduEditModal').modal('hide');
                         $('#updateEdu')[0].reset();


                         $('#myEduTable').load(location.href + " #myEduTable");
                         window.location.reload();

                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });

     });

     $(document).on('click', '.deleteEdu', function(e) {
          e.preventDefault();
          if (confirm('Sure?')) {
               var edu_id = $(this).val();

               $.ajax({
                    type: "POST", // Change to POST to send data to the server
                    url: "edu_data_update.php", // Change to the URL where your PHP code resides
                    data: {
                         deleteEdu: true,
                         edu_id: edu_id
                    }, // Send the data as an object
                    success: function(response) {
                         try {
                              var result = JSON.parse(response);
                              if (result.status === 200) {
                                   // Data was successfully deleted
                                   // You can refresh the page or update the UI as needed
                                   location.reload(); // For example, refresh the page
                              } else {
                                   // Handle the case where deletion was not successful
                                   console.error("Deletion failed: " + result.message);
                              }
                         } catch (error) {
                              console.error("Error parsing JSON response: " + error);
                         }
                    },
                    error: function(xhr, status, error) {
                         console.error("Error: " + xhr.responseText);
                    }
               });
          }
     });
</script>