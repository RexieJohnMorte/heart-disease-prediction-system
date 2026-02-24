<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Heart Disease Prediction</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            min-height: 100vh;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #b30000;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #333;
        }

        input, select {
            width: 100%;
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input:focus, select:focus {
            border-color: #b30000;
            outline: none;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        button {
            width: 100%;
            margin-top: 25px;
            padding: 14px;
            background: #b30000;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #8f0000;
        }

        footer {
            text-align: center;
            margin-top: 15px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Heart Disease Prediction</h2>
    <p class="subtitle">Enter patient details to predict the risk of heart disease</p>

    <form action="predict.php" method="POST">

        <div class="grid">
            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" required>
            </div>

            <div class="form-group">
                <label>Sex</label>
                <select name="sex" required>
                    <option value="">Select</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
            </div>

            <div class="form-group">
                <label>Chest Pain Type</label>
                <select name="chest_pain_type" required>
                    <option value="">Select</option>
                    <option value="1">Type 1</option>
                    <option value="2">Type 2</option>
                    <option value="3">Type 3</option>
                    <option value="4">Type 4</option>
                </select>
            </div>

            <div class="form-group">
                <label>Resting Blood Pressure</label>
                <input type="number" name="bp" required>
            </div>

            <div class="form-group">
                <label>Cholesterol</label>
                <input type="number" name="cholesterol" required>
            </div>

            <div class="form-group">
                <label>Fasting Blood Sugar > 120</label>
                <select name="fbs_over_120" required>
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Resting ECG</label>
                <select name="ekg_results" required>
                    <option value="">Select</option>
                    <option value="0">Normal</option>
                    <option value="1">ST-T abnormality</option>
                    <option value="2">LV hypertrophy</option>
                </select>
            </div>

            <div class="form-group">
                <label>Maximum Heart Rate</label>
                <input type="number" name="max_hr" required>
            </div>

            <div class="form-group">
                <label>Exercise Angina</label>
                <select name="exercise_angina" required>
                    <option value="">Select</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>ST Depression</label>
                <input type="number" step="0.1" name="st_depression" required>
            </div>

            <div class="form-group">
                <label>ST Slope</label>
                <select name="slope_of_st" required>
                    <option value="">Select</option>
                    <option value="1">Upsloping</option>
                    <option value="2">Flat</option>
                    <option value="3">Downsloping</option>
                </select>
            </div>

            <div class="form-group">
                <label>Major Vessels (0–3)</label>
                <input type="number" min="0" max="3" name="num_vessels_fluro" required>
            </div>

            <div class="form-group">
                <label>Thallium Test</label>
                <select name="thallium" required>
                    <option value="">Select</option>
                    <option value="3">Normal</option>
                    <option value="6">Fixed Defect</option>
                    <option value="7">Reversible Defect</option>
                </select>
            </div>
        </div>

        <button type="submit">Predict Heart Disease</button>
    </form>

    <footer>
        Heart Disease Prediction System • RexieJohnMorte
    </footer>
</div>
 
</body>
</html>
