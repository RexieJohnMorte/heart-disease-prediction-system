import sys
import joblib
import pandas as pd
import os

BASE_DIR = os.path.dirname(os.path.abspath(__file__))
model_path = os.path.join(BASE_DIR, "model.pkl")

model = joblib.load(model_path)

# Use exact feature names from model
columns = model.feature_names_in_

values = [float(arg) for arg in sys.argv[1:]]

input_data = pd.DataFrame([values], columns=columns)

prediction = model.predict(input_data)[0]

# Only return prediction (no probability)
print(prediction)