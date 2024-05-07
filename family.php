<?php
require "server/db.php";

$errors = [];
$sql = "SELECT * FROM family_info WHERE student_id = :student_id";
$statement = $pdo->prepare($sql);
$statement->bindParam(":student_id", $id, PDO::PARAM_STR);
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);


$stmt = $pdo->prepare("SELECT relative, jp_family_member, accept FROM family_info WHERE student_id = :student_id");
$stmt->execute(['student_id' => $id]);
$associatedData = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="modal fade" id="familyAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h1 class="modal-title fs-5">New Record</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="familyAdd">
                    <div class="modal-body">
                         <div id="errorMessage" class="alert alert-warning d-none"></div>

                         <input type="text" name="student_id" value="<?= $id ?>" class="form-control" readonly>

                         <div class="mb-3">
                              <label for="family_member">家族氏名</label>
                              <input type="text" name="family_member" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_type"> 続柄</label>
                              <input type="text" name="family_member_type" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_age">年齢</label>
                              <input type="text" name="family_member_age" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_job">職業</label>
                              <input type="text" name="family_member_job" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="cbtype">同居</label>
                              <input type="checkbox" value="stay" name="cbtype" class="stay" onclick="disableOtherCheckbox(event)">
                              <label for="cbtype">別居</label>
                              <input type="checkbox" value="away" name="cbtype" class="away" onclick="disableOtherCheckbox(event)">
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

<div class="modal fade" id="familyEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Edit 家族</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="updateFamily">
                    <div class="modal-body">
                         <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
                         <input type="text" name="family_info_id" id="family_info_id" hidden>
                         <div class="mb-3">
                              <label for="family_member">家族氏名</label>
                              <input type="text" name="family_member" id="family_member" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_type"> 続柄</label>
                              <input type="text" name="family_member_type" id="family_member_type" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_age">年齢</label>
                              <input type="text" name="family_member_age" id="family_member_age" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="family_member_job">職業</label>
                              <input type="text" name="family_member_job" id="family_member_job" class="form-control">
                         </div>
                         <div class="mb-3">
                              <label for="cbtype">同居</label>
                              <input type="checkbox" value="stay" name="cbtype" class="stay" onclick="disableOtherCheckbox(event)">
                              <label for="cbtype">別居</label>
                              <input type="checkbox" value="away" name="cbtype" class="away" onclick="disableOtherCheckbox(event)">
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>
               </form>
          </div>
     </div>
</div>


<!-- absolute -->

<!-- Edit -->
<div class="modal fade" id="associatedEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title">Edit Associated Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form id="updateAssociateForm" action="associated.php" method="POST">
                    <div class="modal-body">
                         <!-- Input fields for editing associated data -->
                         <input type="hidden" name="student_id" value="<?= $id ?>">
                         <div class="mb-3">
                              <label for="rdorelative">在日親戚？</label>
                              <div>
                                   <input type="radio" name="rdorelative" id="rdoyes" value="有" <?= $associatedData['relative'] === '有' ? 'checked' : '' ?>>
                                   <label for="rdoyes">有</label>
                                   <input type="radio" name="rdorelative" id="rdono" value="無し" <?= $associatedData['relative'] === '無し' ? 'checked' : '' ?>>
                                   <label for="rdono">無し</label>
                              </div>
                         </div>

                         <div class="mb-3">
                              <label for="jp_family_member">有るばい、誰？</label>
                              <input type="text" name="jp_family_member" class="form-control" id="jp_family_member" value="<?= $associatedData['jp_family_member'] ?>">
                         </div>
                         <div class="mb-3">
                              <label for="rdoaccept">日本へ行くことに家族は？</label>
                              <div>
                                   <input type="radio" name="rdoaccept" id="accept_yes" value="賛成" <?= $associatedData['accept'] === '賛成' ? 'checked' : '' ?>>
                                   <label for="accept_yes">賛成</label>
                                   <input type="radio" name="rdoaccept" id="accept_no" value="反対" <?= $associatedData['accept'] === '反対' ? 'checked' : '' ?>>
                                   <label for="accept_no">反対</label>
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Update Associate</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<!-- <abbr title=""></abbr> -->

<div class="container">
     <div class="row">
          <div class="col-md-12">
               <div class="card">
                    <div class="card-header">
                         <h4>家族
                              <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#familyAddModal">Add +</button>
                         </h4>
                    </div>
                    <table id="myfamilyTable" class="table table-bordered table-striped">
                         <thead>
                              <tr>
                                   <th>家族氏名</th>
                                   <th>続柄</th>
                                   <th>年齢</th>
                                   <th>職業</th>
                                   <th>同居</th>
                                   <th>別居</th>
                                   <th>Action</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach ($student as $result) : ?>
                                   <tr id="">
                                        <td><input type="text" name="family_member" class="family_member" value="<?= $result['family_member'] ?? "" ?>" readonly></td>
                                        <td><input type="text" name="family_member_type" class="family_member_type" value="<?= $result['family_member_type'] ?? "" ?>" readonly></td>
                                        <td><input type="number" name="family_member_age" class="family_member_age" value="<?= $result['family_member_age'] ?? "" ?>" style="width: 50px;" readonly></td>
                                        <td><input type="text" name="family_member_job" class="family_member_job" value="<?= $result['family_member_job'] ?? "" ?>" style="width: 50px;" readonly></td>
                                        <td><?= $result['cbtype'] === "stay" ? "&#10003;" : "" ?></td>
                                        <td><?= $result['cbtype'] === "away" ? "&#10003;" : "" ?></td>
                                        <td>
                                             <button type="button" data-bs-toggle="modal" data-bs-target="#familyEditModal" value="<?= $result['family_info_id']; ?>" class="editFamily btn btn-warning">Edit</button>
                                             <button type="button" value="<?= $result['family_info_id']; ?>" class="deleteFamily btn btn-danger ">Delete</button>
                                        </td>
                                   </tr>
                              <?php endforeach; ?>
                         </tbody>

                         <form action="associated.php" method="POST">
                              <tfoot>
                                   <tr>
                                        <td colspan="2">在日親戚？</td>
                                        <td colspan="2"><input type="text" name="relative" value="<?= $result['relative'] ?>"></td>
                                        <td colspan="2">有るばい、誰？</td>
                                        <td colspan="3"><input type="text" name="jp_family_member" value="<?= $result['jp_family_member'] ?>"></td>
                                   </tr>
                                   <tr>
                                        <td colspan="3">日本へ行くことに家族は？</td>
                                        <td colspan="4"><input type="text" name="accept" value="<?= $result['accept'] ?>"></td>
                                   </tr>
                                   <tr>
                                        <td colspan="7">
                                             <!-- Button to trigger the modal -->
                                             <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#associatedEditModal">Edit</button>
                                        </td>
                                   </tr>
                              </tfoot>
                         </form>

                    </table>
               </div>
          </div>
     </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
     // AJAX function for adding new record
     $("#familyAdd").submit(function(event) {
          event.preventDefault();
          var formData = new FormData(this);
          formData.append('add_family', true);
          location.reload();

          // Perform AJAX request
          $.ajax({
               type: "POST",
               url: "family_data_update.php",
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
                         $('#familyAddModal').modal('hide');
                         $('#familyAdd')[0].reset();

                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);

                         $('#myfamilyTable').load(location.href + " #myfamilyTable");

                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });
     });

     $(document).on('click', '.editFamily', function() {
          var family_info_id = $(this).val();
          $.ajax({
               type: "GET",
               url: "family_data_update.php?id=" + family_info_id,
               success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {
                         alert(res.message);
                    } else if (res.status === 200) {
                         $('#family_info_id').val(res.data.family_info_id);
                         $('#family_member').val(res.data.family_member);
                         $('#family_member_type').val(res.data.family_member_type);
                         $('#family_member_age').val(res.data.family_member_age);
                         $('#family_member_job').val(res.data.family_member_job);

                         // Check the checkbox based on the value of cbtype
                         if (res.data.cbtype === 'stay') {
                              $('.stay').prop('checked', true);
                              $('.away').prop('checked', false); // Uncheck the other checkbox
                         } else if (res.data.cbtype === 'away') {
                              $('.away').prop('checked', true);
                              $('.stay').prop('checked', false); // Uncheck the other checkbox
                         }

                         $('#familyEditModal').modal('show');
                    }
               }
          });
     });

     $("#updateFamily").submit(function(event) {
          event.preventDefault();
          var formData = new FormData(this);
          formData.append("update_family", true);

          // Get the current cbtype value
          var cbtype = null;
          if ($('.stay').is(':checked')) {
               cbtype = 'stay';
          } else if ($('.away').is(':checked')) {
               cbtype = 'away';
          }

          // Append cbtype to formData if it's not null
          if (cbtype !== null) {
               formData.append('cbtype', cbtype);
          }

          $.ajax({
               type: "POST",
               url: "family_data_update.php",
               data: formData,
               processData: false,
               contentType: false,
               success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                         $('#errorMessageUpdate').removeClass('d-none');
                         $('#errorMessageUpdate').text(res.message);
                    } else if (res.status == 200) {
                         $('#errorMessageUpdate').addClass('d-none');
                         alertify.set('notifier', 'position', 'top-right');
                         alertify.success(res.message);
                         $('#familyEditModal').modal('hide');
                         $('#updateFamily')[0].reset();
                         $('#myfamilyTable').load(location.href + " #myfamilyTable");
                         window.location.reload();
                    } else if (res.status == 500) {
                         alert(res.message);
                    }
               }
          });
     });


     // AJAX function for deleting record
     $(document).on('click', '.deleteFamily', function(e) {
          e.preventDefault();
          if (confirm('Sure?')) {
               var family_info_id = $(this).val();

               $.ajax({
                    type: "POST", // Change to POST to send data to the server
                    url: "family_data_update.php", // Change to the URL where your PHP code resides
                    data: {
                         deleteFamily: true,
                         family_info_id: family_info_id
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