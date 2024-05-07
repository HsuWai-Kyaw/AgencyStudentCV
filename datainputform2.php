<form action="datainput2.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="container shadow shadow">
        <!-- education -->
        <b><span>学歴 </span></b>

        <table id="education_table" class="table table-sm table-bordered border-dark">
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
                <tr id="education_row_template">
                    <td>
                        <div class="flex">
                            <input style="width: 80px;" type="text" name="education_s_year[]" class="education_s_year">年
                            <input style="width: 80px;" type="text" name="education_s_month[]" class="education_s_month">月
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            <input style="width: 80px;" type="text" name="education_e_year[]" class="education_e_year">年
                            <input style="width: 80px;" type="text" name="education_e_month[]" class="education_e_month">月
                        </div>
                    </td>
                    <td colspan="2"><input type="text" name="school_name[]" class="school_name"></td>
                    <td colspan="2"><input type="text" name="specialized_subject[]" class="specialized_subject">
                    </td>
                    <td><input type="text" name="skills[]" class="skills"></td>
                </tr>
            </tbody>
        </table>
        <p id="add_education_row">Add New Row</p>

        <!-- job-exp -->
        <b><span>職歴</span></b>
        <table id="job_table" class="table table-sm table-bordered border-dark">
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

                <tr id="job_row_template">
                    <td>
                        <div class="flex">
                            <input style="width: 80px;" type="text" name="job_s_year[]" class="job_s_year">年
                            <input style="width: 80px;" type="text" name="job_s_month[]" class="job_s_month">月
                        </div>
                    </td>
                    <td>
                        <div class="flex">
                            <input style="width: 80px;" type="text" name="job_e_year[]" class="job_e_year">年
                            <input style="width: 80px;" type="text" name="job_e_month[]" class="job_e_month">月
                        </div>
                    </td>
                    <td colspan="2"><input type="text" name="company_name[]" class="company_name"></td>
                    <td colspan="2"><input type="text" name="job_type_and_position[]" class="job_type_and_position">
                    </td>
                    <td><input type="number" name="income[]" class="income" style="width: 50px;"></td>
                </tr>

            </tbody>
        </table>
        <p id="add_job_row">Add New Row</p>

        <!-- family-member -->
        <span><b>家族</b></span>

        <table id="family_table" class="table table-sm table-bordered border-dark">
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

                <tr id="">
                    <td colspan="2"><input type="text" name="family_member[]" class="family_member"></td>
                    <td><input type="text" name="family_member_type[]" class="family_member_type">
                    </td>
                    <td><input type="number" name="family_member_age[]" class="family_member_age" style="width: 50px;"></td>
                    <td><input type="text" name="family_member_job[]" class="family_member_job" style="width: 50px;"></td>
                    </td>
                    <!-- <td>
                              <select name="cbtype[]" id="">
                                   <option value="stay">stay</option>
                                   <option value="away">away</option>
                              </select>
                         </td> -->

                    <td>
                        <input type="checkbox" value="stay" name="cbtype[]" class="stay" onclick="disableOtherCheckbox(event)">
                    </td>
                    <td>
                        <input type="checkbox" value="away" name="cbtype[]" class="away" onclick="disableOtherCheckbox(event)">
                    </td>

                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">在日親戚？</td>
                    <td colspan="2">
                        <div class="d-flex justify-content-evenly pt-4">
                            <div>
                                <label for="yes">有</label>
                                <input type="radio" name="rdorelative" id="" value="有">
                            </div>
                            <div>
                                <label for="no">無し</label>
                                <input type="radio" name="rdorelative" id="" value="無し">
                            </div>
                        </div>
                    </td>
                    <td colspan="2">有るばい、誰？</td>
                    <td><input type="text" class="jp_family_member" name="jp_family_member" id=""></td>
                </tr>
                <tr>
                    <td colspan="4">日本へ行くことに家族は？</td>
                    <td colspan="3">
                        <div class="d-flex justify-content-evenly pt-4">
                            <div>
                                <label for="yes">賛成</label>
                                <input type="radio" name="rdoaccept" id="" value="賛成">
                            </div>
                            <div>
                                <label for="no">反対</label>
                                <input type="radio" name="rdoaccept" id="" value="反対">
                            </div>
                        </div>
                    </td>
                </tr>
            </tfoot>
        </table>
        <p id="add_family_row">Add New Row</p>


        <input type="submit" value="Submit" name="submit" class="btn btn-info">
    </div>
</form>





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // e.preventDefault()
        // Add new education row
        $('#add_education_row').click(function() {
            $("#education_row_template").clone().appendTo("#education_table");

        });
        $('#add_job_row').click(function() {
            $("#job_row_template").clone().appendTo("#job_table");

        });
        $('#add_family_row').click(function() {
            $("#family_row_template").clone().appendTo("#family_table");

        });
    });

    // Function to disable the other checkbox in the same row
    function disableOtherCheckbox(event) {
        const clickedCheckbox = event.target;
        const row = clickedCheckbox.parentNode.parentNode; // Get the parent row of the clicked checkbox
        const checkboxes = row.querySelectorAll('input[type="checkbox"]');

        checkboxes.forEach(checkbox => {
            if (checkbox !== clickedCheckbox) {
                checkbox.disabled = clickedCheckbox.checked;
            }
        });
    }

    // Add event listener to the parent element
    const familyTable = document.getElementById('family_table');

    familyTable.addEventListener('click', function(event) {
        if (event.target.matches('.stay') || event.target.matches('.away')) {
            disableOtherCheckbox(event);
        }
    });

    // Function to add a new row to the table
    function addFamilyRow() {
        const familyTable = document.getElementById('family_table');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
     <td colspan="2"><input type="text" name="family_member[]" class="family_member"></td>
                         <td><input type="text" name="family_member_type[]" class="family_member_type">
                         </td>
                         <td><input type="number" name="family_member_age[]" class="family_member_age"
                                   style="width: 50px;"></td>
                         <td><input type="text" name="family_member_job[]" class="family_member_job"
                                   style="width: 50px;"></td>
                         </td>
                         <td>
                              <input type="checkbox" value="stay" name="cbtype[]" class="stay"
                                   onclick="disableOtherCheckbox(event)">
                         </td>
                         <td>
                              <input type="checkbox" value="away" name="cbtype[]" class="away"
                                   onclick="disableOtherCheckbox(event)">
                         </td>
       `;
        familyTable.appendChild(newRow);
    }

    // Add event listener to the "Add New Row" element
    const addFamilyRowButton = document.getElementById('add_family_row');
    addFamilyRowButton.addEventListener('click', addFamilyRow);
</script>