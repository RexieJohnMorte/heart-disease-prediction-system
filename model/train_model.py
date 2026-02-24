import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
import joblib
import os

BASE_DIR = os.path.dirname(os.path.abspath(__file__))

# Load dataset
data_path = os.path.join(BASE_DIR, "Heart_Disease_Prediction.csv")
df = pd.read_csv(data_path)

# Convert target column
df["Heart Disease"] = df["Heart Disease"].map({
    "Presence": 1,
    "Absence": 0
})

# Features and target
X = df.drop("Heart Disease", axis=1)
y = df["Heart Disease"]

# Train/test split
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

# Train model
model = RandomForestClassifier(random_state=42)
model.fit(X_train, y_train)

# Save model using joblib
model_path = os.path.join(BASE_DIR, "model.pkl")
joblib.dump(model, model_path)

print("Model trained and saved as model.pkl")
print("Model classes:", model.classes_)
print("Model features:", model.feature_names_in_)
