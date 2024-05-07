<?php
require_once('server/db.php');

$errors = [];

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the edited values from the form
    $student_id = $_POST['student_id'];
    $newRelative = isset($_POST['rdorelative']) ? $_POST['rdorelative'] : ''; // Check if the key is set
    $newJpFamilyMember = isset($_POST['jp_family_member']) ? $_POST['jp_family_member'] : '';
    $newAccept = isset($_POST['rdoaccept']) ? $_POST['rdoaccept'] : '';

    // Update the database with the new values
    $updateQuery = "UPDATE family_info SET relative=:relative, jp_family_member=:jp_family_member, accept=:accept WHERE student_id=:student_id";
    $statement = $pdo->prepare($updateQuery);
    $statement->bindParam(':student_id', $student_id, PDO::PARAM_STR);
    $statement->bindParam(':relative', $newRelative, PDO::PARAM_STR);
    $statement->bindParam(':jp_family_member', $newJpFamilyMember, PDO::PARAM_STR);
    $statement->bindParam(':accept', $newAccept, PDO::PARAM_STR);

    // Execute the query
    $statement->execute();

    // Redirect back to the family.php page after updating
    header("Location: cv.php?id=" . $student_id);

    exit();
} else {
    header("Location: error.php");
    exit();
}
