<?php
include "dbconnect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $chest_pain_type = $_POST['chest_pain_type'];
    $bp = $_POST['bp'];
    $cholesterol = $_POST['cholesterol'];
    $fbs_over_120 = $_POST['fbs_over_120'];
    $ekg_results = $_POST['ekg_results'];
    $max_hr = $_POST['max_hr'];
    $exercise_angina = $_POST['exercise_angina'];
    $st_depression = $_POST['st_depression'];
    $slope_of_st = $_POST['slope_of_st'];
    $num_vessels_fluro = $_POST['num_vessels_fluro'];
    $thallium = $_POST['thallium'];

    // Insert patient input
    $sql = "INSERT INTO patient_inputs 
        (age, sex, chest_pain_type, bp, cholesterol, fbs_over_120, ekg_results,
         max_hr, exercise_angina, st_depression, slope_of_st, num_vessels_fluro, thallium)
        VALUES
        ('$age', '$sex', '$chest_pain_type', '$bp', '$cholesterol', '$fbs_over_120', '$ekg_results',
         '$max_hr', '$exercise_angina', '$st_depression', '$slope_of_st', '$num_vessels_fluro', '$thallium')";

    if ($conn->query($sql) === TRUE) {

        $inputID = $conn->insert_id;

        $pythonPath = __DIR__ . "\\venv\\Scripts\\python.exe";
        $scriptPath = __DIR__ . "\\model\\predict.py";

        $command = "\"$pythonPath\" \"$scriptPath\" "
            . escapeshellarg($age) . " "
            . escapeshellarg($sex) . " "
            . escapeshellarg($chest_pain_type) . " "
            . escapeshellarg($bp) . " "
            . escapeshellarg($cholesterol) . " "
            . escapeshellarg($fbs_over_120) . " "
            . escapeshellarg($ekg_results) . " "
            . escapeshellarg($max_hr) . " "
            . escapeshellarg($exercise_angina) . " "
            . escapeshellarg($st_depression) . " "
            . escapeshellarg($slope_of_st) . " "
            . escapeshellarg($num_vessels_fluro) . " "
            . escapeshellarg($thallium)
            . " 2>&1";

        $output = shell_exec($command);
        $prediction_result = (int)trim($output);

        // Save prediction only
        $model_version = "RandomForest_v1";

        $sql2 = "INSERT INTO predictions 
            (inputID, result, model_version)
            VALUES
            ('$inputID', '$prediction_result', '$model_version')";

        $conn->query($sql2);

    } else {
        die("Error inserting data: " . $conn->error);
    }

} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Prediction Result</title>
<style>
body {
    font-family: "Segoe UI", Tahoma, sans-serif;
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
.result-card {
    background: white;
    padding: 30px;
    width: 400px;
    border-radius: 12px;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
}
.status {
    font-size: 22px;
    font-weight: bold;
    margin: 20px 0;
}
.positive { color: #c0392b; }
.negative { color: #27ae60; }
a {
    display: inline-block;
    margin-top: 20px;
    text-decoration: none;
    color: white;
    background: #b30000;
    padding: 10px 20px;
    border-radius: 6px;
}
a:hover {
    background: #8f0000;
}
</style>
</head>
<body>
<div class="result-card">
    <h2>Prediction Result</h2>

    <?php if ($prediction_result == 1) { ?>
        <div class="status positive">Heart Disease Detected</div>
    <?php } else { ?>
        <div class="status negative">No Heart Disease Detected</div>
    <?php } ?>

    <a href="index.php">Predict Again</a>
</div>
</body>
</html>